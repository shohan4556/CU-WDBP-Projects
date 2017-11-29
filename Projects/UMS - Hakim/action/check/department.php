<?php

$dbname = 'mysql:host=localhost;dbname=ums';
$dbuser = 'root';
$dbpass = '';

$pdo = new PDO($dbname, $dbuser, $dbpass);


if (isset($_POST['dep_name'])) {
    $name = $_POST['dep_name'];

    $query = " SELECT dep_name FROM department WHERE dep_name='$name' ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo "Department Already Exist";
    } else {
        echo "Department Name is Available";
    }
    exit();
}

if (isset($_POST['dep_code'])) {
    $code = $_POST['dep_code'];

    $query = " SELECT dep_code FROM department WHERE dep_code='$code' ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();



    if ($stmt->rowCount() > 0) {
        echo "Department Already Exist";
    } else {
        echo "Department Code is Available";
    }
    exit();
}


?>