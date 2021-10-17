<?php
 include_once("connection.php");
include_once("SMS_OK_sms.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$mobile=$_GET["mobile"];
$category=$_GET["category"];
$msg="Hi! $uid, you have successfully Signed Up as $category category Your password for login is $pwd";
$query="insert into users values('$uid','$pwd',$mobile,'$category',curdate(),1,1)";
mysqli_query($dbCon,$query);
$error=mysqli_error($dbCon);
if($error=="")
{
    $msg=SendSMS($mobile,$msg);
    echo "Successfully Signed Up and $msg";
}   
else
    echo $error;


?>
