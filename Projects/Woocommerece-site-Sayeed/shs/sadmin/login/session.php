<?php
  
   session_start();
   
   $user = $_SESSION['name'];
   
   if(!isset($_SESSION['name']) || $user!="sayeed"){
	  session_destroy();
      header("location:adminlogin.php ");
   }
?>