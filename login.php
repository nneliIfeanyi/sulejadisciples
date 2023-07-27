<?php 
require 'inc/header.php'; 

if ($_SERVER['REQUEST_METHOD'] == "POST" ) {

  $username1 = mysqli_real_escape_string($conn, htmlspecialchars($_POST['username'], ENT_QUOTES, 'utf-8'));
  $username = trim($username1);
  $password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password'], ENT_QUOTES, 'utf-8'));

  if (empty($username1)) {
    flash('error', 'Please enter a username..', 'alert alert-danger');
   // redirect('login.php');
   
  }elseif (empty($password)) {
     flash('error', 'Please enter password..', 'alert alert-danger');
      //redirect('login.php');

  }else{

    if (login_pass($conn, $username, $password)) {
      $_SESSION['username'] = $username;
      flash('success', 'Login Successful');
      redirect('index.php');
     
    }else{

      flash('error', 'Invalid credentials..', 'alert alert-danger');
      //redirect('login.php');
    }

  }


}


?>
<div class="container">
<div class="row">
    <div class="col-md-6 mb-5 mx-auto">
      <div class="card card-body bg-light mt-3">
        <?php flash('error'); ?>
        <h2>Admin Login</h2>
        <p>Please fill in your Admin credentials to login.</p>
        <form action="login.php" method="post">
          <div class="form-group">
              <label>Username:<sup>*</sup></label>
              <input type="text" name="username" class="form-control form-control-lg <?php echo (!empty($data['phone_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>    
          <div class="form-group mb-2">
              <label>Password:<sup>*</sup></label>
              <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="">
              <span class="invalid-feedback"></span>
          </div>
          <div class="form-row">
            <div class="col-6 mb-2">
              <input type="submit" class="btn btn-primary btn-block" value="Login">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require 'inc/footer.php'; ?>
