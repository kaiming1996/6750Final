<?php
$PageTitle="Bye Bye";
include_once('templates/header.php');
?>

<?php
session_start();
session_destroy();
echo "<p>You are successfully logged out.</p>";
?>

<?php
include_once('templates/footer.php');
?>