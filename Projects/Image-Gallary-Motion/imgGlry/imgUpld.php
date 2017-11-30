<?php 


include("config.php");



if(isset($_POST["submit"])){
   
$title=$_POST["title"];
$ctgry_id=$_POST["Category"];
$imgName=$_FILES["browse"]["name"];
move_uploaded_file($_FILES["browse"]["tmp_name"],"img/".$imgName);  
$imgPath="img/".$imgName;    
    
 $sql = "INSERT INTO img (img_title,img_path,category_id)
VALUES ('$title','$imgPath','$ctgry_id')";
    
    mysqli_select_db($conn,"pic");
    
    if(mysqli_query($conn,$sql)){
     echo"</br><b> Data Inserted Successfully </b>";
        
     

        header('Location: manageImg.php');
    }
    
    else{
        echo"</br><b>data not inserted </b </br>".mysqli_error($conn);
         
       

    }
  
    
}


?>