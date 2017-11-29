<?php
require "../db.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];
    
    $sql = "DELETE FROM `legends` WHERE `legend_id`=".$id;
//    echo $sql;
//    die();
    if (mysqli_query($conn,$sql)){
        $_SESSION['msg'] = '<span class="text-success">Deleted</span>';
        header("Location:".$_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['msg'] = '<span class="text-danger">Failed to Delete.</span>';
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    
}