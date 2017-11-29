<html>
<head>
    <title>
        Online Quiz Contest - QuizBD/registration
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
    <div class="h">
        <h1>Crate a new account
        </h1>
        <p>It's free
        </p>
    </div>

    <form method="post">
        <input type="text" name="fName" placeholder="First Name"><br> <br>
        <input type="text" name="lName" placeholder="Last Name"><br> <br>
        <input type="text" name="username" placeholder="Enter Your username"><br> <br>
        <input type="email" name="email" placeholder="Enter Your email"><br> <br>
        <input type="password" name="password" placeholder="Enter Your password"> <br> <br>
        <input type="password" name="rePassword" placeholder="Re-enter Your password">
        <button name="submit" type="submit">
            Submit
        </button>

    </form>
    <div class="ftr">
        <p><span> &copy;2017 QuizBD. All rights resrved. Powered by </span> SmartWebSourve </p>
    </div>
</div>
</body>
</html>

<?php
include_once ("db_configure.php");


    if( isset($_POST['submit']) ){
        $first_name = $_POST['fName'];
        $last_name = $_POST['lName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $re_password = $_POST['rePassword'];

        if($password == $re_password) {
            $query = "INSERT INTO user_registration(first_name,last_name,username,email,password)VALUES('$first_name','$last_name','$username','$email','$password')";
            mysqli_query($conn, $query);
            mysqli_close($conn);
            header("location:u_login.php");
        }else{
            header("location:u_registration.php");
        }

    }

?>