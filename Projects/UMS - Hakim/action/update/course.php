<?php

include("../../vendor/autoload.php");
use App\update\update;

$obj = new update();
$obj->UpdateCourse($_POST);