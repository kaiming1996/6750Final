<?php
session_start();
if(isset($_SESSION["username"])){
  $user=$_SESSION["username"];
}
$PageTitle="Login to H1B Matters";
$nav="home";
include_once('templates/header.php');
?>

<?php
if(isset($user)){
  echo "<p>Hi ".$user."! Welcome back to H1B database. You can check the data <a href=\"search_index.php\">here</a>.";
} else {
  echo "<p>Hi there! Welcome to H1B database. You can check the data <a href=\"cases.php\">here</a>. To unlock full content and contribute to our data, please <a href=\"login.php\">log in</a> or <a href=\"registration.php\">register</a> first!";
}
?>
