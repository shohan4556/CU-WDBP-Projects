
<?php
include("confiq.php");

?>



<!DOCKTYPE html><head> 
<title> University </title>
<style type="text/css">


body{
	background:url(image/new6.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

#p
{
	width:100%;
	height:100px;
	
	
	top:0px;
	position: absolute;
	left:500px;
}
#form
{
	width:100%;
	height:210px;
	
	
	top:80px;
	position: absolute;
	left:500px;
	text-align:center;

}











</style>
</head>
<body style= background-color: bgcolor="#23E4BE">


<div  id="p">
<p style="color: #A81726"><h2><b> Result Submit </b></h2><p>
</div>
<div id="form" >
<form id="signupform" name="signupform" method="post" action="result_insert.php";>
<table  width="600" border="0" cellspacing="0" cellpading="2">


<tr>

<td><b> Id </b></td>
<td><select input name="id" id="name" type="text">

 <?php
include("confiq.php");
echo "id	 semester	subject marks  gpa<br />";
$sql = "SELECT * FROM result  ";
$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row = mysqli_fetch_array($result)) {
$id= $row['id'];




	



?>
    
    
<option value="<?php echo $id;?>"><?php echo $id;?></option>
	
    
    <?php
	
}
?>
    
    </select>



</td>

</tr>
<tr>

<td><b>Semester</b></td>
<td><input name="semester" id="name" type="text"></td>

</tr>



<tr>

<td><b> Subject </b></td>
<td><input name="subject" id="name" type="text"></td>

</tr>

<tr>

<td> <b>Marks </b></td>
<td><input name="marks" id="name" type="text"></td>

</tr>

<tr>

<td><b> GPA</b> </td>
<td><input name="gpa" id="name" type="text">

 

 </td></tr>















</table>

 <button id="signupbtn" input type="submit"> <b>Submit result</b></button>

<a href="create.php"><h3> <b>Go to Back </b></button></h3></a>
<a href="INDEX.php"><h3>  <b>Go to Home </b></button></h3></a>
</form>


</body>
</html>