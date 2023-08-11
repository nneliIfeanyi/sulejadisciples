<?php require 'inc/header.php'; 
//Delete 

if (isset($_GET['id']) ) {
  
  $id = $_GET['id'];
  

  $sql = "DELETE FROM participants WHERE id = '$id' LIMIT 1";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    
    flash('success','Delete Successful..');
      ?>
      <meta http-equiv='refresh' content='2.5; attendance.php'>
      <?php

  }else{
    die('An Error Occured');
  }

}