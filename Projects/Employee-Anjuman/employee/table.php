<?php
include("confiq.php");




$employee_info = "CREATE TABLE IF NOT EXISTS employee( 
id INT(15) NOT NULL auto_increment,
PRIMARY KEY (id),
first_name VARCHAR(25)  NOT NULL,
mid_name VARCHAR(255)  NOT NULL,
last_name VARCHAR(255)  NOT NULL,
address VARCHAR(255)  NOT NULL,
email VARCHAR(255)  NOT NULL,
phone_num VARCHAR(25)  NOT NULL,
dept_name ENUM('BCSE','BBA','BTSE','MBA','ENGLISH','EMBA','LLB','LLM') NOT NULL,
 
gender ENUM('Male','Female') NOT NULL,
salary NUMERIC(10,2) NOT NULL
 )";
  
  
  $query = mysqli_query($myConnection,$employee_info);
  if($query===TRUE)
  {echo " OK:)";}
  else
  {echo " not CREATED :(";}










  ?>