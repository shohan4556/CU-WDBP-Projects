
<?php
include("confiq.php");

?>



<!DOCKTYPE html><head> 
<title> University </title>
<style type="text/css">


body{
	background:url(image/new6.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

#p
{
	width:100%;
	height:100px;
	
	
	top:0px;
	position: absolute;
	left:500px;
}
#form
{
	width:100%;
	height:210px;
	
	
	top:80px;
	position: absolute;
	left:500px;
	text-align:center;

}















</style>
</head>
<body style= background-color: bgcolor="#23E4BE">


<div  id="p">
<p style="color: #A81726"><h2><b> Admin Account </b></h2><p>
</div>
<div id="form" >
<form id="signupform" name="signupform" method="post" action="admin_insert.php";>
<table  width="600" border="0" cellspacing="0" cellpading="2">


<tr>

<td><b> Id </b></td>
<td><input name="id" id="name" type="text"><td>

</tr>



<td> <b>User name </b></td>
<td><input name="username" id="name" type="text">
<td>

</tr>


<td> <b>Password </b></td>
<td><input name="password" id="name" type="text"><td>

</tr>


</table>

 <button id="signupbtn" input type="submit"><b>Create Account</b></button>

<a href="create.php"><h3><b> Go To Back </b></button></h3></a>
<a href="INDEX.php"><h3> <b> Go To Home</b> </button></h3></a>


</form>


</body>
</html>