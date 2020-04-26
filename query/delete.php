<?php
require('../db.php');

$id = $_GET['id'];
$query = "DELETE FROM `case` WHERE CASE_NUMBER='{$id}'";
					

mysqli_query($con,$query) or die(mysql_error());

header("Location:search_index.php");  
?>


<?php
