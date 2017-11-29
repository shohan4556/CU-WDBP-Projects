<?php
include("config.php");

session_start();

if($_SESSION["user"]==false){
header("location: login.php");
}

$comment = $_POST['comment'];
$postId = $_POST['id'];
$usrId=$_SESSION["usr_id"];


$sql = "INSERT INTO comment (content,post_id,user_id)
VALUES ('$comment','$postId','$usrId')";

mysqli_select_db($conn,"myblog");

if(mysqli_query($conn,$sql)){
    
    header("location: singlePostView.php?id=".$postId);
}

?>
