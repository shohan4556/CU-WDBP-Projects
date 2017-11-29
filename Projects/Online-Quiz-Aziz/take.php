<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
     <link rel="stylesheet" href="css/style.css">
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
    
	<center>
		<form action="take2.php" method="post">
			<?php

			require 'config/config.php';

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT name FROM all_tests";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<input type='submit' class=btn name = 'dbtable' value = '". $row["name"]."'><br>";
				}
			}
			else {
				echo "0 results";
			}

			$conn->close();
			?>
		</form>
		<input class=btn type=button value='Go Home' onClick=window.location.href='index.php'>
	</center>
        
        
        </div>
	
	<div id="footer">

<?php include("footer/footer.php");   ?>

</div>
    
</body>
</html>
