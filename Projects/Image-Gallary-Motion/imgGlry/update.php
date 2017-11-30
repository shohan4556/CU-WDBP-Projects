<?php    

include("config.php");

if(isset($_POST["submit"])){
    
  mysqli_select_db($conn,"pic");
    
    
    session_start();
    if($_FILES["browse"]["name"]!=null){
        $_SESSION["img"]="img/".$_FILES["browse"]["name"];
        move_uploaded_file($_FILES["browse"]["tmp_name"],$_SESSION["img"]); 
    }
    
        
    
$sql="UPDATE img SET img_title='".$_POST["title"]."',img_path='".$_SESSION["img"]."',category_id='".$_POST["Category"]."' WHERE id=".$_POST["id"];
    
    
  mysqli_query($conn,$sql);
   
   header("location: manageImg.php"); 
    
}


?>