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
  $reg_time = date('h:i:A');
  $year = date('Y');
  $day_one = $reg_time;

  if(empty($surname) || empty($other_names)){
    flash('error', 'Please enter participants fullname..', 'alert alert-danger');
    $nameErr = 'Surname is required';
  }elseif (empty($local_assembly)) {
    flash('error', 'Please enter participants denomination..', 'alert alert-danger');
  }else{

    if (empty($invited_by)) {
      $invited_by = 'Suleja Disciple';
    }

    $register = register_participant($conn,$surname,$other_names,$phone,$local_assembly,$invited_by,$reg_date,$reg_time,$year);
    if ($register) {
       flash('success','Registration Successful.. Register Another');
      ?>
      <meta http-equiv='refresh' content='2.5; attendance.php'>
      <?php
      }
  }
}

?>
<div class="mb-5">
 <div class="row">
  <?php if(isset($_SESSION['username'])):?>
   <div class="col-md-3">
    <?php include 'inc/nav.php'; ?>
   </div>
      <div class="col-md-9 mx-auto">
    <div class="">
      <div class="card card-body bg-light my-1">
         <?php flash('error'); ?>
         <?php flash('success');?>
         <p class="lead fw-semibold">Greater Bethesda 2023 </p>
        <h2 class="text-primary">Registration Form</h2>
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
  <?php else: ?>
   <div class="col-md-9 mx-auto">
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
 <?php endif;?>
 </div>
</div>
<?php include 'inc/footer2.php'; ?>
