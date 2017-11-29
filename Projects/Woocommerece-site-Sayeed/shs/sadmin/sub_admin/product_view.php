<?php 
	include("login/session.php");
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <?php include("../../title/main_title.php");   ?>
	
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
	
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
		<div id="samdin_menu">
			<?php include("menu/subadminmenu.php");   ?>
		</div>
		
		<div class="container">
			<div class="row">
			
				<?php
					include("../../database/config.php");
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
						echo '<img class="img-responsive" src="../'.$picpath.'" alt="Generic placeholder image" width="140" height="140">
						<h2>'.$pname.'</h2>
						Price:'.$price.'Tk <br/><br>
						<p>'.$pdesc.'</p><br>
						<p><a class="btn btn-primary" href="product_update_form.php?id='.$pid.' " role="button">Edit Product</a> <a class="btn btn-danger" href="delete_product.php?id='.$pid.' " role="button" onclick="return myFunction()">Delete Product</a></p>';	
						
						echo '</div>';
					}

				?>
			
			</div>
		</div>
  </body>
</html>