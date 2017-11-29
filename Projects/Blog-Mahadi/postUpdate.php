<?php    

include("config.php");

if(isset($_POST["submit"])){
    
  mysqli_select_db($conn,"myblog");
    
    
    session_start();
    if($_FILES["browse"]["name"]!=null){
        $_SESSION["img"]=$_FILES["browse"]["name"];
        move_uploaded_file($_FILES["browse"]["tmp_name"],"img/".$_SESSION["img"]); 
    }
    
        
    
$sql="UPDATE post SET post_title='".$_POST["title"]."',post_content='".$_POST["content"]."',post_status='".$_POST["PostStatus"]."',category_id='".$_POST["PostCategory"]."',post_img='".$_SESSION["img"]."' WHERE id=".$_POST["id"];
    
    
  mysqli_query($conn,$sql);
   
   header("location: managePost.php"); 
    
}


?>