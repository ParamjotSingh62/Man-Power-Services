<?php
//session_start();
include_once("connection.php");
$uid=$_GET["uid"];
//$pwd=$_GET["pwd"];
$query="select pwd, mobile from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
//$row=mysqli_fetch_array($table);
if(mysqli_num_rows($table)==1 )
{
   $arr=array();
    while($row=mysqli_fetch_array($table))
        {
            $arr[]=$row;
            //echo"yesss";
        }
        echo json_encode($arr);
    
 }

else
    echo "Invalid Username";


?>