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
background-image:url(img/job3.jpg);
text-align:center;
position:absolute;


}
#footer
{
width:100%;
height:60px;
left:0px;
top:600px;
background:#9F9
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
    <a href="../library/search.php">Search</a>
	
	
  </div>

</div>
<div id="cont">

<center><table width="700" border="3px" cellspacing="0" cellpadding="6" >
<form id="login" name="login" method="post" action="index1.php";>
  
  
    
   
    <tr><td width="17%" valign="top"> Email Id:</td><td><input id="email" input name="email"  type="text"  maxlength="30"></td></tr>
    
    <tr><td width="17%" valign="top"> Pass Word:</td><td><input id="name" input name="name"  type="text"  maxlength="16"></td></tr>

    <tr><td><button id="login" input type="submit" >Login</button></td></tr>
    
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