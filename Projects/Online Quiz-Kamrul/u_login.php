<html>
<head>
    <title>
        Online Quiz Contest - QuizBD/login
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
<div class="from">
    <div class="login">
        <p>LogIn With your registered email and password
        </p>
    </div>

    <form method="post">
        <input type="email" name="email" placeholder="Enter Your email"><br> <br>
        <input type="password" name="password" placeholder="Enter Your password">
        <button name="login" type="submit">
            LogIn
        </button>
    </form>
    <div class="ftr">
        <p><span> &copy;2017 QuizBD. All rights resrved. Powered by </span> SmartWebSourve </p>
    </div>
</div>
</body>
</html>

<?php
    include ("db_configure.php");

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $q = "SELECT email,password FROM user_registration WHERE email = '".$email."' AND  password = '".$password."'";
        $result = mysqli_query($conn,$q);

        if(mysqli_num_rows($result) > 0 )
        {
            header("location:u_exam.php");
        }else{
            echo"
            <script>
                alert('Invalid Login');
            </script>
            ";
        }
    }
?>