<?php
session_start();
error_reporting(1);

if ($_SESSION['regmsg']!="") {
	echo '<script type="text/javascript">';
		echo 'alert("'.$_SESSION['regmsg'].'");';
	echo '</script>';
	}
$_SESSION['regmsg'] = "";
?>
<!DOCTYPE html>
<html>
<head>
	<title>City Mail Server</title>
	<meta charset="utf-8">
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text.css'/>
</head>
<body>
	<div class="main">
		<div class="header" >
			<h1>Welcome to City Mail Server</h1>
		</div>
		<p>Sending mail, audio and video chat with a friend, or give someone a ring all from your inbox</p>
			
			<form action= "registration.php" method="post" enctype="multipart/form-data">
				<ul class="left-form">
					<h2>New Account:</h2>
					<li>
						<input type="text" name="fullname"  placeholder="Full name" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li>

					<li>
						Profile picture:
						<input type="file" name="file_img"  id="file_img" required/>
						<div class="clear"> </div>
					</li> 

					<li>
						<input type="email" name="email"  placeholder="Choose your email (babul@gmail.com)" required/>
						<a href="#" class="icon ticker"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="password"  placeholder="Create a password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li> 
					<li>
						<input type="password" name="cpassword"  placeholder="Confirm your password" required/>
						<a href="#" class="icon into"> </a>
						<div class="clear"> </div>
					</li>
					
					<label class="checkbox"><input type="checkbox" name="checkbox" checked="" required/><i> </i>I accept term & condition......................................</label>
					<input type="submit" value="Create Account" name="reg">
						<div class="clear"> </div>
				</ul>
				</form>

			<form action= "login.php" method="post">
				<ul class="right-form">
					<h3>Login:</h3>
					<div>
						<li><input type="text" name="email" placeholder="email address" required/></li>
						<li> <input type="password" name="password" placeholder="Password" required/></li>
						<h4>I forgot my Password!</h4>
							<input type="submit" value="Login" name="log">
					</div>
					<div class="clear"> </div>
				</ul>
				<div class="clear"> </div>
			</form>
			
		</div>
			
	<div class="copy-right">
		<p>Developed by <a href="https://babul2016.wordpress.com/" target="_blank">Babul Miah</a>, 35th Batch, City University, Panthapath, Dhaka-1205</p> 
	</div>
			
</body>
</html>