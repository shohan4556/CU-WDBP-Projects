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
				var pimage = document.forms["myform"]["pimage"].value;
				var pdesc = document.forms["myform"]["pdesc"].value;
				
				if(pid=="" || pname=="" || pprice=="" || pimage=="" || pdesc==""){
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
				
				<form name="myform" action="insert_new_item.php" method="post" enctype="multipart/form-data" onsubmit="return formValidation()"> 
				
					<label class="label">PRODUCT ID :</label><input type="text" name="pid" placeholder="Enter  Product Id.." class="field" style="margin-left: 8%;"/><br/>
			
					<label class="label">PRODUCT NAME :</label><input type="text" name="pname" placeholder="Enter  Product Name.." class="field" style="margin-left: 4%;"/><br/>
					
					<label class="label">PRODUCT PRICE :</label><input type="text" name="pprice" placeholder="Enter  Product Price.." class="field" style="margin-left: 4%;"/><br/>
					
					<label class="label">PRODUCT IMAGE :</label><input type="file" name="pimage" id="pimage"  class="field" style="margin-left: 6%;"/><br/>
							
					<label class="label"></label>
					<textarea name="pdesc" id="pdesc"  rows="3" cols="40" placeholder="Enter Product Description Here.." class="field" style="margin-left: 21%;}" ></textarea><br/>
					
					<input type="submit" name="btn_upload" value="SUBMIT" class="submit_button"/>
					
				</form>
				
			</div>	
		</div>
	</body>
</html>