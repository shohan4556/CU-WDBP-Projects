<?php
include("config.php")
$result="SELECT*form signup";
$query=mysqli_query($myconn,$result);
while($row=mysqli_fetch_array())
{
	$name=$row['name'];
	$email=$row['email'];
	$age=$row['age'];
	$gender=$row['gender'];
	$password=$row['pass'];
	
	echo'<table><tr><td>'.$name.'</td><td>'.$emil.'<td></td>'.
	$age.'<td></td>'.gender.'<td></td>'.$pass.'</td></tr></table>';
}
?>
	
	 
