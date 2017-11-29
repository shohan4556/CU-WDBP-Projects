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
<form id="signupform" name="signupform" method="post" action="emp_update.php";>
  
  
    
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


include("confiq.php");


$sql = "UPDATE  employee  SET id = '$id' , first_name='$first_name' ,  mid_name='$mid_name', last_name='$last_name',
address='$address',
email='$email',
phone_num='$phone_num',
dept_name='$dept_name',
gender='$gender',
salary='$salary' WHERE id='$id' ";
$result=mysqli_query($myConnection,$sql);

if(! $result ) { die('Could not update data: ' . mysql_error()); } 
echo "Updated data successfully\n"; 
mysqli_close($myConnection);



?>