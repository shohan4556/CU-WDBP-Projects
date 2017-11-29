<?php
session_start();
include("../database/config.php");



if(isset($_POST['submit'])){
$item_name = mysqli_real_escape_string($myconn,$_POST['item_name']);
$category = mysqli_real_escape_string($myconn,$_POST['category']); 
$price = $_POST['price']; 
$description = mysqli_real_escape_string($myconn,$_POST['description']); 


	$filetmp = $_FILES["item_img"]["tmp_name"];
	$filename = $_FILES["item_img"]["name"];
	$filetype = $_FILES["item_img"]["type"];
	$filepath = "photo/".$filename;
	
	$file = move_uploaded_file($filetmp,$filepath);






$sql1 = "INSERT INTO item(`item_name`,`category`,`price`,`description`, `img_name`, `img_path`, `img_type`)
VALUES('$item_name','$category','$price','$description', '$filename', '$filepath', '$filetype')";

$result1 = mysqli_query($myconn,$sql1);

if($result1 === TRUE){
	header("Location: insert.php");
	$_SESSION['postMsg'] = '<p><center>Your Item is added</center></p>';
	
}
else{
	$_SESSION['postMsg'] = '<p><center>Your Item is not added</center></p>';
	header("Location: insert.php");
}
}

?>