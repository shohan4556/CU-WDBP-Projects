<?php
$id=$_POST['id'];
$semester=$_POST['semester'];
$subject=$_POST['subject'];
$marks=$_POST['marks'];
$gpa=$_POST['gpa'];



include("confiq.php");
$query = mysqli_query($myConnection, "INSERT INTO result (id,semester,subject,marks,gpa) 
       
 VALUES('$id','$semester','$subject','$marks','$gpa' )
") or die (mysqli_error($myConnection));






header("location: result.php");

exit();
?>
