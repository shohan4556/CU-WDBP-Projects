<?php
include('../../vendor/autoload.php');
use App\auth\auth;

$obj = new auth();
$obj1 = $obj->setData($_POST);
$obj1->registerStudent();