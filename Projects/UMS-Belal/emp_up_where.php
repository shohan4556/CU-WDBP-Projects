<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">
body{
	background:url(image/new5.jpg) no-repeat center center fixed; 
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
<title>University</title>

</head>
<body>
<div id="header">


</div>

  <div id="menu">

	 
	
  </div>

</div>
<div id="cont">
<form id="signupform" name="signupform" method="post" action="create.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Create Page</b></button>
    
  </form>
  <p><form id="signupform" name="signupform" method="post" action="emp_update.php";>
  
  
    
    <button id="signupbtn" input type="submit"><b>Go To Back</b></button>
    
  </form></p>

  
</div>
 </div>

<?php
$id= $_POST['id'];





include("confiq.php");







$sql = "SELECT employee.id,employee.first_name,employee.mid_name,employee.last_name,employee.address,employee.email,employee.phone_num,employee.dept_name,employee.gender,employee.salary FROM employee WHERE   employee.id='$id'


 ";


$result=mysqli_query($myConnection,$sql);

$count=mysqli_num_rows($result);

while($row=mysqli_fetch_array($result) ) {
$id= $row['id'];
$first_name= $row['first_name'];
$mid_name= $row['mid_name'];
$last_name= $row['last_name'];
$address= $row['address'];
$email =$row['email'];
$phone_num= $row['phone_num'];
$dept_name= $row['dept_name'];
$gender= $row['gender'];

$salary= $row['salary'];

	

}


?>

<html>
<head>
<title>University</title>

</head>
<body>


<div id="header">


</div>

  <div id="menu">

	
	
	
  </div>

</div>


<h3><b>Update From Here</b></h3>
<form id="signupform" name="signupform" method="post" action="emp_upinsert.php";>
  
  
<div id=""><b>Which Id Do You Like To Update</b>

    <input id="id" input name="id"  type="int"   maxlength="30" value=<?php echo $id ?> > 
</div><br/><br/>
   
<b>    Id : </b><input id="id" input name="nid"  type="int"  maxlength="30" value=<?php echo $id ?> ><br/><br/><br/>
   
<b>    First name : </b><input id="first_name" input name="nfirst_name"  type="text"  maxlength="30" value=<?php echo $first_name  ?> > 

 <b>   Mid name :</b> <input id="mid_name" input name="nmid_name"  type="text"  maxlength="30" value=<?php echo $mid_name ?> >

 <b>    Last name : </b><input id="last_name" input name="nlast_name"  type="text"  maxlength="30" value=<?php echo $last_name ?> > <br/><br/><br/>
    
    
  <b>   Address : </b><input id="address" input name="naddress"  type="text"  maxlength="255" value=<?php echo $address ?> >
   <b>  Email :</b> <input id="email" input name="nemail"  type="text"  maxlength="30" value=<?php echo $email ?> >
  <b>   Phone num :</b> <input id="phone_num" input name="nphone_num"  type="int"  maxlength="30" value=<?php echo $phone_num ?> ><br/><br/><br/>
  <b>   Department :</b> <input id="dept_name" input name="ndept_name"  type="enum"  maxlength="30" value=<?php echo $dept_name ?> >
   <b>  Gender : </b><input id="gender" input name="ngender"  type="enum"  maxlength="30" value=<?php echo $gender ?> >
   <b>  Salary :</b> <input id="salary" input name="nsalary"  type="text"  maxlength="30" value=<?php echo $salary ?> ><br/><br/><br/>
    
    
    
    <button id="signupbtn" input type="submit"><b>Update Now</b></button>
    
    
    
    
    
   
    
  </form>

<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div id="footer">
 <p><b><big><i>A M Graphics Design</i></big></b></p>
</div>
</body>
</html>
