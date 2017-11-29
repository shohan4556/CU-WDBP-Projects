<?php
$username=$_POST['name'];
$password=base64_encode($_POST['pass']);
include("../../database/config.php");
$sql="INSERT INTO admin(name,password) VALUES ('$username','$password')";
$query=mysqli_query($myconn,$sql);

?>