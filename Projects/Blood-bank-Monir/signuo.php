<link rel="stylesheet" type="text/css" href="style.css">
<?php 
	include("header.php");
	include("menu.php")
?>

<script type="text/javascript">
	
	function valid () {
		var name = document.forms['form']['fname'].value;
		var password = document.forms['form']['password'].value;
		var repassword = document.forms['form']['repassword'].value;
		var email = document.forms['form']['eamil'].value;
		var reemail = document.forms['form']['reemail'].value;
		var bg = document.forms['form']['bg'].value;
		var age = document.forms['form']['age'].value;
		var phone = document.forms['form']['phone'].value;
		if(name == "" || password == "" || repassword == "" || email=="" || reemail=="" || bg == "" || age == "" || phone == ""){
			alert("Password or username empty!");
			return false;
		}
		else{
			return true;
		}
	}

</script>

<form name="form" action="signup_submit.php" method="post" accept-charset="utf-8" onsubmit="return valid()">
	<table>
		<caption>SignUp</caption>
		<tbody>
			<tr>
				<td>FullName</td><td>:</td><td><input type="text" name="fname"></td>
			</tr>
			<tr>
				<td>Email</td><td>:</td><td><input type="email" name="email"></td></tr>
				<tr><td>Re-Email</td><td>:</td><td><input type="email" name="reemail"></td>
			</tr>
			<tr><td>Mobile Number</td><td>:</td><td><input type="number" name="phone"></td></tr>
			<tr>
				<td>Blood Group</td><td>:</td><td><select name="bg">
					<option value="">select</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
				</select></td>
			</tr>
			<tr>
				<td>Age</td><td>:</td><td><input type="number" name="age"></td>
			</tr>
			<tr>
				<td>Password</td><td>:</td><td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td>Re-Password</td><td>:</td><td><input type="password" name="repassword"></td>
			</tr>
			<tr>
				<td><a href="login.php">LogIn</a></td><td>||</td><td><input type="submit" name="submit" value="submit"></td>
			</tr>
		</tbody>
</table>
</form>