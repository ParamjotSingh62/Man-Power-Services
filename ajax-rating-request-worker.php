<?php
include_once("connection.php");
$citizenuid=$_GET["citizenuid"];
$workeruid=$_GET["workeruid"];
$query="insert into ratings(citizenuid, workeruid) values('$citizenuid','$workeruid')";
mysqli_query($dbCon,$query);
$error=mysqli_error($dbCon);
if($error=="")
    echo "<h3>Rating Request sent<h3>";

else
    echo $error;

?>