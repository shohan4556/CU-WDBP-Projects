
<?php
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['pass'];
$gender=$_POST['gender'];
$country=$_POST['country'];
include("database/config.php");
$sql="INSERT INTO custinfo (name,email,password,gender,country) VALUES('$name','$email','$password','$gender','$country')";
$query=mysqli_query($myconn,$sql);
if($query==="TRUE")
{
	echo "insert ok";	
}
else {
	echo "insert ok";	
}



?>