<?php
	
	include("../database/config.php");
	
	session_start();
	
	$username=$_POST['fname'];
	$password=$_POST['password'];

	$sql = "select * from custinfo where fname='$username' and password='$password' ";

	$query = mysqli_query($myconn,$sql);

	if ($query==false) 
	{
		echo '<h1><font color="red">Your login information is incorrect</font><h1>';
		echo '<a href="../subadminlogin.php" style="font-size:20px">Click Here</a>';
	} 
	else {
		
		$_SESSION['name'] = $username;
         
		header("location:index.php ?customer=$username");
	}
?>
