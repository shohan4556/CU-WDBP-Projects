<?php
require "../db.php";
if (isset($_POST)){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "select * from `admin` WHERE `admin_username`='".$username."' and `password`='".$password."'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    $count = mysqli_num_rows($res);
//    echo $sql;
//    echo $count;
//    die();
    
    if ($count == 1){
        $_SESSION['login_admin_id'] = $row['admin_id'];
        $_SESSION['login_admin'] = $row['admin_username'];
        header("Location: ../home.php");
    }else{
        $_SESSION['login_msg'] = '<span class="text-danger">falied to login</span>';
        header("Location: ../index.php");
    }
}
