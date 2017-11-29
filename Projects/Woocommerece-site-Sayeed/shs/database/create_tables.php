<?php

include("config.php");

//------product info----------

$productinfo = "CREATE TABLE IF NOT EXISTS productinfo(

							prod_id INT NOT NULL,
							PRIMARY KEY(prod_id) ,
							pname VARCHAR(50) NOT NULL,
							img_name VARCHAR(50) NOT NULL,
							img_path VARCHAR(50) NOT NULL ,
							img_type VARCHAR(50) NOT NULL ,
							price INT(10) NOT NULL,
							description VARCHAR(500) NOT NULL

						)";


$query = mysqli_query($myconn,$productinfo);

if ($query === TRUE) {
	echo "Table Product Info Created.<br/>";
} else {
	echo "Table Product Info Not Created.<br/>";
}



//----------------customer information -------------------

$custinfo = "CREATE TABLE IF NOT EXISTS custinfo(

							cu_id INT(10) NOT NULL auto_increment,
							PRIMARY KEY(cu_id) ,
							fname VARCHAR(20) NOT NULL,
							phone VARCHAR(20) NOT NULL,
							email VARCHAR(20) NOT NULL,
							address VARCHAR(20) NOT NULL,
							gender ENUM('male','female') NOT NULL,
							password VARCHAR(50) NOT NULL

					)";


$query = mysqli_query($myconn,$custinfo);

if ($query === TRUE) {
	echo "Table Customer  Information Created<br/>";
} else {
	echo "Table Customer  Information Not Created<br/>";
}

//--------------------order item-----------

$customer_order = "CREATE TABLE IF NOT EXISTS customer_order(

							id INT(10) NOT NULL auto_increment ,
							PRIMARY KEY(id),
							date DATETIME NOT NULL,
							cu_id INT(10) NOT NULL,
							prod_id INT(10) NOT NULL,
							quantity INT(10) NOT NULL,
							FOREIGN KEY(cu_id) REFERENCES custinfo(cu_id),
							FOREIGN KEY(prod_id) REFERENCES productinfo(prod_id)

					)";


$query = mysqli_query($myconn,$customer_order);

if ($query === TRUE) {
	echo "Table Customer Order  Information Created<br/>";
} else {
	echo "Table Customer Order  Information Not Created<br/>";
}


//----------order list-------------
$orderlist = "CREATE TABLE IF NOT EXISTS orderlist(

							id INT(10) NOT NULL auto_increment ,
							PRIMARY KEY(id),
							cu_id INT(10) NOT NULL,
							prod_id INT(10) NOT NULL,
							date DATETIME NOT NULL,
							FOREIGN KEY(cu_id) REFERENCES custinfo(cu_id),
							FOREIGN KEY(prod_id) REFERENCES productinfo(prod_id)
					)";


$query = mysqli_query($myconn, $orderlist);

if ($query === TRUE) {
	echo "Table Admin Order List Created<br/>";
} else {
	echo "Table Admin Order List Not Created<br/>";
}


//----------Sub Admin-------------
$subadmin = "CREATE TABLE IF NOT EXISTS subadmin(

							id INT(10) NOT NULL auto_increment ,
							PRIMARY KEY(id),
							name INT(10) NOT NULL,
							password VARCHAR(20) NOT NULL
					)";


$query = mysqli_query($myconn, $subadmin);

if ($query === TRUE) {
	echo "Table Sub Admin Created<br/>";
} else {
	echo "Table Sub Admin Not Created<br/>";
}

?>

