<?php
include_once("connection.php");

//$uid=$_GET["uid"];
$query="select distinct  category from requirements";
$table=mysqli_query($dbCon,$query);
$arr=array();
while($row=mysqli_fetch_array($table))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>