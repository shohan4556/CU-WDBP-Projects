<?php

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>University Account</title>
<style type="text/css">

body{
	background:url(image/13147689_1216512615028238_3381217584563587743_o.jpg)no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	}
table{
	background-color:#000;
	}

td{
	padding-left:13px;
	padding-right:13px;}

#header{
	height:300px;
	width:100%;
	top:0px;
	left:0px;
	right:0px;
	bottom:300px;}


#menu
{
	width:100%;
	height:147px;
	background-color:#000;
	top:300px;
	bottom:447px;
	position: absolute;
	left:0px;
	text-align:left;
	text-shadow:#F0F;
		font-size:24px;
}

#cont
{
	width:100%;
	height:20px;

	top:447px;
	bottom:467px;
	position: absolute;
	left:0px;
	text-align-last:end;
	right:0px;
	text-align-last:end;
	text-shadow:#C6F;

	table-layout:auto;
	text-transform:capitalize;
	text-wrap:normal;
	
}
#hello
{
	width:100%;
	height:153px;
	font-size:24px;
	top:467px;
	bottom:620px;
	left:0px;
	right:0px;
	position: absolute;
	text-shadow:#F0F;	
}

#footer
{
	width:100%;
	height:153px;
	font-size:24px;
	top:630px;
	bottom:783px;
	left:0px;
	right:0px;
	position: absolute;
	text-shadow:#F0F;
}

</style>
</head>

<body link="#660000" vlink="#336600" >

<div id="header">
<h2>
<marquee style=" color:#0FF">
<b>
<big>
Welcome To Create Account Page
</big>
</b>
</marquee>
</h2>
</div>


<div id="menu">

<table align="center">
<tr>
<td>
<a href="student.php" style="text-decoration:none">Student</b></a>
</td>
</tr>

<tr>
<td>
<a href="lec.php" style="text-decoration:none">Lecture</a>
</td>
</tr>

<tr>
<td>
<a href="staff.php" style="text-decoration:none">Staff</a>
</td>
</tr>

<tr>
<td>
<a href="employee.php" style="text-decoration:none">Employee</a>
</td>
</tr>
</table>

</div>



<div id="cont">
<a href="INDEX.php"><button><b> Go to Home</b> </button></a>

</div>





<div id="hello">

<table width="100%">
<tr>
<td>

<table>
<tr>
<td >
<a href="stu_details.php" style="text-decoration:none">Student Details</a>
</td>
</tr>

<tr>
<td >
<a href="lec_details.php" style="text-decoration:none">Lecturer Details</a>
</td>
</tr>

<tr>
<td >
<a href="emp_details.php" style="text-decoration:none">Employee Details</a>
</td>
</tr>

<tr>
<td >
<a href="stf_details.php" style="text-decoration:none">Staff Details</a>
</td>
</tr>
</table>

</td>


<td>
<table align="center">
<tr>
<td >
<a href="stu_update.php" style="text-decoration:none">Student Update</a>
</td>
</tr>

<tr>
<td >
 <a href="lec_update.php" style="text-decoration:none">Lecturer Update</a>
</td>
</tr>

<tr>
<td >
<a href="emp_update.php" style="text-decoration:none">Employee Update</a>
</td>
</tr>

<tr>
<td>
<a href="stf_update.php" style="text-decoration:none">Staff Update</a>
</td>
</tr>
</table>

</td>




<td>
<table align="right">

<tr>
<td >
<a href="stu_delete.php" style="text-decoration:none">Student Delete</a>
</td>
</tr>

<tr>
<td >

<a href="lec_delete.php" style="text-decoration:none">Lecturer Delete</a>
</td>
</tr>

<tr>
<td >
<a href="emp_delete.php" style="text-decoration:none">Employee Delete</a>
</td>
</tr>

<tr>
<td >
<a href="stf_delete.php" style="text-decoration:none">Staff Delete</a>
</td>
</tr>
</table>

</td>
</tr>
</table>

</div>

<div id="footer">

<table width="100%">
<tr >
<td>
<a href="admin_details.php" style="text-decoration:none">Admin Details</a>
</td>



<td style="text-align:right">
<a href="ad_update.php" style="text-decoration:none">Admin Update</a>
</td>


</tr>

<tr style="text-align:center">

<td>
<a href="ad_delete.php" style="text-decoration:none">Admin Delete</a>
</td>


<td>
<a href="admin1.php" style="text-decoration:none">Admin Create</a>
</td>
</tr>

<tr>
<td style="text-align:right">
<a href="result.php" style="text-decoration:none">Result Submit</a>
</td>


<td>
<a href="login.php" style="text-decoration:none">Insert Login</a>
</td>

</tr>
</table>
</body>
</html>