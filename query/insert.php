<?php
error_reporting(E_ALL^E_NOTICE);
// connect to db
require('../db.php');

// 获取增加的新闻
$CASE_NUMBER = $_POST['CASE_NUMBER'];
$CASE_STATUS = $_POST['CASE_STATUS'];
$CASE_SUBMITTED = $_POST['CASE_SUBMITTED'];
$DECISION_DATE = $_POST['DECISION_DATE'];
$ORIGINAL_CERT_DATE = $_POST['ORIGINAL_CERT_DATE'];
// 插入数据
$query = "INSERT INTO `case`(CASE_NUMBER,CASE_STATUS,CASE_SUBMITTED,DECISION_DATE,ORIGINAL_CERT_DATE) VALUES ('$CASE_NUMBER','$CASE_STATUS','$CASE_SUBMITTED','$DECISION_DATE','$ORIGINAL_CERT_DATE')";
					
$result = mysqli_query($con,$query) or die(mysql_error());
header("Location:search_index.php");  
?>
