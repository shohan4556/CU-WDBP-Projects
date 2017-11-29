<?php
session_start();
$conn = new mysqli("localhost", "root","","maksud") or die();
if ($conn == true){
    json_encode("Database Connected");
}else{
    json_encode("Database not Connected");
}