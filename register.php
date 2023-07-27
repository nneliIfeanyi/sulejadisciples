<?php require 'inc/header.php';
$nameErr = $surname = $other_names = $local_assembly = $invited_by ='';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  // Sanitize POST
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $surname = trim($_POST['surname']);
  $other_names = trim($_POST['other_names']);
  $phone = ltrim($_POST['phone'], '\0');
  $local_assembly = trim($_POST['church']);
  $invited_by = trim($_POST['referee']);
  $reg_date = date('Y-m-d');
  $reg_time = date('h:s:A');
  $year = date('Y');

// Check for email
  if(empty($surname) || empty($other_names)){
    flash('error', 'Please enter participants fullname..', 'alert alert-danger');
    $nameErr = 'Surname is required';
  }elseif (empty($phone)) {
    flash('error', 'Please enter participants phone number', 'alert alert-danger');
  }elseif (strlen($phone) > 11 ) {
    flash('error', 'Invalid Phone Number, 11 digits allowed', 'alert alert-danger');
  }elseif (strlen($phone) < 11 ) {
    flash('error', 'Invalid Phone Number, 11 digits allowed', 'alert alert-danger');
  }elseif (empty($local_assembly)) {
    flash('error', 'Please enter participants denomination..', 'alert alert-danger');
  }elseif (check($conn,$phone)) {
    flash('error', 'A user exist with same phone number!', 'alert alert-danger');
  }else{

    if (empty($invited_by)) {
      $invited_by = 'Suleja Disciple';
    }

    $register = register_participant($conn,$surname,$other_names,$phone,$local_assembly,$invited_by,$reg_date,$reg_time,$year);
    if ($register) {
       flash('success','Registration Successful.. Register Another');
      ?>
      <meta http-equiv='refresh' content='3.5; register.php'>
      <?php
      }
  }
}

?>
<div class="mb-5">
 <div class="row">
   <div class="col-md-8 mx-auto">
    <div class="">
      <div class="card card-body bg-light my-1">
         <p class="lead fw-semibold">Greater Bethesda 2023 </p>
        <h2 class="text-primary">Registration Form</h2>
         <?php flash('error'); ?>
         <?php flash('success');?>
         <p>Please use the form below to register.</p>

        <form action="register.php" method="post">
          <div class="form-group">
              <label>Surname:<sup class="text-danger">*</sup></label>
              <input type="text" name="surname" class="form-control form-control-lg" value="<?= $surname;?>">
              <span class="invalid-feedback"><?= $nameErr;?></span>
          </div>    
          <div class="form-group mb-2">
              <label>Other Names:<sup class="text-danger">*</sup></label>
              <input type="text" name="other_names" class="form-control form-control-lg" value="<?= $other_names;?>">
              <span class="invalid-feedback"><?= $nameErr;?></span>
          </div>
          <div class="form-group mb-2">
              <label>Whatsapp Number:<sup class="text-danger">*</sup></label>
              <input type="number" name="phone" class="form-control form-control-lg" value="<?= $phone;?>">
          </div>
          <div class="form-group mb-2">
              <label>Local Assembly:<sup class="text-danger">*</sup></label>
              <input type="text" name="church" class="form-control form-control-lg" value="<?= $local_assembly;?>">
          </div>

          <div class="form-group">
              <label>Invited by:<br><small style="font-size: 11px;"><span class="fw-bold">(</span>You may leave this field empty if already a member of Suleja Disciples.<span class="fw-bold">)</span></small></label>
              <input type="text" name="referee" class="form-control form-control-lg" value="<?= $invited_by;?>">
          </div>
          <div class="form-row my-4">
            <div class="col-6 mb-2">
              <input type="submit" class="btn btn-primary px-5" value="Register">
            </div>
          </div>
        </form>

      </div>
    </div>
   </div>
 </div>
</div>
<?php include 'inc/footer2.php'; ?>
