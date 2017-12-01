<?php
session_start();
if (isset($_SESSION['login_id']) or isset($_SESSION['login_admin'])){
    unset($_SESSION['login_id']);
    unset($_SESSION['login_admin']);
    session_destroy();
    header("Location: ./");
}
