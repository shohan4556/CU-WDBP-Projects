<?php
  
   session_start();
   
   $user = $_SESSION['name'];
   
   if(!isset($_SESSION['name'])){
	  session_destroy();
      header("location:../index.php ");
   }
?>