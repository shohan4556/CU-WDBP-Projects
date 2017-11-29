<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
body{
	background:url(image/new3.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  text-align:center;
  color:white;
}

</style>



<title></title>

</head>
<body>
<div id="header"></br></br></br></br></br></br></br>
<h2><b><big>Delete From Here By Id</big></b></h2>
</div></br>


 
<form id="signupform" name="signupform" method="post" action="ad_delete.php";>
  
 <form name="signupform" id="signupform" onsubmit="return false;">
    
    
    <tr><td><input id="id" input name="id"  type="int"  maxlength="16" ></td></tr>
    
    
    <button id="signupbtn" input type="submit"><b>Delete</b></button>    
  </form>
  <br/>
  <?php 

include("confiq.php");
if (isset($_POST['id'])){

$id=$_POST['id'];



$sql = "DELETE FROM admins WHERE id='$id'

";
$result=mysqli_query($myConnection,$sql);

if(! $result  ) { die('Could not delete data: ' . mysql_error()); } 
echo "Deleted data successfully\n";
 mysqli_close($myConnection);

}


?>
   </br></br></br></br></br></br></br></br></br></br>
<div id="footer">
<ul class="pager">
    <li><a href="admin_details.php"><b><big>Previous</big><b></a></li>
    
  </ul>
</div>
</body>
</html>