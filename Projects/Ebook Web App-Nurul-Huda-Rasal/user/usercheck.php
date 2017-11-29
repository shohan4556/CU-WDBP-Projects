<?php
$username=$_POST['name'];
$password=base64_encode($_POST['pass']);
$rool=$_POST['user'];
include("../database/config.php");
$sql="SELECT * FROM admin WHERE name='$username' AND password='$password' ";
$result=mysqli_query($myconn,$sql);
$count=mysqli_num_rows($result);


if($count==1)
{
	if($rool=="subadmin")
	{
header("location:../index.php");
	}
	
}
else
{
echo ': <font color="#FF0000"><a href="../login.php">Your login information is incorrect</a></font>';	
}


?>