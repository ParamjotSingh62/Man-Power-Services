<?php
include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$mobile=$_GET["mobile"];
$msg="Hello! '$uid' your password is: '$pwd' for ManPowerServices";

$msg=SendSMS($mobile,$msg);
echo $msg;
?>    