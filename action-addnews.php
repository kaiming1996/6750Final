<?php
error_reporting(E_ALL^E_NOTICE);
// connect to db
require('db.php');

// 获取增加的新闻
$CASE_NUMBER = $_POST['CASE_NUMBER'];
$CASE_STATUS = $_POST['CASE_STATUS'];
$CASE_SUBMITTED = $_POST['CASE_SUBMITTED'];
$DECISION_DATE = $_POST['DECISION_DATE'];
$ORIGINAL_CERT_DATE = $_POST['ORIGINAL_CERT_DATE'];
// Validate Input
function validateDate($date, $format = 'Y-m-d H:i:s')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}
function alert($message){
    echo "<script>alert('$message');</script>";
}
$status_list= array("WITHDRAWN","CERTIFIED-WITHDRAWN","DENIED","CERTIFIED");
if (!in_array($CASE_STATUS,$status_list)){
    alert("INVALID CASE STATUS, PLEASE SELECT FROM WITHDRAWN,CERTIFIED-WITHDRAWN,DENIED,CERTIFIED");
    echo "<meta http-equiv='refresh' content='1; URL=addnews.html' >";

}
$date_temp=explode(" ",$CASE_SUBMITTED);
if (sizeof($date_temp)==2){
    $date_flag=validateDate($date_temp[0], 'd/m/Y');	    
}
else{
    $date_flag=validateDate($CASE_SUBMITTED, 'd/m/Y');
}
if (!$date_flag){
    alert("case submitted date format error");
    echo "<meta http-equiv='refresh' content='1; URL=addnews.html' >";
}
$date_temp=explode(" ",$DECISION_DATE);
if (sizeof($date_temp)==2){
    $date_flag=validateDate($date_temp[0], 'd/m/Y');	    
}
else{
    $date_flag=validateDate($DECISION_DATE, 'd/m/Y');
}
if (!$date_flag){
    alert("decision date format error");
    echo "<meta http-equiv='refresh' content='1; URL=addnews.html' >";
    return;
}
if (!empty($ORIGINAL_CERT_DATE)){
$date_temp=explode(" ",$ORIGINAL_CERT_DATE);
if (sizeof($date_temp)==2){
    $date_flag=validateDate($date_temp[0], 'd/m/Y');	    
}
else{
    $date_flag=validateDate($ORIGINAL_CERT_DATE, 'd/m/Y');
}
if (!$date_flag){
    alert("case submitted date format error");
    return;
}
}
// 插入数据 warning:Case is case sensitive
$query = "INSERT INTO `CASE`(CASE_NUMBER,CASE_STATUS,CASE_SUBMITTED,DECISION_DATE,ORIGINAL_CERT_DATE) VALUES ('$CASE_NUMBER','$CASE_STATUS','$CASE_SUBMITTED','$DECISION_DATE','$ORIGINAL_CERT_DATE')";
					
$result = mysqli_query($con,$query) or die(mysql_error());
header("Location:search_index.php");  
?>
