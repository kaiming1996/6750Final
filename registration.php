<?php
$PageTitle="Register";
include_once('templates/header.php');
?>

<?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password1 = mysqli_real_escape_string($con,$password);
	$password = hash('sha256', $password1);
	$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `user` (username, password, email, created_at)
VALUES ($username, $password, $email, $trn_date)";
        $result = mysqli_query($con,$query) or die(mysqli_error($con));
        if($result){
            echo "<div class='form'>
<h3>👌 You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>login</a>.</div>";
        }
    }else{
?>
<!-- <div class="form">
<h1>Registration</h1>
<h2>Group 9: H1B Database </h2>
<form name="registration" action="" method="post">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="submit" name="submit" value="Register" />
</form>
</div> -->


<div class="text-center">
  <form action="" method="post" name="registration" class="form-signin">
    <p class="h1 mb-3 font-weight-normal">🙌</p>
    <h3 class="h3 mb-3 font-weight-normal">Sign Up</h3>
    <div class="form-group">
      <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Email Address" required>
    </div>
    <div class="form-group">
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-large btn-primary btn-block">Sign Up</button>
  </form>
  <p>Already a member? <a href='registration.php'>Sign in Here</a></p>
</div>

<?php } ?>

<?php

include_once('templates/footer.php');
?>
