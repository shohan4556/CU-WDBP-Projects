<?php
$id=$_POST['stu_id'];
$first_name=$_POST['first_name'];
$mid_name=$_POST['mid_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$phone_num=$_POST['phone_num'];
$address=$_POST['address'];
$gender=$_POST['gender'];



include("confiq.php");
$query = mysqli_query($myConnection, "INSERT INTO stu_info (stu_id,first_name,mid_name,last_name,email,phone_num,address,gender) 
       
 VALUES('$id','$first_name','$mid_name','$last_name','$email','$phone_num','$address','$gender'  )")
 or die (mysqli_error($myConnection));






header("location: stu_info.php");

exit();
?>
