<?php
// Enter your Host, username, password, database below.

$host = "";
$database = "";
$username = "root";
$password = "";


$con = mysqli_connect($host,$username,$password,$database);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
