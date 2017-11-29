<html>
<head>
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
<div class="question-part">
    <form action="admin_set_question.php">
     <button class="admin-log-button">Set Question</button>
    </form>
    <button class="admin-log-button" onclick="window.location.href='admin_delete_question.php'">Delete Question</button>
    <button class="admin-log-button" onclick="window.location.href='admin_examinees_control.php'">Examinees Control</button>
    </form>
</div>
</body>
</html>