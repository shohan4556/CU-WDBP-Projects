<?php

include("login/session.php");

include("../database/config.php");

$subusername=$_POST['fname'];

$subpassword=base64_encode($_POST['password']);

$sql="INSERT INTO subadmin(name,password) VALUES('$subusername','$subpassword')";

$query=mysqli_query($myconn,$sql);

if($query==TRUE){
	
	echo '<h1 style="color:green">Sub Admin Created Successfully</h1><br>';
	echo '<a href="../index.php">Go to deshboard</a>';
}
else{
	echo '<h1 style="color:red">Sub Admin Not Created.</h1><br>';
	echo '<a href="../index.php">Go to deshboard</a>';
}

?>