<?php
include("database/config.php")
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delicious</title>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

	<div id="header">

<?php include("header/header.php");   ?>

</div>

<div id="menu"> 



	</div>
	<div id="menu1"> 

<?php include("menu/menu.php");   ?>

	</div>
	
	<div id="sbar">
    
    <center><h2 style="font-style:italic;"><b>Item</b></h2></center>
    
    <?php include("sidebar/leftsidebar.php");   ?>
    
</div>
	<div id="sbar1"></div>
	
	<div id="cont">
    
    <div id="cont1">
    <h2 style="font-style:italic"><b>Desert</b></h2>
    <?php include("Admin/item.php");   ?>
    <a href="desert.php"><p>...See more</p></a>
    </div>
    
    <div id="cont2">
    <h2 style="font-style:italic"><b>Deshi</b></h2>
    <?php include("Admin/item.php");   ?>
    <a href="deshi.php"><p>...See more</p></a>
    </div>
    
    <div id="cont3">
    <h2 style="font-style:italic"><b>Chinese</b></h2>
    <?php include("Admin/item.php");   ?>
    <a href="chinese.php"><p>...See more</p></a>
    </div>
    
    <div id="cont4">
    <h2 style="font-style:italic"><b>Fast Food</b></h2>
    <?php include("Admin/item.php");   ?>
    <a href="fastFood.php"><p>...See more</p></a>
    </div>    
    
</div>
	
	<div id="footer">

<?php include("footer/footer.php");   ?>

</div>

</body>
</html>
