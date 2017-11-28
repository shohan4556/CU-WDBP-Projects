<?php 

include("config.php");

if(isset($_GET["id"])){
    
    
    mysqli_select_db($conn,"myblog");
    
    $sql="DELETE FROM post WHERE id=".$_GET["id"];
    
    mysqli_query($conn,$sql);
    
    header("location: managePost.php");
    
   
}


?>