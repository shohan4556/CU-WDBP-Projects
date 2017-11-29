<?php
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "delicious";
$db = "CREATE DATABASE delicious";

$myconn = mysqli_connect($host,$user,$pass);
$query = mysqli_query($myconn,$db);
$connect = mysqli_select_db($myconn,$db_name);

?>