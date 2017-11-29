<?php
include("config.php");
//------photo info----------

$tbl_prodinfo = "CREATE TABLE IF NOT EXISTS prodinfo(

							prod_id INT NOT NULL,
							PRIMARY KEY(prod_id) ,
							name VARCHAR(50) NOT NULL,
							img_name VARCHAR(50) NOT NULL,
							img_path VARCHAR(50) NOT NULL ,
							img_type VARCHAR(50) NOT NULL ,
							price INT(10) NOT NULL,
							prodesc VARCHAR(500) NOT NULL

							)";


$query = mysqli_query($myconn, $tbl_prodinfo);

if ($query === TRUE) {
	echo "<h3>PHOTO  INFORMATI table created OK :) </h3>";
} else {
	echo "<h3>PHOTO INFORMAT table NOT created :( </h3>";
}
//------Music info----------

$tbl_musicinfo = "CREATE TABLE IF NOT EXISTS musicinfo(

							prod_id INT NOT NULL,
							PRIMARY KEY(prod_id) ,
							name VARCHAR(50) NOT NULL,
							img_name VARCHAR(50) NOT NULL,
							img_path VARCHAR(50) NOT NULL ,
							img_type VARCHAR(50) NOT NULL ,
							price INT(10) NOT NULL,
							prodesc VARCHAR(500) NOT NULL

							)";


$query = mysqli_query($myconn, $tbl_musicinfo);

if ($query === TRUE) {
	echo "<h3>MUSIC  INFORMATI table created OK :) </h3>";
} else {
	echo "<h3>MUSIC INFORMAT table NOT created :( </h3>";
}


//------book info----------

$tbl_bookinfo = "CREATE TABLE IF NOT EXISTS bookinfo(

							prod_id INT NOT NULL,
							PRIMARY KEY(prod_id) ,
							name VARCHAR(50) NOT NULL,
							img_name VARCHAR(50) NOT NULL,
							img_path VARCHAR(50) NOT NULL ,
							img_type VARCHAR(50) NOT NULL ,
							price INT(10) NOT NULL,
							prodesc VARCHAR(500) NOT NULL

							)";


$query = mysqli_query($myconn, $tbl_bookinfo);

if ($query === TRUE) {
	echo "<h3>BOOK  INFORMATI table created OK :) </h3>";
} else {
	echo "<h3>BOOK INFORMAT table NOT created :( </h3>";
}





//----------------customer information -------------------

$tbl_custinfo = "CREATE TABLE IF NOT EXISTS custinfo(

							cu_id INT(10) NOT NULL auto_increment,
							PRIMARY KEY(cu_id) ,
							name VARCHAR(20) NOT NULL,
							email VARCHAR(20) NOT NULL,
							password VARCHAR(50) NOT NULL,
							gender ENUM('m','f','o') NOT NULL,
							country VARCHAR(50) NOT NULL

							)";


$query = mysqli_query($myconn, $tbl_custinfo);

if ($query === TRUE) {
	echo "<h3>customer  INFORMATI table created OK :) </h3>";
} else {
	echo "<h3>customer INFORMAT table NOT created :( </h3>";
}

?>
