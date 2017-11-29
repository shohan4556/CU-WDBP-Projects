<?php
include("config.php");

$tbl_reg = "CREATE TABLE IF NOT EXISTS reg(
							
							name VARCHAR(50) NOT NULL,
							PRIMARY KEY (name) ,
							email VARCHAR(50) NOT NULL,
							
							
							
							age int(50) NOT NULL,
							gender ENUM('m','f') NOT NULL,
							password VARCHAR(50) NOT NULL			  
									
							
							)";


$query = mysqli_query($myconn, $tbl_reg);

if ($query === TRUE) {
	echo "<h3>Register table created OK :) </h3>"; 
} else {
	echo "<h3>Register table NOT created :( </h3>"; 
}


?>