<?php

session_start();
$username=$_POST['fname'];
$password=$_POST['password'];
$admin="sayeed";
$adminpassword="sayeed1994";

if (($username != $admin) || ($password != $adminpassword)) 
{
		echo '<h1><font color="red">Your login information is incorrect</font><h1>';
		echo '<a href="../adminlogin.php" style="font-size:20px">Click Here</a>';
	} 
	else {
		
		$_SESSION['name'] = $username;
         
		header("location:../index.php ?admin= $username");
		
	}

?>
