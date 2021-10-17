<?php
include_once("connection.php");

$uid=$_GET["uid"];
//$total=$_GET["total"];

$query="delete from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="" )
{
    echo json_encode("deleted");
}
else 
{
    echo json_encode($msg);
        }
?>