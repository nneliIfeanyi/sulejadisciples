<?php require 'inc/header.php'; 
//Delete 

if (isset($_GET['id']) ) {
  
  $id = $_GET['id'];
  

  $sql = "DELETE FROM participants WHERE id = '$id' LIMIT 1";
  $query = mysqli_query($conn, $sql);

  if ($query) {
    
    //flash('success','Delete Successful..','alert alert-danger');
      ?>
      <script type="text/javascript">
          alert('Delete Successfully');
          history.go(-2);
      
      </script>
      <?php

  }else{
    die('An Error Occured');
  }

}