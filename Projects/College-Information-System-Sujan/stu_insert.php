<?php
$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$phone_num=$_POST['phone_num'];
$address=$_POST['address'];
$gender=$_POST['gender'];

include("confiq.php");
$query = mysqli_query($myConnection, "INSERT INTO stu_info (id,name,email,phone_num,address,gender)       
 VALUES('$id','$name','$email','$phone_num','$address','$gender'  )")
 or die (mysqli_error($myConnection));
header("location: stu_detail.php");
exit();
?>
