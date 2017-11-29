<?php
include("confiq.php");

$admissionid=$_POST['admissionid'];
$id=$_POST['id'];
$admissiondate=$_POST['admissiondate'];

$query = mysqli_query($myConnection, "INSERT INTO admission (admissionid,id,admissiondate) 
       
 VALUES('$admissionid','$id','$admissiondate' )
") or die (mysqli_error($myConnection));






header("location:admission_details.php");

exit();
?>
