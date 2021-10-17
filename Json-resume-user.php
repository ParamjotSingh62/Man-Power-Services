<?php
include_once("connection.php");

$uid=$_GET["uid"];
//$total=$_GET["total"];

$query="update users set status = 1 where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="" )
{
    echo json_encode("resumed");
}
else 
{
    echo json_encode($msg);
        }
?>