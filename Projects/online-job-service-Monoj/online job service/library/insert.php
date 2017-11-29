
<?php

$name=$_POST['name'];
$email=$_POST['email'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$password=$_POST['password'];





include("config.php");
$query = mysqli_query($myconn, "INSERT INTO reg(name,email,age,gender,password) 
       
 VALUES('$name','$email','$age','$gender','$password')") or die (mysqli_error($myconn));
header("location:signup.php");

exit();
?>