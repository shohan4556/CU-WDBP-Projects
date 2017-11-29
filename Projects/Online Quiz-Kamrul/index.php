<html>

<head>
    <title> Online Quiz Contest - QuizIT</title>

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon"  href="Image/speech-balloon-orange-q-icon.png">
</head>
<body>
<div class="full_wr">
    <div class="main">
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
        <div class="content">
            <h1>
                Welcome to QuizBD, the Online Quiz Contest website!

            </h1>
            <p>Yes, We are the first Bangladeshi website who arranges <i>online Quiz contest</i> regularly.
                If you think you are knowledgeable and confident enough then you are welcome to participate on any of our ongoing <b>quiz contest.</b>
                To participate in online quiz competition <a href="u_registration.php">Signup</a> now and WIN attractive prizes! :)</p>
        </div>
        <div class ="content_under">
            <h1>Recently Joined Member</h1>
        </div>
        <div class="ftr">
            <p><span> &copy;2017 QuizBD. All rights resrved. Powered by </span> SmartWebSourve </p>
        </div>
    </div>
</div>

</body>
</html>

<?php
    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "Quiz";

    $conn_host = mysqli_connect($db_host,$db_username,$db_password);
    $db_create = "CREATE DATABASE IF NOT EXISTS $db_name";
    mysqli_query($conn_host,$db_create);
    $conn = mysqli_connect($db_host,$db_username,$db_password,$db_name);
    $db_table_create = "CREATE TABLE user_registration(
        id int(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        first_name varchar(255),
        last_name varchar(255),
        username varchar(255),
        password varchar(255),
        email varchar(255))";
    mysqli_query($conn,$db_table_create);
?>