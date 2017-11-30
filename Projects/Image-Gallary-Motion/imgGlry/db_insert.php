<?php 

include("config.php");

$query="CREATE DATABASE pic ";

$db=mysqli_query($conn,$query);




$qry="CREATE TABLE category (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(40) NOT NULL

)";

mysqli_select_db($conn,"pic");


 if(mysqli_query($conn,$qry))     
    echo" </br> <b>Table Created Successfully </b>";
   
  else        
    echo"</br><b> Table Not Created </b>".mysqli_error($conn);


$sql=" CREATE TABLE img (
id INT(6) NOT NULL AUTO_INCREMENT,
PRIMARY KEY(id),
img_title varchar(70) NOT NULL,
img_path VARCHAR(120) NOT NULL,
category_id INT(6) NOT NULL,
FOREIGN KEY(category_id) REFERENCES category(id)

)";


mysqli_select_db($conn,"pic");


 if(mysqli_query($conn,$sql))     
    echo" </br> <b>Table Created Successfully </b>";
   
  else        
    echo"</br><b> Table Not Created </b>".mysqli_error($conn);




$utbl="CREATE TABLE user (
id INT(6) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
country VARCHAR(30),
user_role VARCHAR(30),
password VARCHAR(30)
)";

mysqli_select_db($conn,"pic");


 if(mysqli_query($conn,$utbl))     
    echo" </br> <b>Table 3 Created Successfully </b>";
   
  else        
    echo"</br><b> Table 3 Not Created </b>".mysqli_error($conn);



   
mysqli_select_db($conn,"pic");

$sql = "INSERT INTO category (name)
VALUES ('Entertainment')";

if(mysqli_query($conn,$sql))
     echo" </br> <b>Default Admin Inserted Successfully</b>";
else        
    echo"</br><b> Default Admin Not Inserted Successfully</b>".mysqli_error($conn);


mysqli_select_db($conn,"pic");

$sql = "INSERT INTO category (name)
VALUES ('Technology')";

if(mysqli_query($conn,$sql))
     echo" </br> <b>Default Admin Inserted Successfully</b>";
else        
    echo"</br><b> Default Admin Not Inserted Successfully</b>".mysqli_error($conn);

mysqli_select_db($conn,"pic");

$sql = "INSERT INTO category (name)
VALUES ('Others')";

if(mysqli_query($conn,$sql))
     echo" </br> <b>Default Admin Inserted Successfully</b>";
else        
    echo"</br><b> Default Admin Not Inserted Successfully</b>".mysqli_error($conn);




$sql = "INSERT INTO user (firstname,lastname,email,country,user_role,password)
VALUES ('shojib','Admin','shojib@gmail.com','Bangladesh','admin','root')";

if(mysqli_query($conn,$sql))
     echo" </br> <b>Default Admin Inserted Successfully</b>";
else        
    echo"</br><b> Default Admin Not Inserted Successfully</b>".mysqli_error($conn);


?>