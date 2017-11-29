<link rel="stylesheet" type="text/css" href="style.css">

<?php include("config.php"); ?>

<?php 
	include("header.php");
	include("menu.php");

if(isset($_POST["submit"])){
	$address = $_POST['address'];
	$fname = $_POST["fname"];
	$email = $_POST["email"];
	$phone = $_POST['phone'];
	$bg = $_POST["bg"];
	$age = $_POST["age"];
	$password = md5($_POST["password"]);

	$sql = "INSERT INTO `user` (`u_id`, `name`, `address`, `bloodgroup`, `mobilenumber`, `age`, `password`, `email`) VALUES (NULL, '".$fname."','".$address."','".$bg."','".$phone."','".$age."','".$password."','".$email."')";
	if(mysqli_query($conn,$sql)){
		header('location: login.php');
	}
}	

?>