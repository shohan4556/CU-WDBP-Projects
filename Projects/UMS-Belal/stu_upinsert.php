
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
body{
		background:#CCC;	
	}

table,th,td{
	color:#FFF;
	text-align:center;
	border:1px solid #060;
	border-collapse:collapse;
	background:#603;
	}
td,th{
	padding:5px;
	column-width:160px;
	max-width:160px;
	min-width:160px;
	}
	
</style>
<title>University</title>

</head>
<body>
<div id="header">


</div>

  <div id="menu">

	 
	
  </div>

</div>
<div id="cont">
<form id="signupform" name="signupform" method="post" action="stu_update.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button>
    
  </form><br/>

  
</div>
 </div>







<?php

$id=$_POST['nid'];
$first_name=$_POST['nfirst_name'];

$mid_name=$_POST['nmid_name'];
$last_name=$_POST['nlast_name'];

$address=$_POST['naddress'];
$email=$_POST['nemail'];

$phone_num=$_POST['nphone_num'];

$dept_name=$_POST['ndept_name'];
$gender=$_POST['ngender'];

$username=$_POST['nusername'];
$password=$_POST['npassword'];

$semester=$_POST['nsemester'];

$subject=$_POST['nsubject'];

$marks=$_POST['nmarks'];
$gpa=$_POST['ngpa'];


include("confiq.php");



$sql = "UPDATE  stu_info,login,result SET stu_info.id = '$id',stu_info.first_name='$first_name',stu_info.mid_name='$mid_name',stu_info.last_name='$last_name',stu_info.address='$address',stu_info.email='$email',stu_info.phone_num='$phone_num',stu_info.dept_name='$dept_name',stu_info.gender='$gender',login.username='$username',login.password='$password',
result.semester='$semester',result.subject='$subject',result.marks='$marks',result.gpa='$gpa' WHERE stu_info.id =login.id AND stu_info.id= result.id AND stu_info.id=$id; 
 ";
$result=mysqli_query($myConnection,$sql);

if(! $result ) { die('Could not update data: ' . mysql_error()); } 
echo "Updated data successfully\n"; 
mysqli_close($myConnection);



?>