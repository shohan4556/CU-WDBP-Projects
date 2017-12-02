
<?php
$host="localhost";
$dbuser="root";
$dbpass="";
$dbname="patient";
$myconn=mysqli_connect($host,$dbuser,$dbpass, $dbname);
$query=mysqli_query($myconn,$db);


if($myconn)
{
	echo "yo";
}
else
{
	echo "NO";
}




?>