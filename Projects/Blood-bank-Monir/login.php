<link rel="stylesheet" type="text/css" href="style.css">
<?php 
	include("header.php");
	include("menu.php");
?>

<script type="text/javascript">
	
	function valid () {
		var name = document.forms['form']['name'].value;
		var password = document.forms['form']['password'].value;
		if(name == "" || password == ""){
			alert("Password or username empty!");
			return false;
		}
		else{
			return true;
		}
	}

</script>

<form name="form" action="login_submit.php" method="post" accept-charset="u
f-8" onsubmit="return valid()">
	<table>
		<caption>Log In</caption>
		<tbody>
			<tr>
				<td>UserName</td><td>:</td><td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Password</td><td>:</td><td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><a href="signuo.php">SignUp</a></td><td>||</td><td><input type="submit" name="submit" value="LogIn"></td>
			</tr>
		</tbody>
	</table>
</form>