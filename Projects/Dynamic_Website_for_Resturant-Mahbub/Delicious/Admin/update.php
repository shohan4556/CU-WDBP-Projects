<?php
session_start();
include("../database/config.php");
if (isset($_POST)){
    $item_id = $_POST['item_id'];
    $item_name =  $_POST['name'];
    $category = $_POST['category'];
    $price =$_POST['price'];
    $desc = $_POST['desc'];
    $sql = "update `item` set `item_name`='".$item_name."', `category`='".$category."', `price`='".$price."', `description` = '".$desc."' where `item_id`=".$item_id;
//echo  $sql;
//die();
    if (mysqli_query($myconn,$sql) == true){
        $_SESSION['update_msg'] = "Updated.";
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
    else{
        $_SESSION['update_msg'] = "Failed to update.";
        header("location: ".$_SERVER['HTTP_REFERER']);
    }
}