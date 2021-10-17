<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$error=mysqli_error($dbCon);
//echo $error;
if(mysqli_num_rows($table)==1)
	echo "Not Available";
else
	echo "Available".$error ;

?>