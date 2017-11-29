<?php
$id=$_POST['id'];
$first_name=$_POST['first_name'];
$mid_name=$_POST['mid_name'];
$last_name=$_POST['last_name'];
$address=$_POST['address'];
$email=$_POST['email'];
$phone_num=$_POST['phone_num'];
$dept_name=$_POST['dept_name'];

$gender=$_POST['gender'];
$salary=$_POST['salary'];
include("confiq.php");
$query = mysqli_query($myConnection, "INSERT INTO staff (id,first_name,mid_name,last_name,address,email,phone_num,dept_name,gender,salary) 
       
 VALUES('$id','$first_name','$mid_name','$last_name','$address','$email','$phone_num','$dept_name','$gender','$salary')") or die (mysqli_error($myConnection));
header("location: staff.php");

exit();
?>