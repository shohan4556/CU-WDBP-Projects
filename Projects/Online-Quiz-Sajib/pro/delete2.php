<!DOCTYPE html>
<html lang="en">
<head>
  <script src="../scripts/quizzer.js" type="text/javascript"></script>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="../css/normalize.css">
  <link rel="stylesheet" href="../css/skeleton.css">
    <link rel="stylesheet" href="../css/style.css">
  <title>Add Record Form</title>
</head>

<body>
    
     <div id="header">

<?php include("../header/header.php");   ?>

</div>

<div id="menu"> 

<?php include("../menu/menu1.php");   ?>

	</div>
	<div id="menu1"> 

<?php include("menu.php");   ?>

	</div>
	
	<div id="sbar">
    
    <center><h2 style="font-style:italic;"><b>Option</b></h2></center>
    
    <?php include("../sidebar/leftsidebar.php");   ?>
    
</div>
	<div id="sbar1"></div>
	
	<div id="cont">
    
    
  <center>
    <?php

    $tab = $_POST['dbtable'];

    require '../config/config.php';

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "delete from results where quiz='$tab'";
    $result = $conn->query($sql);

    $sql = "delete from all_tests where name='$tab'";
    $result = $conn->query($sql);

    $sql = "drop table $tab";
    $result = $conn->query($sql);

    echo "Done";

    $conn->close();
    ?>

    <br>
    <input class=btn type=button value='Go Home' onClick=window.location.href='../index.php'>

  </center>
        
         </div>
	
	<div id="footer">

<?php include("../footer/footer.php");   ?>

</div>
</body>
</html>
