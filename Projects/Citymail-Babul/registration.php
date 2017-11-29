<?php
	session_start();
	error_reporting(1);
	
	include('config.php');

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(isset($_POST['reg'])){
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];

    $filepath = "userImages/".$filename;
    
    move_uploaded_file($filetmp,$filepath);
 
	}

	$r = mysqli_query($con,"SELECT * FROM users where email='$email'");
	$t=mysqli_num_rows($r);

	if($t==1){
		 $_SESSION['regmsg'] = "email aleready exists choose another";
		 header('location:index.php');
	}else{
		mysqli_query($con,"INSERT INTO users(fullname, email, password,imagepath) values('$fullname', '$email', '$password','$filepath')");
		$_SESSION['regmsg'] = "registration successful";
		header('location:index.php');
	}

	
?>