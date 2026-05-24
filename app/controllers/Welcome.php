<?php
class Welcome extends Controller
{
  public  $AuthModel;
  public function __construct()
  {
    $this->AuthModel = $this->model('Auth');
    if (isset($_SESSION['user_id'])) {
      redirect('youth_summit');
    }
  }

  public function index()
  {
    // Load Index View for Admin Login
    $data = [];
    $this->view('welcome/index', $data);
  }

  public function dashboard()
  {
    // Load Dashboard View
    $data = [];
    $this->view('welcome/dashboard', $data);
  }

  // Handle Admin Authentication 
  public function login()
  {
    // Redirect if already logged in
    if ($this->isLoggedIn()) {
      redirect('welcome/dashboard');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Sanitize POST
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      $data = [
        'email' => trim($_POST['username'] ?? ''),
        'password' => trim($_POST['password'] ?? ''),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate inputs
      if (empty($data['email'])) {
        $data['email_err'] = 'Please enter your email or username.';
      }
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter your password.';
      }

      if (!empty($data['email_err']) || !empty($data['password_err'])) {
        $this->view('welcome/index', $data);
        return;
      }

      // Check for user
      // if (!$this->AuthModel->userExists($data['email'])) {
      //   $data['email_err'] = 'This email/username is not registered.';
      //   $this->view('welcome/index', $data);
      //   return;
      // }

      $loginUser = $this->AuthModel->login($data['email'], $data['password']);
      if ($loginUser) {
        // Create Session
        $this->createUserSession($loginUser);
        return;
      } else {
        $data['password_err'] = 'Password incorrect.';
        $this->view('welcome/index', $data);
        return;
      }
    } else {
      // If NOT a POST
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];
      // Load View
      $this->view('welcome/index', $data);
    }
  }

  // Create Session With User Info
  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user->id;
    $_SESSION['user_email'] = $user->email;
    $_SESSION['user_name'] = $user->username ?? '';
    redirect('welcome/dashboard');
  }

  // Logout & Destroy Session
  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('welcome');
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
