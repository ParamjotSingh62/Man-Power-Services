<?php
include_once("connection.php");

$custuid=$_GET["custuid"];
$query="select * from requirements where custuid='$custuid'";
$table=mysqli_query($dbCon,$query);
$arr=array();
while($row=mysqli_fetch_array($table))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>