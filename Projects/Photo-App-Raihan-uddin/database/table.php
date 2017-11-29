<?php
include("config.php");

$tbl_photoinfo = "CREATE TABLE IF NOT EXISTS photoinfo(

							photo_id INT NOT NULL,
							PRIMARY KEY(photo_id) ,
							name VARCHAR(50) NOT NULL,
							img_name VARCHAR(50) NOT NULL,
							img_path VARCHAR(50) NOT NULL ,
							img_type VARCHAR(50) NOT NULL ,
							photodesc VARCHAR(500) NOT NULL

							)";


$query = mysqli_query($myconn, $tbl_photoinfo);

if ($query === TRUE) {
	echo "<h3>Photo Info table created OK :) </h3>";
} else {
	echo "<h3>Photo Info table NOT created :( </h3>";
}