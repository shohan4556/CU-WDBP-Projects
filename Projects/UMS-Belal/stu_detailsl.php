<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
body{
	background:url(image/new2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
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
<head>
<title>University</title>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
</head>
<body>
<div id="header">


</div>

  <div id="menu">

	
	
	
  </div>

</div>
<div id="cont">

<form id="signupform" name="signupform" method="post" action="stu_searchl.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b><big>Search Here</big></b></button>
    
  </form>
  
 <p> <form id="signupform" name="signupform" method="post" action="INDEX.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button></form></p>
    

<?php

include("confiq.php");
echo'<table>
<tr>
<th ><b> Id </b></th>
<th ><b>First name</b></th>
<th ><b> Mid name	</b></th>
<th > <b>Last name</b></th>
<th > <b>Address	</b></th>
<th > <b>Email </b></th>

<th > <b>Department </b></th>
<th > <b>Gender </b></th>


<th > <b>Semester </b></th>
<th > <b>Subject </b></th>
<th > <b>Marks </b></th>
<th > <b>Gpa </b></th>


</tr>
</table>';

$sql = "SELECT stu_info.id,stu_info.first_name,stu_info.mid_name,stu_info.last_name,stu_info.address,stu_info.email,
stu_info.dept_name,stu_info.gender,result.semester,
result.subject,result.marks,result.gpa FROM stu_info,result WHERE stu_info.id=result.id ";
$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];
$first_name= $row['first_name'];
$mid_name =$row['mid_name'];
$last_name =$row['last_name'];
$address =$row['address'];
$email =$row['email'];

$dept_name =$row['dept_name'];
$gender =$row['gender'];



$semester =$row['semester'];
$subject =$row['subject'];
$marks =$row['marks'];


$gpa =$row['gpa'];



echo'<table>
<tr>
<td >	'.$id.'</td>
<td >'.$first_name.' </td>
<td >'.$mid_name.' </td>
<td >'.$last_name.' </td>
<td >'.$address.' </td>
<td >'.$email.' </td>

<td >'.$dept_name.' </td>
<td >'.$gender.' </td>

<td >'.$semester.' </td>
<td >'.$subject.' </td>
<td >'.$marks.' </td>
<td >'.$gpa.' </td>	
	
	</tr></table>';
}



?>



 </div>
<div id="footer">
 
</div>





</body>
</html>



