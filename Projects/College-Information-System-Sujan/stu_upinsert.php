
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
$name=$_POST['nname'];
$email=$_POST['nemail'];

$phone_num=$_POST['nphone_num'];

$address=$_POST['naddress'];
$gender=$_POST['ngender'];

include("confiq.php");

$sql = "UPDATE  stu_info SET stu_info.id = '$id',
stu_info.name='$name',stu_info.email='$email',stu_info.phone_num='$phone_num',stu_info.address='$address',
stu_info.gender='$gender' WHERE stu_info.id=$id; 
 ";
$result=mysqli_query($myConnection,$sql);

if(! $result ) { die('Could not update data: ' . mysql_error()); } 
echo "Updated data successfully\n"; 
mysqli_close($myConnection);

header("location:stu_detail.php");
?>

</body>
</html>