<?php
session_start();
error_reporting(1);
include_once('config.php');
$to=$_POST['to'];
$sub=$_POST['sub'];
$msg=$_POST['msg'];

$email=$_SESSION['semail'];

	if($to=="" || $sub=="" || $msg==""){
		$_SESSION['homemsg'] = "fill the related data first";
		header('location:home.php');
	}
	
	else
	{
	$d=mysqli_query($con,"SELECT * FROM users where email='$to'");
	$row=mysqli_num_rows($d);
	if($row==1){
		mysqli_query($con,"INSERT INTO usermail values('','$to','$email','$sub','$msg','',sysdate())");
		$_SESSION['homemsg'] = "Message sent...";
		header('location:home.php');
	}
	else
		{
		$sub=$sub."--"."msg failed";
		mysqli_query($con,"INSERT INTO usermail values('','$email','$email','$sub','$msg','',sysdate())");
		$_SESSION['homemsg'] = "Message failed because reciever not found";
		header('location:home.php');

		}	
	}
		
?>