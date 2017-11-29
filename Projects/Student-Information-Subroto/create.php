<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">

body{
		background:url(image/blue.jpg)no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
	}

tr{
	background-color:#000;
	padding-top:10px;
	padding-bottom:10px;

	}


#headder
{
	width: 100%;
	height:273px;
	background-image: url(image/new2.jpg);
	top: 0px;
	position: absolute;
	left: 0px;
	right: 0px;
	text-align: center;
	bottom: 300px;
}


#headder1{
	
	
	bottom:240px;
	}

#menu
{
	width:100%;
	height:528.5px;
	top: 271px;
	position: absolute;
	left: 0px;
	right:0PX;
	text-align: center;
	bottom:1000px;
}

.navbar {
		
      margin-bottom:0;
	  
      border-radius:0;
	 
    }






#footer
{
	width:100%;
	height: 50px;
	background-color: #9FC;
	background-image: url(image/new11.jpg);
	top: 800px;
	position: absolute;
	right:0px;
	left:0px;
	text-align: center;
	bottom:100%;
}

</style>
</head>


<body link="#003300" vlink="#009999">

<div id="headder">

<div id="headder1">
<marquee style=" color: #03F"><h2><b>                 </b></h2> </marquee>

<div id="menu">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <li class="active"><a class="navbar-brand" href=""><b><big><i></i></big></b></a></li>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="index.php"><b><big>Home</big></b></a></li>
      <li class="dropdown"><a class="dropdown-toggle"
	  data-toggle="dropdown" href="#"><b><big>Student SetUp</big></b>
	  <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="student.php"><b><big>Student</big></b></a></li>
		  
<li role="presentation" class="divider"></li>
          <li><a href="course.php"><b><big>semester & Course</big></b></a></li>
		  <li role="presentation" class="divider"></li>
		  <li><a href="admission.php"><b><big>Admission Data</big></b></a></li>
        </ul>
      </li>

       
	  <!-- <li class="dropdown"><a class="dropdown-toggle" 
	 data-toggle="dropdown" href="#"><b><big>
	 Admin Information</big></b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="admin1.php"><b><big>Admin Insert</big></b></a></li>
		  <li role="presentation" class="divider"></li>
          <li><a href="ad_update.php"><b><big>Admin Update</big></b></a></li>
		  <li role="presentation" class="divider"></li>
          <li><a href="ad_delete.php"><b><big>Admin delete</big></b></a></li>
		  <li role="presentation" class="divider"></li>
		  <li><a href="admin_details.php"><b><big>Admin Details</big></b></a></li>
        </ul>
      </li>
	  -->
     <li class="dropdown"><a class="dropdown-toggle" 
	 data-toggle="dropdown" href="#"><b><big>
	 Student Details</big></b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="stu_detail.php"><b><big>Student Information</big></b></a></li>
		  <li role="presentation" class="divider"></li>
          <li><a href="cour_details.php"><b><big>Student semester & Course</big></b></a></li>
		  
        </ul>
      </li>
	  
	  
	  
	  
	  
	   </ul>
<ul class="nav navbar-nav navbar-right">
	 
        <li><a href="index.php"><span 
		class="glyphicon glyphicon-log-in"></span>
		<b><big>Back To Home</big></b></a></li>
      </ul>

</div>  
</nav>
</div>
</div>  
</div>
  



<div id="footer">
</div>



</body>
</html>