<?php

include("../../vendor/autoload.php");
use App\delete\delete;

$obj = new delete();
$obj->DeleteCourse($_GET['id']);