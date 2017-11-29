<?php 

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
			#fname,#lname,#phone,#email,#bdate,#address,#gender,#conpass,#password{color:red;text-align:center}
			#success{color:green;text-align:center}
		</style>
		
		<script>
			function formValidation()
			{
				var firstName = document.forms["myform"]["fname"].value;
				var phoneNo = document.forms["myform"]["phone"].value;
				var emailId = document.forms["myform"]["email"].value;
				var address = document.forms["myform"]["address"].value;
				var gender = document.forms["myform"]["gender"].value;
				var conpass = document.forms["myform"]["conpass"].value;
				var password = document.forms["myform"]["password"].value;
				var flag=0;
				
				if(firstName==""){
					document.getElementById("fname").innerHTML ="*First name must be required.";
					flag=0;
				}
				else{
					document.getElementById("fname").innerHTML ="";
					flag=1;
				}
				
				
				if(phoneNo==""){
					document.getElementById("phone").innerHTML ="*Phone No must be required.";
					flag=0;
				}
				else{
					document.getElementById("phone").innerHTML ="";
					flag=flag+1;
				}
				
				if(emailId==""){
					document.getElementById("email").innerHTML ="*Email Id must be required.";
					flag=0;
				}
				else{
					document.getElementById("email").innerHTML ="";
					flag=flag+1;
				}
				
				
				if(address==""){
					document.getElementById("address").innerHTML ="*Address must be required.";
					flag=0;
				}
				else{
					document.getElementById("address").innerHTML ="";
					flag=flag+1;
				}
				
				if(gender==""){
					document.getElementById("gender").innerHTML ="*Gender must be required.";
					flag=0;
				}
				else{
					document.getElementById("gender").innerHTML ="";
					flag=flag+1;
				}
				
				if(conpass==""){
					document.getElementById("conpass").innerHTML ="*This field must be required.";
					flag=0;
				}
				else{
					document.getElementById("conpass").innerHTML ="";
					flag=flag+1;
				}
				
				if(password==""){
					document.getElementById("password").innerHTML ="*Password must be required.";
					flag=0;
				}
				else{
					document.getElementById("password").innerHTML ="";
					flag=flag+1;
				}
				
				if(flag==7){
					
					return true;
				}
				else{
					return false;
				}
				
			}	
		</script>
	</head>
	<body>
		<div class="">
			<div class="wrapper">
			
				<h2>CUSTOMER REGISTRATION FORM</h2>
				
				<form name="myform" action="insert_customer_info.php" method="post" onsubmit="return formValidation()"> 
				
					<label class="label">Full Name :</label><input type="Text" name="fname" placeholder="Enter Full Name.. " class="field"/><label id="fname"></label><br/> 
			
					<label class="label">Phone No :</label><input type="Text" name="phone" placeholder="Enter  Phone No.." class="field" style="margin-left: 4%;"/><label id="phone"></label><br/>
					
					<label class="label">Email Id No :</label><input type="mail" name="email" placeholder="Enter  Your Email.." class="field" style="margin-left: 2%;"/><label id="email"></label><br/>
					
					<label class="label">Address :</label><input type="text" name="address" placeholder="Enter your address.." class="field" style="margin-left: 6%;"/><label id="address"></label><br/>
					
					<label class="label">Gender :</label><input type="radio" name="gender" value="male" style="margin-left: 7%;">Male</input>
							<input type="radio" name="gender" value="female" style="margin-left: 2%;">Female</input><label id="gender"></label> <br/>
							
					<label class="label">Password :</label><input type="password" name="password" placeholder="Enter your password.." class="field" style="margin-left: 5%;"/><label id="password"></label><br/>
					
					<label class="label">Confirm :</label><input type="password" name="conpass" placeholder="Confirm your password.." class="field" style="margin-left: 6%;"/><label id="conpass"></label> <br/>
					
					<input type="submit" value="SUBMIT" class="submit_button"/>
				</form>
				
			</div>	
		</div>
	</body>
</html>