
<html>
<head>

    <title>Question Set</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
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
<form method="post">
    <th>
        <td>Question</td>
        <td>
            <input type="text" name="question" placeholder="Type the quesion">
        </td>
    </th>
    <th>
        <td>Options</td>
        <td>
            <input type="text" name="first-option" placeholder="Type first option">
        </td>
        <td>
            <input type="text" name="second-option" placeholder="Type second option">
        </td>
        <td>
            <input type="text" name="third-option" placeholder="Type third option">
        </td>
    </th>
    <th>
        <td>Correct Answer</td>
        <td>
            <input type="text" name="correct-answer" placeholder="Type corrent answer">
        </td>
    </th>
    <button name="submit" type="submit">
        Set
    </button>
</form>
</body>
</html>

<?php
    include_once ("db_configure.php");
    $db_create_table = "CREATE TABLE mcq_questions(
        id int(15) NOT NULL PRIMARY KEY AUTO_INCREMENT,
        question VARCHAR(255),
        first_option VARCHAR(255),
        second_option VARCHAR(255),
        third_option VARCHAR(255),
        correct_answer VARCHAR(255))";
    mysqli_query($conn,$db_create_table);
    if(isset($_POST['submit'])){
        $question = $_POST['question'];
        $first_option = $_POST['first-option'];
        $second_option = $_POST['second-option'];
        $third_option = $_POST['third-option'];
        $correct_answer= $_POST['correct-answer'];
        $query = "INSERT INTO mcq_questions(question,first_option,second_option,third_option,correct_answer)VALUES('$question','$first_option','$second_option','$third_option','$correct_answer')";
        mysqli_query($conn,$query);
        mysqli_close($conn);
        header("location:admin_operations.php");
    }

?>