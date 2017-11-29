<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">




body{
	background: no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

#p
{
	width:50%;
	height:100px;
	
	
	top:0px;
	position: absolute;
	left:500px;
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
	 right:0px;
	 }
    #footer{
		text-align:right;
		font-color:red;
	}


   	 
</style>
<head>
<title></title>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
</head>






<body>

<div  id="p">
<p style="color: #A81726"><h2><b> Student Details Information</b></h2><p>
</div> </br></br></br>
  <div id="menu">	
  </div>
<div id="cont">

<?php
include("confiq.php");
echo'<table align="center">
<tr>
<th ><b>Student Id </b></th>
<th ><b>Student Name</b></th>
<th ><b>Student Email</b></th>
<th > <b>Course Name</b></th>
<th > <b>Semester Name </b></th>
</tr>
</table>';
$query = "SELECT s.studentid,s.name,s.email,c.coursename,c.semester_name 
 FROM student s join  course c on
 s.studentid=c.studentid order by s.studentid ";
		if ($conn->query($sql) === TRUE) {
			echo "Saved successfully";
		}
	
	
	$result = $conn->query( $query );
	$num_results = $result->num_rows;
	echo "<div><a href='Course_semester_admission.php'>Create New Record</a></div>";
	
	if($num_results > 0){
$studentid= $row['studentid'];
$name= $row['name'];
$name =$row['name'];
$email =$row['email'];
$coursename =$row['coursename'];
$semester_name =$row['semester_name'];
echo'<table align="center">
<tr>
<td >	'.$studentid.'</td>
<td >'.$name.' </td>
<td >'.$email.' </td>
<td >'.$coursename.' </td>
<td >'.$semester_name.' </td>	
	</tr></table>';
}
?>
</div>

<br/><button><a href="index.php"> <b>back to Home</b> </a></button>

<div id="footer">

</div>
</body>
</html>