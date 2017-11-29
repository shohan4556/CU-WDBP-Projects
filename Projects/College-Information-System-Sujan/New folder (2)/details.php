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
	#cont{
	 right:0px;}	
</style>
<head>
<title></title>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
</head>
<body>
<div id="header">
</div>
  <div id="menu">	
  </div>
<div id="cont">
<a href="index.php"><h3><button> <b>Go To Home</b> </button></h3></a>

  <br>
<?php
include("confiq.php");
echo'<table align="center">
<tr>
<th ><b>Student Id </b></th>
<th > <b>Admission Id </b></th>
<th ><b>Student Name</b></th>
<th > <b>Admission Date </b></th>
<th > <b>Course Name</b></th>
<th > <b>Semester Name </b></th>
</tr>
</table>';
$sql = "SELECT stu_info.id,a.admissionid,stu_info.name,a.admissiondate,c.coursename,s.semester_name 
 FROM stu_info join admission a on stu_info.id=a.id join student_course_semester sc on sc.id=stu_info.id join course c on c.courseid=sc.courseid join semester s on s.semesterid=sc.semesterid ";
$result=mysqli_query($myConnection,$sql);
$count=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];
$admissionid =$row['admissionid'];
$name= $row['name'];
$admissiondate =$row['admissiondate'];
$coursename =$row['coursename'];
$semestername =$row['semester_name'];
echo'<table align="center">
<tr>
<td >	'.$id.'</td>
<td >'.$admissionid.' </td>
<td >'.$name.' </td>
<td >'.$admissiondate.' </td>
<td >'.$coursename.' </td>
<td >'.$semestername.' </td>	
	</tr></table>';
}
?>
 </div>
<div id="footer">
</div>
</body>
</html>