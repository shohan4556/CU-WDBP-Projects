<!DOCTYPE html>
<html>
<head>
	<title>
		Home
	</title>
	<link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
	<style>
	div {
		height:50%;
		position:relative;
		top:20%;
	}
	</style>
</head>
<body>
    
    <div id="header">

<?php include("header/header.php");   ?>

</div>

<div id="menu"> 

<?php include("menu/menu1.php");   ?>

	</div>
	<div id="menu1"> 

<?php include("menu/menu.php");   ?>

	</div>
	
	<div id="sbar">
    
    <center><h2 style="font-style:italic;"><b>Option</b></h2></center>
    
    <?php include("sidebar/leftsidebar.php");   ?>
    
</div>
	<div id="sbar1"></div>
	
	<div id="cont">
    
    
        
 
	<?php

	require 'config/config.php';

	// connection link
	$link=mysqli_connect($servername, $username, $password);

	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	// created database 
	mysqli_query($link,"CREATE DATABASE IF NOT EXISTS $dbname");

	$link = mysqli_connect($servername, $username, $password, $dbname);
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

	$val = mysqli_query($link,"select 1 from results LIMIT 1");
	if($val === false){
		$sql = "create table results(name varchar(20),rno varchar(20),stream varchar(10),college varchar(20),score int(2), quiz varchar(20))";
		mysqli_query($link, $sql);
		//echo "created results! <br>";
	}

	$val = mysqli_query($link,"select 1 from all_tests LIMIT 1");
	if($val == FALSE) {
		$sql = "create table all_tests(name varchar(50))";
		mysqli_query($link, $sql);
		//echo "created all_tests! <br>";
	}

	mysqli_close($link);
	?>
	<center>
		<div>
			<input class=btn type=button value="Make test" onClick="window.location.href='insert1.php'">
			<br><br><br><br>
			<input class=btn type=button value="Take test" onClick="window.location.href='take.php'">
			<br><br><br><br>
			<input class=btn type=button value="Results" onClick="window.location.href='results.php'">
			<br><br><br><br>
			<input class=btn type=button value="Delete Test" onClick="window.location.href='pro/delete.php'">

	</div>
</center>
        
        
        
        
        
    
</div>
	
	<div id="footer">

<?php include("footer/footer.php");   ?>

</div>
    
    
    
    
    
    
   
</body>
</html>
