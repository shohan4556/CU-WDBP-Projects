<?php
include("../database/config.php");
//------product info----------

$tbl_admin = "CREATE TABLE IF NOT EXISTS admin(
							admin_id INT NOT NULL auto_increment,
							PRIMARY KEY(admin_id) ,
							name VARCHAR(50) NOT NULL,
							password VARCHAR (20) NOT NULL
							)";


$query = mysqli_query($myconn, $tbl_admin);

if ($query === TRUE) {
	echo "<h3>Admin table created OK :) </h3>";
} else {
	echo "<h3>Admin table NOT created :( </h3>";
}




