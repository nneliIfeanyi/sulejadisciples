<?php require 'inc/header.php'; ?>
<?php if(isset($_SESSION['username'])){ 
//Pull from database
if (isset($_GET['id']) ) {
  
  $id = $_GET['id'];
  
   	$sql = "SELECT * FROM participants WHERE id = '$id' ";
	$query = mysqli_query($conn, $sql);
	$info = mysqli_num_rows($query);
	if($info > 0) {
	  $result = mysqli_fetch_array($query);
	  $id = $result['id'];
      $other_names = $result['other_names'];
      $surname = $result['surname'];
      $local_assembly = $result['church'];
      $phone = $result['phone'];
      $invited_by = $result['referee']; 
	}

}

//Update Data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// Sanitize POST
  $_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
  $id = $_POST['id'];
  $surname = trim($_POST['surname']);
  $other_names = trim($_POST['other_names']);
  $phone = ltrim($_POST['phone'], '\0');
  $local_assembly = trim($_POST['church']);
  $invited_by = trim($_POST['referee']);
  
  $update = update_participant($conn,$id,$surname,$other_names,$phone,$local_assembly,$invited_by);
    if ($update) {
      //flash('success','Update Successful..');
      ?>
  
      <script type="text/javascript">
          alert('Changes Made Successfully');
          history.go(-2);
      
  	  </script>

      <?php
      
    }else{
    	die('Something went wrong');
    }
}

}

?>


  <div class="col-md-9 mx-auto">
    <div class="">
      <div class="card card-body bg-light my-1">
         <?php flash('error'); ?>
         <?php flash('success');?>
         <p class="lead fw-semibold">Greater Bethesda 2023 </p>
        <h2 class="text-primary">Edit Participants Data</h2>
         <p>Please use the form below to make corrections.</p>

        <form action="edit.php" method="post">
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
          <input type="hidden" name="id" value="<?=$id?>">
          <div class="form-row my-4">
            <div class="col-6 mb-2">
              <input type="submit" class="btn btn-primary px-5" value="Update">
            </div>
          </div>
        </form>

      </div>
    </div>
   </div>
   <?php include 'inc/footer.php'; ?>
