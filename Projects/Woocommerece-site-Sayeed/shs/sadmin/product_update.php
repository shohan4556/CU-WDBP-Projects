<?php
	
	include("login/session.php");
	
	include("../database/config.php");
	
	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$pprice = $_POST['pprice'];
	$pdesc = $_POST['pdesc'];
	
	$sql="UPDATE productinfo SET prod_id='$pid',pname='$pname',price='$pprice',description='$pdesc' WHERE prod_id=$pid";
	
	$query = mysqli_query($myconn,$sql);
	

	if($query==TRUE){
		echo '<h1 style="color:green">Update Item Successfully.</h1>';
		echo '<a href="index.php">Go to deshboard</a>';
	}
	else{
		echo '<h1 style="color:red">Update Not Successful.</h1>';
		echo '<a href="index.php">Go to deshboard</a>';
	}

 ?>