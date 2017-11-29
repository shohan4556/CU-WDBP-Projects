<?php
  
   session_start();
   
   $user = $_SESSION['name'];
   
   if(!isset($_SESSION['name'])){
      header("location:subadminlogin.php ");
   }
?>