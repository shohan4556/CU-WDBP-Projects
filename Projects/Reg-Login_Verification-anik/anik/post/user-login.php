<?php
require "../db.php";
if (isset($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $md5pass = md5($password);
    
    $sql = "select * from `user` WHERE `username`='".$username."' and `password`='".$md5pass."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $count = mysqli_num_rows($res);
//    echo $count;
//    die();
    
    if ($count == 1){
        $_SESSION['logged_user_id'] = $row['user_id'];
        $_SESSION['logged_username'] = $row['username'];
        header("Location: ../");
    }else{
        $_SESSION['login_msg'] = '<span class="text-danger">Falied to login/NO user exist.</span>';
        header("Location: ../login.php");
    }
}
