
<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
body{
		background:#CCC;	
	}

table,th,td{
	color:#FFF;
	text-align:center;
	border:1px solid #060;
	border-collapse:collapse;
	background:#603;
	}
td,th{
	padding:5px;
	column-width:160px;
	max-width:160px;
	min-width:160px;
	}	
</style>
<title></title>
</head>
<body>
<?php

$id=$_POST['nid'];

$username=$_POST['nusername'];
$password=$_POST['npassword'];


include("confiq.php");




$sql = "UPDATE  admins   SET admins.id = '$id',admins.username='$username',admins.password='$password' WHERE  admins.id=$id   ";
$result=mysqli_query($myConnection,$sql);

if(! $result ) { die('Could not update data: ' . mysql_error()); } 
echo "Updated data successfully\n"; 
mysqli_close($myConnection);



header("location:admin_details.php");
?>
</body>
</html>