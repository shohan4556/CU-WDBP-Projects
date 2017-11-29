<?php 
	$host="127.0.0.1";
	$user="root";
	$pass="5212850Mz";
	$dbname = "bb";

	$conn = mysqli_connect($host, $user, $pass, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>