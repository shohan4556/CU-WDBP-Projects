<?php 
	include("login/session.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Ecommerce Site</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
	<div id="main_menu">
		<?php include("menu/smenu.php");   ?>
	</div>
  
		<?php
			
			include("../database/config.php");
			
			$pid = $_GET['id'];
			
			$sql = "delete from subadmin where id='$pid' ";
			
			$query = mysqli_query($myconn,$sql);
			
			if($query==TRUE){
				echo '<h1 style="color:green">Delete Successful.</h1>';
				echo '<a href="index.php">Go to deshboard</a>';
			}
			else{
				echo '<h1 style="color:red">Delete Not Successful.</h1>';
				echo '<a href="index.php">Go to deshboard</a>';
			}
			
		?>
	
  </body>
</html>

