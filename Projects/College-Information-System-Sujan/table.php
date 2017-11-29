<?php
include("confiq.php");

$student = "CREATE TABLE IF NOT EXISTS stu_info( 
id INT(15) NOT NULL auto_increment,
PRIMARY KEY (id),
name VARCHAR(25)  NOT NULL,
email VARCHAR(255)  NOT NULL,
phone_num VARCHAR(25)  NOT NULL, 
address VARCHAR(255)  NOT NULL,
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
$semester = "CREATE TABLE IF NOT EXISTS semester( 
semesterid INT(15) NOT NULL auto_increment,
PRIMARY KEY (semesterid),
semester_name ENUM('Spring','Summer','Fall') NOT NULL,
id INT(15) NOT NULL,
FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE

)"; 
  $query = mysqli_query($myConnection,$semester);
  if($query===TRUE)
  {echo " OK:)";}
  else
  {echo " not CREATED :(";
}
$course = "CREATE TABLE IF NOT EXISTS course( 
courseid INT(15) NOT NULL auto_increment,
PRIMARY KEY (courseid),
semester_name ENUM('Spring','Summer','Fall') NOT NULL,
coursename ENUM('C#','HTML','XML','JAVA','UML','PHP') NOT NULL,id INT(15) NOT NULL
 )"; 
  $query = mysqli_query($myConnection,$course);
  if($query===TRUE)
  {echo " OK:)";}
  else
  {echo " not CREATED :(";}
  
  $admission = "CREATE TABLE IF NOT EXISTS admission( 
admissionid INT(15) NOT NULL auto_increment,
PRIMARY KEY (admissionid),
id INT(15) NOT NULL,
FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE,
admissiondate date NOT NULL
 )";  
  $query = mysqli_query($myConnection,$admission);
  if($query===TRUE)
  {echo " OK:)";}
  else
  {echo " not CREATED :(";}

$student_course_semester = "CREATE TABLE IF NOT EXISTS student_course_semester(
detailid INT(15) NOT NULL auto_increment,
PRIMARY KEY (detailid),
id INT(15) NOT NULL,
semesterid INT(15) NOT NULL,
courseid INT(15) NOT NULL,
FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE,
FOREIGN KEY (semesterid) REFERENCES semester(semesterid) ON DELETE CASCADE,
FOREIGN KEY (courseid) REFERENCES course(courseid) ON DELETE CASCADE
)";
 $query = mysqli_query($myConnection,$student_course_semester);
  
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
  ?>