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
}

</style>



<title>University</title>

</head>
<body>
<div id="header">
<h2><button><b><big>Delete From Here</big></b></button></h2>

</div>

  <div id="menu">

	 
	
  </div>

</div>
<div id="cont">

 
<form id="signupform" name="signupform" method="post" action="ad_delete.php";>
  
  <form name="signupform" id="signupform" onsubmit="return false;">
    <div><tr><th><button><b>Delete by id  </b> </button></th></tr> </div><br/>
    
    <tr><td><input id="id" input name="id"  type="int"  maxlength="16" ></td></tr>
    
    
    <button id="signupbtn" input type="submit"><b>Delete</b></button>
    
  </form>
  
  <br/>
 <form id="signupform" name="signupform" method="post" action="create.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button></form>
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





/*
*/



}


?>
  
  
</div>


<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div id="footer">
 <p><b><big><i>A M Graphics Design</i></big></b></p>
</div>
</body>
</html>