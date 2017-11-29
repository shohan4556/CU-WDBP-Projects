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


$sql = "SELECT admins.id,admins.username,admins.password
FROM admins WHERE  admins.id=$id
  ";


$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];

$username= $row['username'];
$password= $row['password'];



}


?>

</br></br>
<h2><b>Update From Here</b></h2></br></br>
<form id="signupform" name="signupform" method="post" action="ad_upinsert.php";>
  
  
<br/><br/>
   
<b> Id : </b> <input id="id" input name="nid"  type="int"  maxlength="30" value=<?php echo $id ?> ><br/><br/><br/>
   
<b> Username : </b> <input id="username" input name="nusername"  type="text"  maxlength="30" value=<?php echo $username ?> >
<b> Password : </b> <input id="password" input name="npassword"  type="text"  maxlength="30" value=<?php echo $password ?> ><br/><br/><br/>
    
    
    
    
    
    
    
    
    
    
    <button id="signupbtn" input type="submit"><b>Update Now</b></button>
    
  </form>
<div id="footer">
<ul class="pager">
    <li><button><a href="ad_update.php"><b><big>Previous</big><b></a></button></li>
    
  </ul>
</div>
</body>
</html>