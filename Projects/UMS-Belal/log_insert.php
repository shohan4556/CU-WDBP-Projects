<?php

if (isset($_POST['username'])){


$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];



include("confiq.php");
$query = mysqli_query($myConnection, "INSERT INTO login (id,username,password) 
       
 VALUES('$id','$username','$password' )
") or die (mysqli_error($myConnection));






header("location: login.php");
}
exit();
?>
