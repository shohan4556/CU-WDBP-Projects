<?php
include("confiq.php");

$student = "CREATE TABLE IF NOT EXISTS stu_info( 
id INT(15) NOT NULL auto_increment,
PRIMARY KEY (id),
first_name VARCHAR(25)  NOT NULL,
mid_name VARCHAR(255)  NOT NULL,
last_name VARCHAR(255)  NOT NULL,
address VARCHAR(255)  NOT NULL,
email VARCHAR(255)  NOT NULL,
phone_num VARCHAR(25)  NOT NULL,
dept_name ENUM('BCSE','BBA','BTSE','MBA','ENGLISH','EMBA','LLB','LLM') NOT NULL,
 
gender ENUM('Male','Female') NOT NULL




 )";
 $query = mysqli_query($myConnection,$student);
  
  if($query===TRUE)
  {
	  echo " OK:)";
  }
  else
  {
	  echo " not CREATED :(";
	  }


$lecturer_info = "CREATE TABLE IF NOT EXISTS lecturer( 
id INT(15) NOT NULL auto_increment,
PRIMARY KEY (id),
first_name VARCHAR(25)  NOT NULL,
mid_name VARCHAR(255)  NOT NULL,
last_name VARCHAR(255)  NOT NULL,
address VARCHAR(255)  NOT NULL,
email VARCHAR(255)  NOT NULL,
phone_num VARCHAR(25)  NOT NULL ,
dept_name ENUM('BCSE','BBA','BTSE','MBA','ENGLISH','EMBA','LLB','LLM') NOT NULL,
 
gender ENUM('Male','Female') NOT NULL,
salary NUMERIC(10,2) NOT NULL)";
  
  
  $query = mysqli_query($myConnection,$lecturer_info);
  if($query===TRUE)
  {echo " OK:)";}
  else
  {echo " not CREATED :(";}
  
  
  $staff_info = "CREATE TABLE IF NOT EXISTS staff( 
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
  
  
  $query = mysqli_query($myConnection,$staff_info);
  if($query===TRUE)
  {echo " OK:)";}
  else
  {echo " not CREATED :(";}


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





$login = "CREATE TABLE IF NOT EXISTS login(

id INT(15) NOT NULL auto_increment,

username VARCHAR(55) NOT NULL,


password VARCHAR(50) NOT NULL,




 KEY (id),  
                              
 FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE,
 PRIMARY KEY (id)

)";

 $query = mysqli_query($myConnection,$login);
  
  if($query===TRUE)
  {
	  echo " OK:)";
  }
  else
  {
	  echo " not CREATED :(";
	  }





$result = "CREATE TABLE IF NOT EXISTS result(		
							id INT(15) NOT NULL auto_increment,
							
							semester VARCHAR(20) NOT NULL,
							subject VARCHAR(30) NOT NULL,
							marks VARCHAR(10) NOT NULL,
							gpa VARCHAR(3) NOT NULL,
							
							 KEY (id),  
                              
                           FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE,
                            PRIMARY KEY (id)
							
							
								)";
							
						 $query = mysqli_query($myConnection,$result);
  
  if($query===TRUE)
  {
	  echo " OK:)";
  }
  else
  {
	  echo " not CREATED :(";
	  }


$admins = "CREATE TABLE IF NOT EXISTS admins(	id INT NOT NULL auto_increment,
							PRIMARY KEY (id),
							username VARCHAR(50) NOT NULL,
							password VARCHAR(50) NOT NULL 

						)";
						 $query = mysqli_query($myConnection,$admins);
  
  if($query===TRUE)
  {
	  echo " OK:)";
  }
  else
  {
	  echo " not CREATED :(";
	  }


$s_admins = "CREATE TABLE IF NOT EXISTS subadmin(	
                            id INT(15) NOT NULL auto_increment,
							username VARCHAR(50) NOT NULL,
							password VARCHAR(50) NOT NULL,
							 
							 KEY (id),  
                              
                           FOREIGN KEY (id) REFERENCES lecturer(id) ON DELETE CASCADE,
                            PRIMARY KEY (id)

							
							
							
							

						)";
						 $query = mysqli_query($myConnection,$s_admins);
  
  if($query===TRUE)
  {
	  echo " OK:)";
  }
  else
  {
	  echo " not CREATED :(";
	  }




  ?>