<?php 

include("config.php");

if(isset($_GET["id"])){
    
    
    mysqli_select_db($conn,"pic");
    
    $sql="DELETE FROM img WHERE id=".$_GET["id"];
    
    mysqli_query($conn,$sql);
    
    header("location: manageImg.php");
    
   
}


?>