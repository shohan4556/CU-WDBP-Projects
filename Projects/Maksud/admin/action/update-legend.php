<?php
require "../db.php";
if (isset($_POST)){
    $legend_id = $_POST['legend_id'];
    $name = $_POST['name'];
    $dateofbirth = $_POST['dateofbirth'];
    $died = $_POST['died'];
    $details = mysqli_real_escape_string($conn,$_POST['details']);
    
    $sql = "update `legends` set `legend_name`='$name',`dateofbirth`='$died',`died`='$dateofbirth',`legend_details`='$details' WHERE `legend_id`=".$legend_id;
//    echo $sql;
//    die();
    if (mysqli_query($conn,$sql)){
        $_SESSION['msg'] = '<span class="text-success">Updated.</span>';
        header("Location:".$_SERVER['HTTP_REFERER']);
    }else{
        $_SESSION['msg'] = '<span class="text-danger">Update Failed.</span>';
        header("Location:".$_SERVER['HTTP_REFERER']);
    }
    
}