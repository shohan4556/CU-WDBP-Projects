<?php 
	include("login/session.php");
?>

<!DOCTYPE html>

<html>
	<head>
		<style>
			h2{color: darkslategray;display: block;margin-left: 10%;text-align: center;padding-top: 6%;margin-bottom: -1%;}
			.wrapper{width:50%;height:100%;margin:0 auto;background:#e5e5e5;}
			form{margin:0 auto;padding: 3% 1%;}
			.field{margin: 3% 3%;width: 45%;padding: .7%}
			.label{text-align: justify;padding: 5% 1%;margin-left: 8%;}
			.submit_button{display: block;width: 14%;padding: .5% 2%;margin-left: 59%;margin-top: 3%;}
			#fname,#lname,#phone,#email,#bdate,#address,#gender,#conpass,#password{color:red;text-align:center}
			#success{color:green;text-align:center}
		</style>
		
		<script>
			function formValidation()
			{
				var firstName = document.forms["myform"]["fname"].value;
				var password = document.forms["myform"]["password"].value;
				
				if(firstName=="" || password==""){
					alert("*All field must be required");
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
			
				<h2>SUB ADMIN REGISTRATION FORM</h2>
				
				<form name="myform" action="sub_admin_insert.php" method="post" onsubmit="return formValidation()"> 
				
					<label class="label">FULL NAME :</label><input type="Text" name="fname" placeholder="Enter Full Name.. " class="field"/><br/> 
					
					<label class="label">PASSWORD :</label><input type="password" name="password" placeholder="Enter password.." class="field" style="margin-left: 4%;"/><br/>
					
					<input type="submit" value="SUBMIT" class="submit_button"/>
				</form>
				
			</div>	
		</div>
	</body>
</html>