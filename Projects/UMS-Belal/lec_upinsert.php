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
	column-width:150px;
	max-width:150px;
	min-width:150px;
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
<form id="signupform" name="signupform" method="post" action="lec_update.php";>
  
  
    
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
$salary=$_POST['nsalary'];
$username=$_POST['nusername'];
$password=$_POST['npassword'];


include("confiq.php");




$sql = "UPDATE  lecturer,subadmin   SET lecturer.id = '$id',lecturer.first_name='$first_name', lecturer.mid_name='$mid_name',lecturer.last_name='$last_name',
lecturer.address='$address',
lecturer.email='$email',
lecturer.phone_num='$phone_num',
lecturer.dept_name='$dept_name',
lecturer.gender='$gender', 
lecturer.salary='$salary',subadmin.username='$username',subadmin.password='$password' WHERE lecturer.id=subadmin.id AND lecturer.id=$id   ";
$result=mysqli_query($myConnection,$sql);

if(! $result ) { die('Could not update data: ' . mysql_error()); } 
echo "Updated data successfully\n"; 
mysqli_close($myConnection);














?>