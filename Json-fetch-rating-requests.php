<?php
include_once("connection.php");

$citizenuid=$_GET["citizenuid"];

$query="select * from ratings where citizenuid='$citizenuid'";
$table=mysqli_query($dbCon,$query);
$arr=array();

while($row=mysqli_fetch_array($table))
{
    
        $arr[]=$row;
    
}
echo json_encode($arr);
?>