<?php

$dbname = 'mysql:host=localhost;dbname=ums';
$dbuser = 'root';
$dbpass = '';

$pdo = new PDO($dbname, $dbuser, $dbpass);


if (isset($_POST['cor_name'])) {
    $name = $_POST['cor_name'];

    $query = " SELECT cor_name FROM course WHERE cor_name='$name' ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "This Course Name Already Exist";
    } else {
        echo "Course Code is Available";
    }
    exit();
}

if (isset($_POST['cor_code'])) {
    $code = $_POST['cor_code'];

    $query = " SELECT cor_code FROM course WHERE cor_code='$code' ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();



    if ($stmt->rowCount() > 0) {
        echo "This Course Code Already Exist";
    } else {
        echo "Course Name is Available";
    }
    exit();
}


?>