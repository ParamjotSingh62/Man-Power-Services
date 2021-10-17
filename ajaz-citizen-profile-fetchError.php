<?php
include_once("connection.php");
$uid=$_GET["uid"];
$query="select * from citizens where uid='$uid'";
$table=mysqli_query($dbCon,$query);
//$err=mysqli_error($query);
if(mysqli_num_rows($table)==1)
	echo "Data Fetched";
else
	   echo "Invalid Username";

?>