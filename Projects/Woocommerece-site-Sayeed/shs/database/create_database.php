<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn =mysqli_connect($servername, $username, $password);

$db = "CREATE DATABASE shs";

$query = mysqli_query($conn, $db);

if ($query === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

?>