<?php
  // include("config.php");
   session_start();
   
   $user = $_SESSION['name'];
   //$sql="select username from admin where username = '$user_check' ";
   
   //$query = mysqli_query($myconn,$sql);
   
   
	
  // while($row = mysqli_fetch_array($query))	
   
   //$login_session = $row['username'];

		
   
   if(!isset($_SESSION['name'])){
      header("location:adminlogin.php ");
   }
?>


