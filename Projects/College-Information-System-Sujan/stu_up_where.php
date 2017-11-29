<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
body{
	background:url(image/new5.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  text-align:center;
  color:white;
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
</head>
<body>

<?php
$id= $_POST['id'];
include("confiq.php");

$sql = "SELECT * FROM stu_info s WHERE  id='$id' ";
$result=mysqli_query($myConnection,$sql);
$count=mysqli_num_rows($result);
while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];
$name= $row['name'];
$email =$row['email'];
$phone_num =$row['phone_num'];
$address =$row['address'];
$gender =$row['gender'];
}
?>
</br></br>
<h2><b>Update From Here</b></h2></br></br>
<form id="signupform" name="signupform" method="post" action="stu_upinsert.php";>
 
<b> Id :  </b><input id="id" input name="nid"  type="int"  maxlength="30" value=<?php echo $id ?> ><br/><br/><br/></br> 
<b> Name : </b> <input id="name" input name="nname"  type="text"  maxlength="30" value=<?php echo $name  ?> > 
<b>  Email :  </b><input id="email" input name="nemail"  type="text"  maxlength="30" value=<?php echo $email ?> >
 <b>Phone num :  </b> <input id="phone_num" input name="nphone_num"  type="varchar"  maxlength="30" value=<?php echo $phone_num ?> ><br/><br/></br><br/>
<b> Address  : </b> <input id="address" input name="naddress"  type="varchar"  maxlength="255" value=<?php echo $address ?> >
 <b> Gender : </b> <select input id="gender" input name="ngender"  type="enum"  maxlength="30" value=<?php echo $gender ?> ><option value="Male">Male</option>
	<option value="Female">Female</option>
    </select></br></br></br></br>
 
    <button id="signupbtn" input type="submit"><b>Update Now</b></button>
    
  </form>
<div id="footer">
<ul class="pager">
    <li><button><a href="stu_update.php"><b><big>Previous</big><b></a></button></li>
    
  </ul>
</div>
</body>
</html>