<?php
session_start();
if(isset($_SESSION["username"])){
  $user=$_SESSION["username"];
}
$PageTitle="All H1B Cases";
$nav="cases";
include_once('templates/header.php');
?>
<?php
if (isset($user)){
  echo 
  '
  <form action="action-addnews.php" method="post">  
      <label>CASE_NUMBER：</label><input type="text" name="CASE_NUMBER">  <br>
      <label>CASE_STATUS：</label><input type="text" name="CASE_STATUS">  <br>
      <label>CASE_SUBMITTED：</label><input type="text" name="CASE_SUBMITTED">  <br>
      <label>DECISION_DATE：</label><input type="text" name="DECISION_DATE">  <br>
      <label>ORIGINAL_CERT_DATE：</label><input type="text" name="ORIGINAL_CERT_DATE">  <br>
      <input type="submit" value="add">  
  </form>';
} else {
  echo '<p>You do not have the previledge to add new cases. You can do that after you log in.</p>';
}
?>

<?php
include_once('templates/footer.php');
?>