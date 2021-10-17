<?php
include_once("connection.php");
$custuid=$_GET["uid"];
$category=$_GET["category"];
$problem=$_GET["problem"];
$location=$_GET["location"];
$city=$_GET["city"];
$query="insert into requirements(custuid, category,problem,location,city,date) values( '$custuid' , '$category' , '$problem' , '$location' , '$city' , curdate())";
mysqli_query($dbCon,$query);
$error=mysqli_error($dbCon);
if($error=="")
    echo "<h3>Posted Your Request<h3>";

else
    echo $error;

?>