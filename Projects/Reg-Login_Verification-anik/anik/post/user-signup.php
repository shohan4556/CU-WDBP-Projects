<?php
require "../db.php";
if (isset($_POST)){
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $username = $_POST['username'];
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $phone = $_POST['phone'];
    $pass = $_POST['password'];
    $md5pass = md5($pass);
    
    $sql = "INSERT INTO `user`(`name`, `email`,`phone`, `username`,`password`,`joined`) VALUES ('$name','$email','$phone','$username','$md5pass',CURRENT_TIMESTAMP)";
//    echo $sql;
//    die();
    if(mysqli_query($conn,$sql) == true){
        $_SESSION['reg_msg'] = '<span class="alert alert-success">Registration Successfull</span>';
        header("Location: ../registration.php");
    }else{
        $_SESSION['reg_msg'] = '<span class="alert alert-danger">Registration Failed.</span>';
        header("Location: ../registration.php");
    }
}