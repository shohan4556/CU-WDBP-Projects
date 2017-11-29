<!DOCTYPE HTML>
<html>
<head><title></title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style link rel="stylesheet" href="stylesheet.css" type="text/css">

body{
	background:url(image/new2.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover; 
  
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
</head>
<body>

<div id="header">

<div class="container">
 </br></br></br>
  <div class="btn-group btn-group-justified">
    <a href="index.php" class="btn btn-warning">Home</a>
    <a href="admin_search.php" class="btn btn-primary">Search</a>
    <a href="ad_update.php" class="btn btn-success">Update</a>
    <a href="ad_delete.php" class="btn btn-danger">Delete</a>
	<a href="admin1.php" class="btn btn-info">Create New Account</a>    
  </div>
</div>

</br></br>

  

<?php








include("confiq.php");
echo'<table align="center">
<tr>
<th ><b> Id </b></th>
<th > <b>User name	</b></th>
<th > <b>Password	</b></th>




</tr>
</table>';
$sql = "SELECT * FROM admins ";
$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];
$username= $row['username'];
$password= $row['password'];



echo'<table align="center">
<tr>
<td >	'.$id.'</td>
<td >'.$username.' </td>
<td >'.$password.' </td>
	
	
	</tr></table>';

}



?>



 </div>
 
<div id="footer">
<ul class="pager">
    <li><a href="create.php"><b><big>Previous</big><b></a></li>
    
  </ul>
</div>
</body>
</html>