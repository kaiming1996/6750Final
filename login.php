<?php
$PageTitle="Login to H1B Matters";
include_once('templates/header.php');
?>

<?php
require('db.php');
session_start();

// If form submitted, insert values into the database.
if (isset($_POST['username'])){
	
	//Security --> login identification

	// removes backslashes
	$username = stripslashes($_REQUEST['username']);
    //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);

  $password=hash('sha256',$password);
	
	//Checking is user existing in the database or not
	$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error($con));
	$rows = mysqli_num_rows($result);
  if($rows==1){
	  $_SESSION['username'] = $username;
    // Redirect user to index.php
	  header("Location: index.php");
  }else{
		echo "<div class='form'>
			<h3>❌Username/password is incorrect.</h3>
			<br/>Click here to <a href='login.php'>try again</a>. New user? <a href='registration.php'>Register now</a>.</div>";
	}
    }else{
?>
<!-- <div class="form">

<h1>Log In</h1>
<h2>Group 9: H1B Database </h2>
<form action="" method="post" name="login">
<input type="text" name="username" placeholder="Username" required />
<input type="password" name="password" placeholder="Password" required />
<br>
<input name="submit" type="submit" value="Login" />
</form>

<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div> -->

<div class="text-center">

	<form action="" method="post" name="login" class="form-signin">
		<p class="h1 mb-3 font-weight-normal">👐</p>
		<h3 class="h3 mb-3 font-weight-normal">Please sign in</h3>
		<div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>

		<button type="submit" class="btn btn-large btn-primary btn-block">Submit</button>
	</form>
	<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
</div>
<?php } ?>
<?php
include_once('templates/footer.php');
?>
