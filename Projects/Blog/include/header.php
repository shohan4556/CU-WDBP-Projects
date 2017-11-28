<?php 

?>

<div id="header">
    
    <?php
    
    session_start();
    
    if(isset($_SESSION["user"])){
    if($_SESSION["user"]==true)
        
   
    
    {?>
    
<a href="./login.php" style="color:white; float:right;margin:30px 30px 0px 0px"> <?php echo"".$_SESSION["usr_name"]; ?> </a>   
<a href="./logout.php"style="color:white; float:right;margin:30px 30px 0px 0px">Logout</a>      
    
    <?php 
     
    }
    
    } 
    
    
    else {
    
    ?>
    
    
<a href="./login.php" style="color:white; float:right;margin:30px 30px 0px 0px"> login </a>   
<a href="./SignUp.php"style="color:white; float:right;margin:30px 30px 0px 0px">SignUP</a>     
    
    <?php  } ?>
    
<h1> MY BLOG </h1>
    
    


</div>

