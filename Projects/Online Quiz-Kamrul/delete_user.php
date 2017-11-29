<?php
    include_once ("db_configure.php");
    $id = $_GET['id'];
    $q = "DELETE FROM user_registration WHERE id=$id";
    mysqli_query($conn, $q);
    mysqli_close($conn);
    header("location:admin_examinees_control.php");
?>