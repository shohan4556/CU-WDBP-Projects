<?php
	session_start();
	include('config.php');

	$email = $_POST['email'];
	$password = $_POST['password'];

	$d=mysqli_query($con,"SELECT * FROM users where email='$email'");

	$row=mysqli_fetch_object($d);

	if($row != ""){
		$femail=$row->email;
		$fpass=$row->password;
	
		if($femail==$email && $fpass==$password){
			$_SESSION['semail']=$_POST['email'];
			header('location:home.php');
		}
	}
	else{
			$_SESSION['regmsg'] = "invalid email or password";
			header('location:index.php');
		}
?>