<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$dbhost = "localhost";
$dbuser = "sulejadi_team";
$dbpass = "Fishers_team2023";
$dbname = "sulejadi_2023";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect");
}