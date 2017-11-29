<?php
include_once 'dbcon.php';

?>
  

  <?php

  
  
  $name=$_POST['name'];
  $roll=$_POST['roll'];
  $age=$_POST['age'];
  $email=$_POST['email'];
 

// Create connection  procidual style
    $conn = mysqli_connect($DB_host, $DB_user,$DB_pass, $DB_name);

   $sql="INSERT INTO tbl_student VALUES(NULL,'$name','$roll','$age','$email')";
       
    if (mysqli_query($conn, $sql)) {
    header("location: index.php");
} else {
echo "New  inserted" ;
}


       
       
?>