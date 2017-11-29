<?php 
	include("confiq.php");
	session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'Hey All fields are required!!';
                    }
                     
					 else {  
					 $login="select * from admins where username='".$username."' and password ='".$password."'";
					 $result=mysqli_query($myConnection,$login);
					 print_r($result);
				
					 
					if(mysqli_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:create.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>