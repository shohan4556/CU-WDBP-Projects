<?php
include("database/config.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include("title/title.php");   ?>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="head" >
<?php include("header/header.php");   ?>


</div>
<div id="menu">

<?php include("menu/menu.php");   ?>
</div>
<div  id="cont">
<center><form method="post" action="filter/filter.php"><input type="search" name="pid" placeholder="search your image..." style="width:50%"/></form></center>
<table><tr>
<td>
<?php

include("containt/containt.php");
include("view.php");

?>
</td></tr>

<tr><td><div id="footer">
<?php include("footer/footer.php");   ?>
</div></tr></td>
</div>
</body>
</html>