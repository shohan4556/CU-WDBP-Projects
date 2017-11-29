<?php
include_once 'dbcon.php';

?>


<?php


$id=$_GET['id'];

$sql="DELETE  FROM tbl_student WHERE st_id= $id";

 if(mysqli_query($conn, $sql)){
     header("location:index.php");
 }else{
     echo "no deleted";
 }




?> 