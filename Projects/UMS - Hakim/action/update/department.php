<?php

include("../../vendor/autoload.php");
use App\update\update;

$obj = new update();
$obj->UpdateDepartment($_POST);