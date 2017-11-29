<?php

$id=$_GET['pid'];
include("../../database/config.php");

$sql="DELETE FROM prodinfo WHERE prodinfo.prod_id ='" . $id . "'";
$query=mysqli_query($myconn,$sql);

header("location:../delete.php");


?>