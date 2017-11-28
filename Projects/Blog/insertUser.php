<?php
include("config.php");

$firstname = $_POST['name1'];
$lastname = $_POST['name2'];
$email = $_POST['email'];
$country = $_POST['Country'];
$password=$_POST['Password'];



$hash=password_hash($password, PASSWORD_DEFAULT);





$sql = "INSERT INTO usertbl (firstname,lastname,email,country,user_role,password)
VALUES ('$firstname','$lastname','$email','$country','user','$password')";

mysqli_select_db($conn,"myblog");

if(mysqli_query($conn,$sql)){
    
    header("location: login.php");
}

?>
