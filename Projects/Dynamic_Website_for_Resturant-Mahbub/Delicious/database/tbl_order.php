<?php
include("config.php");

$tbl_order = "CREATE TABLE IF NOT EXISTS `order`(
order_id INT(10) NOT NULL AUTO_INCREMENT, PRIMARY KEY(order_id),
item1 VARCHAR(50) NOT NULL,
quantity1 VARCHAR(50) NOT NULL,
item2 VARCHAR(50) NOT NULL,
quantity2 VARCHAR(50) NOT NULL,
item3 VARCHAR(50) NOT NULL,
quantity3 VARCHAR(50) NOT NULL,
fname VARCHAR(50) NOT NULL,
lname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
street VARCHAR(50) NOT NULL,
area VARCHAR(50) NOT NULL,
city VARCHAR(20) NOT NULL,
zip INT(20) NOT NULL,
country VARCHAR(50) NOT NULL,
c_num VARCHAR(14) NOT NULL)";

$sql = mysqli_query($myconn,$tbl_order);


?>