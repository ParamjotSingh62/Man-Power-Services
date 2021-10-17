<?php
include_once("connection.php");

$category=$_GET["category"];

$query="select * from users where category='$category'";
$table=mysqli_query($dbCon,$query);
$arr=array();
while($row=mysqli_fetch_array($table))
{
    $arr[]=$row;
}
echo json_encode($arr);
?>