<?php
include_once("connection.php");

$uid=$_GET["uid"];
//$total=$_GET["total"];

$query="update users set status = 0 where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="" )
{
    echo json_encode("blocked");
}
else 
{
    echo json_encode($msg);
        }
?>