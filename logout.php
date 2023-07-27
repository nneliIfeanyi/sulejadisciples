<?php
require 'inc/header.php'; 
if (isset($_SESSION['username'])) {
	
	unset($_SESSION['username']);
	session_destroy();
}
redirect('login.php');
die();