<?php
include_once("connection.php");

$rid=$_GET["rid"];
//$total=$_GET["total"];

$query="delete from ratings where rid='$rid'";
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