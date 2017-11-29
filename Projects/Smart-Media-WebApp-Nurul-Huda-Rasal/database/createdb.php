<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn =mysqli_connect($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$db = "CREATE DATABASE rasal";


$query = mysqli_query($conn, $db);


if ($query === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

?>