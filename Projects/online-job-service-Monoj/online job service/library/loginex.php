<?php 
	include("config.php");
	session_start();
		if (isset($_POST['email'],$_POST['password']))
			   {
                $email=$_POST['email'];
                $password=$_POST['password'];
  
                   if (empty($email) || empty($password))
                   {
                      $error = 'Hey All fields are required!!';
                    }
                     
					 else {  
					 $login="select * from reg where email='".$email."' and password ='".$password."'";
					 $result=mysqli_query($myConn,$login);
					 print_r($result);
				
					 
					if(mysqli_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['email']=$email;
					 header('Location:index.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>