<?php
include_once 'dbcon.php';

?>
  
  <?php

  $id=$_GET['id']; 



  $name=$_POST['name'];
  $roll=$_POST['roll'];
  $age=$_POST['age'];
  $email=$_POST['email'];
 

// Create connection  procidual style
    $conn = mysqli_connect($DB_host, $DB_user,$DB_pass, $DB_name);

   $sql="UPDATE tbl_student SET st_id='$id', st_name='$name', st_roll='$roll', st_age='$age', st_email='$email' WHERE st_id=$id";
       
    if (mysqli_query($conn, $sql)) {
    header ("location:show.php?id=" .$id);
} else {
echo "no update" ;
}


       
       
?>