<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript">
setTimeout("window.location='dash-worker.php'",3000);
</script>
</head>
<body>
   <?php

include_once("connection.php");
$btn=$_POST["btn"];
if($btn=="Save")
	doSignup($dbCon);
else
	doUpdate($dbCon);

function doSignup($dbCon)
{

$uid=$_POST["txtUid"];
$email=$_POST["txtEmail"];
$wname=$_POST["txtName"];
$cnumber=$_POST["txtContact"];
$firmshop=$_POST["txtShopname"];
$city=$_POST["txtCity"];
$stat=$_POST["combostate"];
$address=$_POST["txtAddress"];
$category=$_POST["combocategory"];
$spl=$_POST["txSpcl"];
$exp=$_POST["txtExp"];
$otherinfo=$_POST["pastportfolio"];

$orgName=$_FILES["fileProfile"]["name"];
$tmpName=$_FILES["fileProfile"]["tmp_name"];

$orgAadharName=$_FILES["fileAadhar"]["name"];
$tmpAadhaarName=$_FILES["fileAadhar"]["tmp_name"];
    
/*$total=$_POST[""];
$count=$_POST[""]; */

$query="insert into workers values('$uid','$email','$wname','$cnumber','$firmshop','$city','$stat','$address','$category','$spl',$exp,'$otherinfo','$orgAadharName','$orgName',0,0)";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	move_uploaded_file($tmpName,"uploads/".$orgName);
	echo "<h2>Successfully Signed Up</h2>";
    session_start(); echo $_SESSION["activeuser"];
    //header("location:dash-worker.php");
}
else
	echo $msg;
}
function doUpdate($dbCon)
{
 $uid=$_POST["txtUid"];
$email=$_POST["txtEmail"];
$wname=$_POST["txtName"];
$cnumber=$_POST["txtContact"];
$firmshop=$_POST["txtShopname"];
$city=$_POST["txtCity"];
$stat=$_POST["combostate"];
$address=$_POST["txtAddress"];
$category=$_POST["combocategory"];
$spl=$_POST["txSpcl"];
$exp=$_POST["txtExp"];
$otherinfo=$_POST["pastportfolio"];

$orgName=$_FILES["fileProfile"]["name"];
$tmpName=$_FILES["fileProfile"]["tmp_name"];

$orgAadharName=$_FILES["fileAadhar"]["name"];
$tmpAadhaarName=$_FILES["fileAadhar"]["tmp_name"];
$hdn=$_POST["hdn"];    
$hdn2=$_POST["hdn2"];    

    if($orgName=="")
    {
        $picfilename=$hdn;
    }
    else
    {
        $picfilename=$orgName;
        move_uploaded_file($tmpName,"uploads/".$orgName);
    }
    if($orgAadharName=="")
    {
        $Aadharfilename=$hdn2;
    }
    else
    {
        $Aadharfilename=$orgAadharName;
        move_uploaded_file($tmpAadhaarName,"uploads/".$orgAadharName);
    }
    
    $query="update workers set wname='$wname',email='$email', cnumber=$cnumber, firmshop='$firmshop', city='$city', stat='$stat', address='$address', category='$category', spl='$spl', exp= $exp, otherinfo= '$otherinfo', apic= '$Aadharfilename', ppic='$picfilename'  where uid='$uid'";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        
        echo "<h3>Record updated successfully<h3>";
        session_start(); echo $_SESSION["activeuser"];
        
    
           // setTimeout();
        
    }
    else
    {
        echo $msg;
    }

}
?>
    
</body>
</html>

