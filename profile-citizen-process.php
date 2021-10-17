<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script type="text/javascript">
setTimeout("window.location='dash-citizen.php'",3000);
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
$name=$_POST["txtName"];
$contact=$_POST["txtContact"];
$city=$_POST["txtCity"];
$state=$_POST["combostate"];
    echo $state;
$address=$_POST["txtAddress"];

$orgName=$_FILES["fileProfile"]["name"];
$tmpName=$_FILES["fileProfile"]["tmp_name"];
    
$email=$_POST["txtEmail"];


$query="insert into citizens values('$uid','$name','$contact','$city','$state','$address','$orgName','$email')";
mysqli_query($dbCon,$query);
$msg=mysqli_error($dbCon);
if($msg=="")
{
	move_uploaded_file($tmpName,"uploads/".$orgName);
     
	echo "<h2>Successfully Signed Up</h2>";
    session_start(); echo $_SESSION["activeuser"];
}
else
	echo $msg."error".$uid;
}
function doUpdate($dbCon)
{
    $uid=$_POST["txtUid"];
$name=$_POST["txtName"];
$contact=$_POST["txtContact"];
$city=$_POST["txtCity"];
$state=$_POST["combostate"];
$address=$_POST["txtAddress"];
$hdn=$_POST["hdn"];

$orgName=$_FILES["fileProfile"]["name"];
$tmpName=$_FILES["fileProfile"]["tmp_name"];
    
$email=$_POST["txtEmail"];
    
    if($orgName=="")
    {
        $filename=$hdn;
    }
    else
    {
        $filename=$orgName;
        move_uploaded_file($tmpName,"uploads/".$orgName);
    }
    
    $query="update citizens set name='$name', contact='$contact', city='$city', state='$state', address='$address', pic='$filename', email='$email' where uid='$uid'";
    mysqli_query($dbCon,$query);
    $msg=mysqli_error($dbCon);
    if($msg=="")
    {
        echo "<h3>Record updated successfully<h3>";
        session_start(); echo $_SESSION["activeuser"];
    }
    else
    {
        echo $msg;
    }

}





?>
</body>
</html>
