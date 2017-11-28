<?php 

include("../config.php");

$query="CREATE DATABASE myblog ";

$db=mysqli_query($conn,$query);

if($db==true)
echo"</br> <b>DB Created Successfully </b>";

else
    echo"</br> <b>DB Not Created </b> </br>".mysqli_error($conn);



$qry="CREATE TABLE category (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(40) NOT NULL

)";

mysqli_select_db($conn,"myblog");


 if(mysqli_query($conn,$qry))     
    echo" </br> <b>Table 1 Created Successfully </b>";
   
  else        
    echo"</br><b> Table 1 Not Created </b>".mysqli_error($conn);


$sql=" CREATE TABLE post (
id INT(6) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
post_title TEXT NOT NULL,
post_content LONGTEXT NOT NULL,
post_date DATETIME NOT NULL,
post_status VARCHAR(20) NOT NULL,
post_img VARCHAR(140),
category_id INT(6) NOT NULL,
FOREIGN KEY(category_id) REFERENCES category(id)

)";


mysqli_select_db($conn,"myblog");


 if(mysqli_query($conn,$sql))     
    echo" </br> <b>Table 2 Created Successfully </b>";
   
  else        
    echo"</br><b> Table 2 Not Created </b>".mysqli_error($conn);




$utbl="CREATE TABLE usertbl (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
country VARCHAR(30),
user_role VARCHAR(30),
password VARCHAR(30)
)";

mysqli_select_db($conn,"myblog");


 if(mysqli_query($conn,$utbl))     
    echo" </br> <b>Table 3 Created Successfully </b>";
   
  else        
    echo"</br><b> Table 3 Not Created </b>".mysqli_error($conn);





$cTbl="CREATE TABLE comment (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
content VARCHAR(120) NOT NULL,
post_id INT(6) NOT NULL,
FOREIGN KEY(post_id) REFERENCES post(id),
user_id INT(6) NOT NULL,
FOREIGN KEY(user_id) REFERENCES usertbl(id)

)";

mysqli_select_db($conn,"myblog");


 if(mysqli_query($conn,$cTbl))     
    echo" </br> <b>Table 4 Created Successfully </b>";
   
  else        
    echo"</br><b> Table 4 Not Created </b>".mysqli_error($conn);




   

$sql = "INSERT INTO usertbl (firstname,lastname,email,country,user_role,password)
VALUES ('Admin','Admin','admin@gmail.com','Bangladesh','admin','root')";

if(mysqli_query($conn,$sql))
     echo" </br> <b>Default Admin Inserted Successfully</b>";
else        
    echo"</br><b> Default Admin Not Inserted Successfully</b>".mysqli_error($conn);


?>