<?php
session_start();
$username=$_POST['name'];
$password=$_POST['pass'];
$admin="rasal";
$adminpassword="rasal";
if (($username != $admin) || ($password != $adminpassword)) 
{
		echo ': <font color="#FF0000"><a href="../adminlogin.php">Your login information is incorrect</a></font>';
	} 
	else {
		
		$_SESSION['name'] = $username;
         
		header("location:../index.php ?admin= $username");
		
	}

?>
