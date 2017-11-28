<?php 

include("config.php");

?>




<?php

mysqli_select_db($conn,"myblog");

$sql="SELECT * FROM post";
    
   

$rowData=mysqli_query($conn,$sql);

if($rowData){
    
    while($row=mysqli_fetch_array($rowData))
    
    {
      
        $post=substr($row["post_content"],0,120);
        
     echo' <div id="box">
                 <h1>'.$row["post_title"].'</h1>
                 
                 <p style="color:red"> '.$row["post_date"].'</p>
                 
                 <img src="img/'.$row["post_img"].'">
                 
                 <p> <b>'.$post.'<b></p>
                 
                 <button type="button"onclick="link('.$row["id"].')">Read More</button>
                 
                 </div>
                 
                 
            
            ';
  
    }
    
}

else
    echo mysqli_error($conn);


?>

<script>
    
function  link(val){
    
    location.href='singlePostView.php?id='+val;
}
    
</script>
    
