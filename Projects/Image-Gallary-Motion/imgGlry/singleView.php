<?php 

include("config.php");

$id=$_GET["id"];

if(isset($_GET["id"]))    
{  
    
    
    $sql="SELECT * FROM img WHERE id=".$id;
   
    mysqli_select_db($conn,"pic");
    
    $res=mysqli_query($conn,$sql);
    
    if($res){
        
        while($row=mysqli_fetch_array($res))
        {
            
            echo' 
                 <h1>"'.$row["img_title"].'"</h1> </br>
                 <img src="'.$row["img_path"].'">
            
            ';
            
        }
    
    }
    else
        echo " ".$id;
    
}

 





?>