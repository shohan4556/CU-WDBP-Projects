<?php
include("confiq.php");

$courseid=$_POST['courseid'];
$semestername=$_POST['semester_name'];
$coursename=$_POST['coursename'];
$id=$_POST['id'];

$query = mysqli_query($myConnection, "INSERT INTO course (courseid,semester_name,coursename,id) 
       
 VALUES('$courseid','$semestername','$coursename','$id' )
") or die (mysqli_error($myConnection));






header("location: cour_details.php");

exit();
?>
