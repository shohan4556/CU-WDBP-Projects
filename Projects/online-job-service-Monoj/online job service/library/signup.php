<?php
include("config.php");

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Bank</title>
<style>
#cont
{
width:100%;
height:550px;
left:0px;
top:50px;
background:brown;
background-image:url(img/jobs.png);
text-align:center;
position:absolute;


}
#footer
{
width:100%;
height:60px;
left:0px;
top:600px;
background:#666;
text-align:center;
position:absolute;

}
#menu{
width:100%;
height:60px;
left:0px;
top:0px;

text-align:center;
font-size:24px;
background-color: #666;
position:absolute;
}

</style>

</head>
<body>
<div id="header">


</div>

  <div id="menu">

	 <a href="../library/index.php">home</a>
	<a href="../library/signup.php">Registration</a>
	<a href="../library/login.php">Login</a>
	<a href="../library/about.php">About Us</a>
    <a href="#">Search</a>
	
	
  </div>

</div>
<div id="cont">
<h3>Fill it your valid information</h3>
<center><table width="700" border="3px" cellspacing="0" cellpadding="6" >
<form id="signupform" name="signupform" method="post" action="insert.php";>
  
  
    
    <tr><td width="17%" valign="top"> Name:</td><td><input id="name" input name="name"  type="text"  maxlength="16"></td></tr>
    <tr><td width="17%" valign="top"> Email Id:</td><td><input id="email" input name="email"  type="text"  maxlength="30"></td></tr>
    <tr><td width="17%" valign="top"> Age:</td><td><input id="age" input name="age"  type="number"  maxlength="16"></td></tr>
    <tr><td width="17%" valign="top"> Gender:</td>                  

<td><select input name="gender" id="name" type="text" maxlength="16">
<option value="">Male</option>
	<option value="">Female</option><td>
</td></select>



	</tr>
    
    <tr><td width="17%" valign="top"> Pass Word:</td><td><input id="password" input name="password"  type="text"  maxlength="16"></td></tr>

    <tr><td><button id="signupbtn" input type="submit" >Submit</button></td></tr>
    
  </form>
</table>
</center>
    

</div>
 </div>
<div id="footer">
 <p> <marquee >design by Monoj Biswas</marquee></p>
</div>
</body>
</html>