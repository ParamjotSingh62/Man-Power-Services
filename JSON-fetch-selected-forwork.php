<?php
include_once("connection.php");

$category=$_GET["category"];
$city=$_GET["city"];
$query="select * from requirements where category='$category' and city='$city'";
$table=mysqli_query($dbCon,$query);
$arr=array();

while($row=mysqli_fetch_array($table))
{
    //$dop=$row["date"];
                //$currentdate=date("Y/m/d");
            //$CurMinusTen=date('Y-m-d', strtotime($currentdate. ' -  10 days'));
    
//    if($CurMinusTen <= $dop )
//    {  //(current date  <= dateOfPost + 10 days)
//       // echo "dfhsjd";
      $arr[]=$row;
//    }
}
echo json_encode($arr);
?>