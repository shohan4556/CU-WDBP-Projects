

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
<title>University</title>

</head>
<body>
<div id="header">


</div>

  <div id="menu">

	 
	
  </div>

</div>
<div id="cont">
<form id="signupform" name="signupform" method="post" action="stf_details.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button>
    
  </form><br/>

  
</div>
 </div>
<?php
$id=$_POST['id'];








include("confiq.php");







$sql = "SELECT * FROM staff WHERE    id='$id' 


 ";


$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];
$first_name= $row['first_name'];
$mid_name= $row['mid_name'];
$last_name= $row['last_name'];
$address= $row['address'];
$email =$row['email'];
$phone_num= $row['phone_num'];
$dept_name= $row['dept_name'];
$gender= $row['gender'];

$salary= $row['salary'];



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
<tr><th ><b> Phone num	</b></th>
<td ><b>'.$phone_num.'</b> </td></tr>
<tr><th > <b>Department </b></th>
<td ><b>'.$dept_name.'</b> </td></tr>
<tr><th > <b>Gender </b></th>
<td ><b>'.$gender.'</b> </td></tr>
<tr><th > <b>Salary	</b></th>
<td ><b>'.$salary.'</b> </td>	

</tr></table>';


/*echo" id:	$id";
echo" 	name:$name";
echo" 	amount:$amount <br />";*/	

}


?>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div id="footer">
 <p><b><big><i>A M Graphics Design</i></big></b></p>
</div>
</div>
</body>
</html>
