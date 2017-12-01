<?php
require "../db.php";
if (isset($_POST)){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $md5pass = md5($password);
    
    $sql = "update `user` set `email`='".$email."',`phone`='".$phone."', `password`='".$md5pass."'";
  
    if (mysqli_query($conn,$sql) == true){
        $_SESSION['update_msg'] = '<span class="text-success">Profile updated!</span>';
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['update_msg'] = '<span class="text-danger">Update Failed!</span>';
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}
