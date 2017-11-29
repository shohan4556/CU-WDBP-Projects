<?php
require_once('../../vendor/autoload.php');
use App\save\save;

$obj = new save();
$obj1 = $obj->setData($_POST);
$obj1->enroll();