<?php
include_once("connection.php");
$rid=$_GET["rid"];
$query="delete from requirements where rid='$rid'";
$table=mysqli_query($dbCon,$query);
$error=mysqli_error($dbCon);
if($error=="")
{
    echo "deleted";
}
else
    echo "error:".$error;

?>