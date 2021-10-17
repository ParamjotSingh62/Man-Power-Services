<?php
include_once("SMS_OK_sms.php");
$pwd=$_GET["pwd"];
$mobile=$_GET["mobile"];
$msg="password is: '$pwd'";

$msg=SendSMS($mobile,$msg);
echo $msg;
?>    