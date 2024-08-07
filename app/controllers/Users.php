<?php
class Users extends Controller
{
  public $userModel;
  public function __construct()
  {
    $this->userModel = $this->model('User');
  }

  public function index()
  {
    redirect('welcome');
  }

  public function register()
  {
    // Check if logged in
    // if (!$this->isLoggedIn()) {
    //   redirect('users/login');
    // }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      if (empty($_POST['invited_by'])) {
        $_POST['invited_by'] = 'Suleja Disciple';
      }
      $data = [
        'fullname' => trim($_POST['surname']) . ' ' . trim($_POST['other_names']),
        'surname' => trim($_POST['surname']),
        'other_names' => trim($_POST['other_names']),
        'phone' => trim($_POST['phone']),
        'church' => trim($_POST['church']),
        'invited_by' => trim($_POST['invited_by']),
        'reg_date' => date('Y-m-d'),
        'reg_time' => date('h:ia'),
        'year' => date('Y')

      ];
      $success = $this->userModel->register($data);
      if ($success) {
        //$redirect = URLROOT . '/users/register';
        //<meta http-equiv='refresh' content='2.1; $redirect'>
        echo "
                  <div class='flash-msg alert alert-success'>
                    Resgistration Recorded Successfully.. </span>
                </div>

            ";
      } else {
        echo "
                  <div class='flash-msg alert alert-danger'>
                    Something went wrong.. </span>
                </div>

            ";
      }
    } // End if post request

    $num_rows = $this->userModel->get_registered_count();
    $data = [
      'count' => $num_rows
    ];
    $this->view('users/register', $data);
  }

  public function login()
  {
    // Check if logged in
    if ($this->isLoggedIn()) {
      redirect('posts');
    }

    // Check if POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Check for email
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter email.';
      }

      // Check for name
      if (empty($data['name'])) {
        $data['name_err'] = 'Please enter name.';
      }

      // Check for user
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User Found
      } else {
        // No User
        $data['email_err'] = 'This email is not registered.';
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {

        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // User Authenticated!
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect.';
          // Load View
          $this->view('users/login', $data);
        }
      } else {
        // Load View
        $this->view('users/login', $data);
      }
    } else {
      // If NOT a POST

      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load View
      $this->view('users/login', $data);
    }
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->name;
    redirect('posts');
  }

  // Logout & Destroy Session
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/login');
  }

  // Check Logged In
  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
