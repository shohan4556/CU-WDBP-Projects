<?php

$db_host="localhost";
$db_username="root";
$db_password="";
$db_name="shs";


$myconn=mysqli_connect("$db_host","$db_username","$db_password", "$db_name");

/*if ($myconn==TRUE) {
    echo "Config file connected";
    exit();
} else {
	echo "Config file not connected";
}*/

?>