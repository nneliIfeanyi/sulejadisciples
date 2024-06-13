<?php 

$dbhost = "localhost";
$dbuser = "sulejadi_team";
$dbpass = "Fishers_team2023";
$dbname = "sulejadi_2023";

if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect");
}