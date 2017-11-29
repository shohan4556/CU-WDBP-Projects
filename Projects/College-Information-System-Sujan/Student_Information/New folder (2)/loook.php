$admission = "CREATE TABLE IF NOT EXISTS admission( 
admissionid INT(15) NOT NULL auto_increment,
PRIMARY KEY (admissionid),
id INT(15) NOT NULL,
semesterid INT(15) NOT NULL,
FOREIGN KEY (id) REFERENCES stu_info(id) ON DELETE CASCADE,
FOREIGN KEY (semesterid) REFERENCES semester(semesterid) ON DELETE CASCADE,
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