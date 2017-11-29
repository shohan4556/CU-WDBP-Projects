<?php 
	include("session.php");
?>

<!DOCTYPE html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style>
		.main_wrapper{padding:0% 4%}
	</style>
	
	<?php include("../title/main_title.php");   ?>
	
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<script>
		function myFunction() {
			var flag = confirm("Your Item Inserted Successfully");
			
			if(flag==false){
				return false;
			}else {
				return true;
			}
		}
	</script>
	
  </head>
  <body>
	<div id="menu">
		<?php include("customermenu.php");   ?>
	</div>
	
	
	<div class="main_wrapper">
			<div class="row">
			
				<?php
				
					include("../database/config.php");
					$sql="SELECT * FROM productinfo";
					$query=mysqli_query($myconn,$sql);

					while($row=mysqli_fetch_array($query))
					{
						$pid=$row['prod_id'];
						$pname=$row['pname'];	
						$picpath=$row['img_path'];	
						$price=$row['price'];	
						$pdesc=$row['description'];	
						
						echo '<div class="col-sm-4 col-lg-4">';
						echo '<img class="img-responsive" src="../sadmin/'.$picpath.'" alt="Generic placeholder image" width="140" height="140">
						<h2>'.$pname.'</h2>
						Price:'.$price.'Tk <br/><br/>
						<p>'.$pdesc.'</p>
						<p><a class="btn btn-success" href="order_queue.php?id='.$pid.'" onclick=" return myFunction()" role="button">Order Now</a></p>';	
						
						echo '</div>';
					}

				?>
			
			</div>
		</div>
  </body>
</html>