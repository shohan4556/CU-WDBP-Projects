<?php
session_start();
if (isset($_SESSION['logged_user_id']) or isset($_SESSION['logged_username'])){
    unset($_SESSION['logged_user_id']);
    unset($_SESSION['logged_username']);
    session_destroy();
    header("Location: ./");
}
