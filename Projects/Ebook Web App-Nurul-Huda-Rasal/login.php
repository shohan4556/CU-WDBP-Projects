<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("title/title.php");   ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<!---<script>
function vali()
{
	var x1=document.forms["form"]["name"].value;
	var x2=document.forms["form"]["email"].value;
	var x3=document.forms["form"]["pass"].value;

	 if(x2=="")
	{ alert("email must be field out");
		return true;
	 }
	else if(x3=="")
	{ alert("pass must be field out");
		return true;

	 }



}
</script>--->
<script src="script/vali.js"></script>
</head>

<body>
<div id="head" >
<?php include("header/header.php");   ?>

</div>
<div id="menu">
<?php include("menu/menu.php");   ?>

</div>

<div  id="cont"><center>
<form id="form" action="user/usercheck.php" method="post" >
<h2><div id="email">User name :</div>
<input id="email" name="name" type="text"  /><br />
<div id="pass">Password:</div>
<input id="pass" name="pass" type="password" /><br />
<div id="user">User name :</div>
<select input id="user" input name="user" >*
          <option value=""></option>

      <option value="subadmin">subadmin</option>
	<option value="user">user</option>
	    </select>
    <input type="submit" value="submit" />
</center>
</h2>
</form>



<div id="footer">
<?php include("footer/footer.php");   ?>
</div>
</div>
</body>
</html>