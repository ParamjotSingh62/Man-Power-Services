<?php
session_start();
include_once("connection.php");
$uid=$_GET["uid"];
$pwd=$_GET["pwd"];
$query="select * from users where uid='$uid'";
$table=mysqli_query($dbCon,$query);
$row=mysqli_fetch_array($table);
if(mysqli_num_rows($table)==1 && $pwd==$row["pwd"] )
{
   // echo "<h4><b>Valid Username or Password<b><h4>";
    if( $row["status"]=="1" && $row["flag"]=="1" && $row["category"]=="Worker"){
        
        $query1="update users set flag=0 where uid='$uid'";
        $table1=mysqli_query($dbCon,$query1);
        $error=mysqli_error($dbCon);
        if($error==""){
            
        //header("location:profile-worker-front.php");
            $_SESSION["activeuser"]=$uid;
            echo '<script>window.location.href = "profile-worker-front.php";</script>';
            }
        else
            echo $error;
    }
    else if( $row["status"]=="1" && $row["flag"]=="1" && $row["category"]=="Citizen"){
        
        $query1="update users set flag=0 where uid='$uid'";
        $table1=mysqli_query($dbCon,$query1);
        $error=mysqli_error($dbCon);
        if($error==""){
        //header("location:profile-citizen-front.php");
            $_SESSION["activeuser"]=$uid;
            echo '<script>window.location.href = "profile-citizen-front.php";</script>';
            }
        else
            echo $error;
    }
   else if($row["status"]==0)
   {
       echo "User Blocked, Contact Adminstrator.";
   }
   
    
    else 
    {
         echo $row["category"]; 
    $_SESSION["activeuser"]=$uid;
    }
        
    
 }

else
    echo "Invalid Username or Password";


?>