<?php
date_default_timezone_set('Africa/Lagos');
session_start();
require 'config.php';
// Flash message helper
function flash($name = '', $message = '', $class = 'alert alert-success'){
  if(!empty($name)){
    //No message, create it
    if(!empty($message) && empty($_SESSION[$name])){
      if(!empty( $_SESSION[$name])){
          unset( $_SESSION[$name]);
      }
      if(!empty( $_SESSION[$name.'_class'])){
          unset( $_SESSION[$name.'_class']);
      }
      $_SESSION[$name] = $message;
      $_SESSION[$name.'_class'] = $class;
    }
    //Message exists, display it
    elseif(!empty($_SESSION[$name]) && empty($message)){
      $class = !empty($_SESSION[$name.'_class']) ? $_SESSION[$name.'_class'] : 'success';
      echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
      unset($_SESSION[$name]);
      unset($_SESSION[$name.'_class']);
    }
  }
}


 // Simple page redirect
  function redirect($page){
    header('location:' . $page);
  }


function login_pass($conn,$username,$password){

  $sql = "SELECT * FROM admin WHERE name = '$username'";
  $query = mysqli_query($conn, $sql);
  $row_count = mysqli_num_rows($query);
  
  if ($row_count > 0){
    $guest = mysqli_fetch_assoc($query);
    if ($guest['password'] == $password) {
      return true;
    }else{
      return false;
    } 
  }
}


 function register_participant($conn,$surname,$other_names,$phone,$local_assembly,$invited_by,$reg_date,$reg_time,$year,$day_one){
    $sql = "INSERT INTO participants(surname,other_names,phone,church,referee,reg_date,reg_time,year,day_one) VALUES('$surname','$other_names','$phone','$local_assembly','$invited_by','$reg_date','$reg_time','$year','$day_one' )";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }


  function check($conn,$phone){
    $sql = "SELECT * FROM participants WHERE phone = '$phone'";
    $query = mysqli_query($conn, $sql);
    $row_count = mysqli_num_rows($query);
    if ($row_count > 0) {
      return true;
    }else{
      return false;
    }
  }


  function sendMessage($conn,$name,$phone,$message){
    $sql = "INSERT INTO message(name,phone,message) VALUES('$name','$phone','$message')";
    $query = mysqli_query($conn, $sql);
    if ($query) {
      return true;
    }else{
      return false;
    }
  }
