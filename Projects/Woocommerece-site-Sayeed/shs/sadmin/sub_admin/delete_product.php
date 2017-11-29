<?php
	include("login/session.php");
	
	include("../../database/config.php");
	
	$pid = $_GET['id'];
	
	$sql = "delete from productinfo where prod_id='$pid' ";
	
	$query = mysqli_query($myconn,$sql);
	
	if($query==TRUE){
		echo '<h1 style="color:green">Delete Item Successfully.</h1>';
		
		echo '<a href="index.php">Go to deshboard</a>';
	}
	else{
		echo '<h1 style="color:red">Delete Not Successful.</h1>';
		echo '<a href="index.php">Go to deshboard</a>';
	}
	
?>