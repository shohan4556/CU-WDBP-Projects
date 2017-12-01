
<?php
include("confiq.php");

?>



<!DOCKTYPE html>
<head> 
<title></title>

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
	width:50%;
	height:100px;
	
	
	top:0px;
	position: absolute;
	left:500px;
}
#form
{
	width:50%;
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
<p style="color: #A81726"><h2><b> Course Information</b></h2><p>
</div>
<div id="form" >
<form id="signupform" name="signupform" method="post" action="cour_insert.php";>
<table  width="600" border="0" cellspacing="0" cellpading="2">

	
<tr>
<td><b>Course Id</b></td>
<td><input name="courseid" id="name" type="text">
</td>
</tr>



<tr>

<td><b> Id </b></td>
<td><select input name="id" id="name" type="text">

 <?php
include("confiq.php");
echo "id	 <br />";
$sql = "SELECT * FROM stu_info";
$result=mysqli_query($myConnection,$sql);


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
<td><b>Semester Name</b></td>
<td><select input name="semester_name" id="name" type="text">
<option value="Spring">Spring</option>
	<option value="Summer">Summer</option>
	<option value="Fall">Fall</option>
	 </select>
</td>
</tr>

	



<tr>
<td><b>Course Name</b></td>
<td><select input name="coursename" id="name" type="text">
<option value="C#">C#</option>
	<option value="HTML">HTML</option>
	<option value="XML">XML</option>
    <option value="JAVA">JAVA</option>
	<option value="UML">UML</option>
	<option value="PHP">PHP</option>
    
	 </select>
</td>
</tr>
	
	
	
	
	
	
	
	
	
</table>

 <button id="signupbtn" input type="submit"> <b>Submit</b></button>


<ul class="pager">
    <li class="Previous"><a href="create.php"><b><big>Previous</big><b></a></li>   
  </ul>

</form>



</body>
</html>




