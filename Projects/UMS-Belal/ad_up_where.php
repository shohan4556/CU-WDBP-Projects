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
<title>University</title>

</head>
<body>
<div id="header">


</div>

  <div id="menu">

	 
	
  </div>

</div>
<div id="cont">
<form id="signupform" name="signupform" method="post" action="create.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Create Page</b></button>
    
  </form>
  <p><form id="signupform" name="signupform" method="post" action="ad_update.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button>
    
  </form></p>

  

 </div>

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

<html>
<head>
<title>University</title>

</head>
<body>


<div id="header">


</div>

  <div id="menu">

	
	
	


</div>


<h3><b>Update From Here</b></h3>
<form id="signupform" name="signupform" method="post" action="ad_upinsert.php";>
  
  
<div id=""> <b>Which Id Do You Like To Update</b>

    <input id="id" input name="nid"  type="int"   maxlength="30" value=<?php echo $id ?> > 
</div><br/><br/>
   
<b> Id : </b> <input id="id" input name="nid"  type="int"  maxlength="30" value=<?php echo $id ?> ><br/><br/><br/>
   
<b> Username : </b> <input id="username" input name="nusername"  type="text"  maxlength="30" value=<?php echo $username ?> >
<b> Password : </b> <input id="password" input name="npassword"  type="text"  maxlength="30" value=<?php echo $password ?> ><br/><br/><br/>
    
    
    
    
    
    
    
    
    
    
    <button id="signupbtn" input type="submit"><b>Update Now</b></button>
    
  </form>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div id="footer">
 <p><b><big><i>A M Graphics Design</i></big></b></p>
</div>
</body>
</html>
