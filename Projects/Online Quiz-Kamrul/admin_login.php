<html>
<head><title>
        Online Quiz Contest - QuizBD/adminlogin
    </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="header_area">
    <img src="Image/final-logo264X95.png">
</div>
<div class="navigation_area">
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="u_login.php">Log In</a></li>
        <li><a href="u_registration.php">Join</a></li>
        <li><a href="admin_login.php">Admin</a></li>
    </ul>
</div>

<div class="adminlogin">
    <form method="post">
        <input type="text" name="username" placeholder="Admin Username"><br> <br>
        <input type="password" name="password" placeholder="Admin Password">
        <button type="submit" name="login">LogIn</button>
    </form>
    <div class="ftr">
        <p><span> &copy;2017 QuizBD. All rights resrved. Powered by </span> SmartWebSourve </p>
    </div>
</div>
</body>
</html>

<?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == "admin" && $password == "admin"){
            header("location:admin_operations.php");
        }
    }
?>