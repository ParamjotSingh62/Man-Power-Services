<?php
include_once("connection.php");

$uid=$_GET["workeruid"];
$total=$_GET["total"];

$query="UPDATE workers SET total = total+'$total' , count = count + 1 where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="" )
{
    echo json_encode("rated");
}
else 
{
    echo json_encode($msg);
        }
?>