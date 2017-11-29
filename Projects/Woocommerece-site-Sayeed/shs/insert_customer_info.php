<?php
	
	include("database/config.php");
	
	$fname=$_POST['fname'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$password=$_POST['password'];
	
	include("database/config.php");
	
	$result="INSERT INTO custinfo(fname,phone,email,address,gender,password)
	VALUES('$fname','$phone','$email','$address','$gender','$password')";
	
	$query = mysqli_query($myconn,$result );
	
	

	if($query===TRUE){
		echo '<h2 style="color:green">Customer Successfully Registered</h2>';
		echo '<a href="index.php">Go to main page</a> | <a href="login.php">Go to login</a>';
	}
	else{
		echo '<h2 style="color:red">Item Not Inserted.</h2>';
		echo '<a href="index.php">Go to main page</a>';
	}
	


?>