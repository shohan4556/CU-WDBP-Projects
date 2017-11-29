<?php 


include("config.php");



if(isset($_POST["submit"])){
   
$title=$_POST["title"];
$content=$_POST["content"];
$status=$_POST["PostStatus"];
$ctgry_id=$_POST["PostCategory"];
$imgName=$_FILES["browse"]["name"];
move_uploaded_file($_FILES["browse"]["tmp_name"],"img/".$imgName);    
$date=date("Y-m-d h:i:s");    
    
 $sql = "INSERT INTO post (post_title,post_content,post_date,post_status,post_img,category_id)
VALUES ('$title','$content','$date','$status','$imgName','$ctgry_id')";
    
    mysqli_select_db($conn,"myblog");
    
    if(mysqli_query($conn,$sql)){
     echo"</br><b> Data Inserted Successfully </b>";
        
     

        header('Location: managePost.php');
    }
    
    else{
        echo"</br><b>data not inserted </b </br>".mysqli_error($conn);
         
       

    }
  
    
}


?>