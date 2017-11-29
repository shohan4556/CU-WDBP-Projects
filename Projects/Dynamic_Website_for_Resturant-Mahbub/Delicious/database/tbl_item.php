<?php
include("config.php");

$tbl_item = "CREATE TABLE IF NOT EXISTS item(
item_id INT(10) NOT NULL AUTO_INCREMENT, PRIMARY KEY(item_id),
item_name VARCHAR(50) NOT NULL,
category VARCHAR(20) NOT NULL,
price INT(20) NOT NULL,
description TEXT NOT NULL,
img_name VARCHAR(50) NOT NULL,
img_path VARCHAR(50) NOT NULL,
img_type VARCHAR(50) NOT NULL)";

$sql = mysqli_query($myconn,$tbl_item);


?>