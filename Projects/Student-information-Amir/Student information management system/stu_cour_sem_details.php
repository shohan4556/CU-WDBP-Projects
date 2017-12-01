<!DOCTYPE HTML>
<html>
<head><title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style link rel="stylesheet" href="stylesheet.css" type="text/css">

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
	#header{
	text-align:center;}
	
	#form{
	width:50%;
	height:210px;
	
	
	top:80px;
	position: absolute;
	left:500px;
	text-align:center;}
</style>
</head>
<body>

<div id="header">
<p style="align:center"><h2 >Student Information</h2></p>
<br \><br \>
<br \><br \>
</div>

<?php



$id=$_POST['id'];



include("confiq.php");


$sql = 



"SELECT stu.id,stu.name,stu.email,stu.phone_num,stu.address,stu.gender,c.coursename,c.semester_name
 FROM stu_info stu,course c where stu.id=c.id order by c.id ";
$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) )
 {
$id= $row['id'];
$name= $row['name'];


$email =$row['email'];
$phone_num =$row['phone_num'];
$address =$row['address'];
$gender =$row['gender'];
$semester_name =$row['semester_name'];
$coursename =$row['coursename'];

 }

echo'<form id="form"><table>
<tr>
<th > <b>Id</b></th>
<td ><b>	'.$id.'</b></td></tr>
<tr><th ><b>Name</b></th>
<td ><b>'.$name.'</b> </td></tr>


<tr><th ><b> Email</b> </th>
<td ><b>'.$email.'</b> </td></tr>
<tr><th ><b> Phone num	</b></th>
<td ><b>'.$phone_num.'</b> </td></tr>
<tr><th > <b>Address</b>	</th>
<td ><b>'.$address.'</b> </td></tr>

<tr><th > <b>Gender </b></th>
<td ><b>'.$gender.'</b> </td></tr>
</tr>

<tr><th > <b>Semester Name</b></th>
<td ><b>'.$semester_name.'</b> </td></tr>
<tr><th > <b>Course Name</b></th>
<td ><b>'.$coursename.'</b> </td><tr>




</table></form>';


'<ul class="pager">
    <li><a href="index.php"><b><big>Previous</big><b></a></li>
    
  </ul>'





?>
 </div>

<div id="footer">

</div>
</body>
</html>