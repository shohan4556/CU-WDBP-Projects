<?php
require "db.php";
if (isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    
    $sql = "DELETE FROM `user` WHERE `user_id`=".$user_id;
    
    if (mysqli_query($conn,$sql) == true){
        $_SESSION['user_dlt_msg'] = '<span class="alert alert-success">User Deleted!</span>';
        header("Location: ".$_SERVER['HTTP_REFERER']);
        
    }else{
        $_SESSION['user_dlt_msg'] = '<span class="alert alert-danger">User Deletion Failed!</span>';
        header("Location: ".$_SERVER['HTTP_REFERER']);
    }
}