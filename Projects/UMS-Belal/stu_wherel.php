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

  
<form id="signupform" name="signupform" method="post" action="stu_detailsl.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button>
    
  </form><br/>

 
<?php
$id=$_POST['id'];



include("confiq.php");


$sql = "SELECT * FROM stu_info  WHERE    id='$id' ";
$result=mysqli_query($myConnection,$sql);
//$row = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) )
 {
$id= $row['id'];
$first_name= $row['first_name'];
$mid_name =$row['mid_name'];
$last_name =$row['last_name'];
$address =$row['address'];
$email =$row['email'];

$dept_name =$row['dept_name'];
$gender =$row['gender'];
 }

$sql2 = "SELECT * FROM result  WHERE    id='$id' ";
$result=mysqli_query($myConnection,$sql2);
//$row = mysqli_fetch_array($result);
$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) ){
$semester =$row['semester'];
$subject =$row['subject'];
$marks =$row['marks'];
$gpa =$row['gpa'];






echo'<table>
<tr>
<th > <b>Id</b></th>
<td ><b>	'.$id.'</b></td></tr>
<tr><th ><b>First name</b></th>
<td ><b>'.$first_name.'</b> </td></tr>
<tr><th > <b>Midname</b>	</th>
<td ><b>'.$mid_name.'</b> </td></tr>
<tr><th > <b>Last name	</b></th>
<td ><b>'.$last_name.'</b> </td></tr>
<tr><th > <b>Address</b>	</th>
<td ><b>'.$address.'</b> </td></tr>
<tr><th ><b> Email</b> </th>
<td ><b>'.$email.'</b> </td></tr>

<tr><th > <b>Department </b></th>
<td ><b>'.$dept_name.'</b> </td></tr>
<tr><th > <b>Gender </b></th>
<td ><b>'.$gender.'</b> </td></tr>



<tr><th > <b>Semester</b>	</th>
<td ><b>'.$semester.'</b> </td>	</tr>
<tr><th > <b>Subject	</b></b></th>
<td ><b>'.$subject.'</b> </td>	</tr>
<tr><th > <b>Marks	</b></th>
<td ><b>'.$marks.'</b> </td>	</tr>
<tr><th ><b> Gpa</b>	</th>
<td ><b>'.$gpa.' </b></td>	




	
	
	</tr></table>';


}


?>
<br/><br/><br/><br/><br/>
<div id="footer">
 <p><b><big><i>A M Graphics Design</i></big></b></p>
</div>
</body>
</html>
