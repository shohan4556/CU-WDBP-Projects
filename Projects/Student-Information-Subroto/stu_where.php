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
	color: #FFF;
	text-align:center;
	border:1px solid #060;
	border-collapse:collapse;
	background:#8080FF;
	}
td,th{
	padding:5px;
	column-width:180px;
	max-width:190px;
	min-width:190px;
	
	}
	
</style>
<head>
<title> </title>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
</head>
<body>
<div id="header">
<br/>
</div>
 
<?php
$id=$_POST['id'];



include("confiq.php");


$sql = "SELECT * FROM stu_info  WHERE    id='$id' ";
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

 }

echo'<table>
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
</tr></table>';



?>
<div id="footer">
<ul class="pager">
    <li><button><a href="stu_search.php"><b><big>Previous</big><b></a></button></li>
    
  </ul>
</div>
</body>
</html>