<?php 
	include("login/session.php");
?>

<!DOCTYPE html>

<html>
	<head>
		<style>
			h2{color: darkslategray;display: block;margin-left: 10%;text-align: center;padding-top: 6%;margin-bottom: -1%;}
			.wrapper{width:60%;height:100%;margin:0 auto;background:#e5e5e5;}
			form{margin:0 auto;padding: 3% 1%;}
			.field{margin: 3% 3%;width: 45%;padding: .7%}
			.label{text-align: justify;padding: 5% 1%;margin-left: 8%;}
			.submit_button{display: block;width: 14%;padding: .5% 2%;margin-left: 57%;margin-top: 3%;}
			#fname{color:red;text-align:center}
			#success{color:green;text-align:center}
		</style>
		
		<script>
			function formValidation()
			{
				var pid = document.forms["myform"]["pid"].value;
				var pname = document.forms["myform"]["pname"].value;
				var pprice = document.forms["myform"]["pprice"].value;
				var pdesc = document.forms["myform"]["pdesc"].value;
				
				if(pid=="" || pname=="" || pprice=="" || pdesc==""){
					alert("*All FIelds Must Be Required !!")
					return false;
				}
				else{
					return true;
				}
				
			}
		</script>
	</head>
	<body>
		<div class="">
			<div class="wrapper">
			
				<h2>INSERT NEW ITEM</h2>
				
				<form name="myform" action="product_update.php" method="post" onsubmit="return formValidation()"> 
				
					<?php
	
						include("../../database/config.php");
						
						$pid = $_GET['id'];
						
						$sql = "select * from productinfo where prod_id=$pid";
						
						$query = mysqli_query($myconn,$sql);
						
						while($row=mysqli_fetch_array($query))
						{
							
							$pid=$row['prod_id'];
							$pname=$row['pname'];
							$imgpath=$row['img_path'];
							$pprice=$row['price'];
							$pdesc=$row['description'];
							
						}
						
						
						
						echo '<label class="label">PRODUCT ID :</label><input type="text" name="pid" value="'.$pid.'" class="field" style="margin-left: 8%;"/><br/>
			
						<label class="label">PRODUCT NAME :</label><input type="text" name="pname" value="'.$pname.'" class="field" style="margin-left: 4%;"/><br/>
					
						<label class="label">PRODUCT PRICE :</label><input type="text" name="pprice" value="'.$pprice.'" class="field" style="margin-left: 4%;"/><br/>
					
							
						<label class="label"></label><textarea name="pdesc" id="pdesc"  rows="3" cols="40" class="field" style="margin-left: 21%;}" >
							'.$pdesc.'
						</textarea><br/>
						
						
						<img src="'.$imgpath.'" style="width:20%;height:auto;margin-left:30%"class="img img-responsive" />
						
						<input type="submit" value="SUBMIT" class="submit_button"/>';
					?>
				
					
					
				</form>
				
			</div>	
		</div>
	</body>
</html>