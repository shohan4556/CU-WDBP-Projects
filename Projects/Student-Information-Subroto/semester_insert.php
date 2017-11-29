<?php
include("confiq.php");
$id=$_POST['id'];
$semesterid=$_POST['semesterid'];
$semestername=$_POST['semester_name'];

$query = mysqli_query($myConnection, "INSERT INTO semester (id,semesterid,semester_name) 
       
 VALUES('$id','$semesterid','$semestername' )
") or die (mysqli_error($myConnection));






header("location: semester_details.php");

exit();
?>
