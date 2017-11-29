<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("title/title.php");   ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
 <script src="script/signupvali.js"></script>


</head>

<body>
<div id="head" >
<?php include("header/header.php");   ?>

</div>
<div id="menu">
<?php include("menu/menu.php");   ?>

</div>

<div  id="cont">
<center><h3>Sign Up Here</h3>
<form id="sform" name="sform" method="post" action="cuinsert.php" onsubmit="return validateForm();";>

      <div>Username: </div>
    <input id="username"  name="name" type="text"  maxlength="16">*

    <div>Email Address:</div>
    <input id="email"  name="email" type="email"  maxlength="88">*
    <div>Create Password:</div>
    <input id="password"  name="password" type="password"  maxlength="16">*
    <div>Gender:</div>
    <select input id="gender"  name="gender" >*
      <option value=""></option>
      <option value="m">Male</option>
      <option value="f">Female</option>
       <option value="o">Other</option>

    </select>
    <div>Country:</div>*
    <select input id="country" input name="country" >*
          <option value=""></option>

      <option value="bangladesh">Bangladesh</option>
	<option value="india">India</option>
	<option value="pakistan">Pakistan</option>

    </select>

    <input type="submit" value="Create Account" />
</center>
  </form>



<div id="footer">
<?php include("footer/footer.php");   ?>

</div>
</div>
</body>
</html>