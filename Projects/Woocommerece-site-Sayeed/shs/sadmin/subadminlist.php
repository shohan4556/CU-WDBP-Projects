<?php
	include("login/session.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<script>
		function myFunction() {
			var flag = confirm("Are you sure ?");
			
			if(flag==false){
				return false;
			}else {
				return true;
			}
		}
	</script>
  </head>
  <body>
  
	<div id="main_menu">
		<?php include("menu/smenu.php");   ?>
	<div>
  
	<div class="container" style="margin-top:8%">
	
		<h2 style="text-align:center;margin-bottom:5%"> Sub Admin List.</h2>
		
		<div class="table-responsive">
		  <table class="table table-hover">
		  
			<tr>
				<th>ID.</th>
				<th>Sub admin Name</th>
				<th>Sub Admin Password</th>
				<th>Admin Choice</th>
			</tr>
		  
			<?php

				include("../database/config.php");

				$sql="select * from subadmin";

				$query = mysqli_query($myconn,$sql);

				while($row=mysqli_fetch_array($query))
				{
					$id = $row['id'];
					$username = $row['name'];
					$password = base64_decode($row['password']);
					
					echo '<tr><td>'.$id.'</td><td>'.$username.'</td><td>'.$password.'</td><td><a class="btn btn-danger" href="delete_subadmin.php?id='.$id.' " role="button" onclick="return myFunction()">Delete One Admin</a></td></tr>';
				}
			?>

		  </table>
		</div>
	</div>
	
  </body>
</html>