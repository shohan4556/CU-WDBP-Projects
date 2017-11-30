<head>


      <link rel="stylesheet" type="text/css" href="include/site.css">
    

    <style>
    
    
    
  #Fbody{
            max-width: 600px;
            margin: 0px auto;
            background-color:#1997e5;
            padding: 40px;
            box-shadow:50px;
            height: auto;
            
        }


    input{
            
            width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            font-size: 14px;
            
        }
    
    
     select{
             width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            
            
        }
    
         button{
            width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            background-color:coral;
            font-size: 19px;
            cursor: pointer;
            
        }
    
    
       #title{
            
            font-size: 20px;
            color: #10B25C;
            margin:0px auto;
            max-width: 300px;
            text-align: center;
            font-family:sans-serif;
        }
    
    
    
    
    </style>
    



</head>






<body>

<?php 

include("config.php");
include("include/header.php");


    
    mysqli_select_db($conn,"pic");
    
    $sql="SELECT * FROM img WHERE id=".$_GET["id"];
    
   $res=mysqli_query($conn,$sql);
    
    if($res){
        
        $row=mysqli_fetch_array($res);
        
        $title=$row["img_title"];
        
        
        $img=$row["img_path"];
        
        $ctgry=$row["category_id"];
        
        $qury="SELECT * FROM category WHERE id=".$ctgry;
        mysqli_select_db($conn,"pic");
        
        $res2=mysqli_query($conn,$qury);
       
        $rowC=mysqli_fetch_array($res2);
        $cName=$rowC["name"];
        
        session_start();
        $_SESSION["img"]=$img;
        
       ?>



<div id="title">
    
    <h1> EDIT POST </h1>
    
    </div>
    
  
    
<div id="Fbody"> 
        
        <form  method="post"  action="update.php" enctype="multipart/form-data" >
            
            <table>
                
                <tr>  
       <input type="hidden" name="id" value="<?php echo"".$_GET["id"] ?>" required>    
          
                </tr>
                
                <tr>
             <span><b>Post Title</b></span></br>
            <input type="text" name="title" value="<?php echo"".$title ?>" required>
                   
                </tr>
            
               
               
                      <tr>
                   
             <span><b>Select a Category</b></span></br>
             
              
            <select name="Category">
                
               <option value="<?php echo"".$ctgry ?>"><?php echo"".$cName ?></option> 
                
                 <?php
    
                 include("config.php"); 
    
                 $sql="SELECT * FROM category";
    
                  mysqli_select_db($conn,"pic");
    
                  $res= mysqli_query($conn,$sql);
    
    
                   while($row=mysqli_fetch_array($res)){
                       
                       if($ctgry!=$row["id"]){
                       $name=$row["name"];
                       $id=$row["id"];
        
                   echo'<option value="'.$id.'">'.$name.'</option>';
                       }
        
                     }
    
                  ?>
                 
                     </tr>


                    
                    <tr> 
                    
             <span><b>Add New Image</b></span></br>
            <input type="file" value="img/<?php echo $img; ?>" name="browse">
                   
                    </tr>

                <tr>
            <span><b>Uploaded Image</b></span></br>
            <img src="<?php echo"".$img ?>" width="120px" height="110px" style=" margin-bottom:20px"> <br>
             </tr>
            
        
                
                   <tr>
                          
           
            <button type="submit" name="submit" > POST </button>
                    
             
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    </div>



<?php        
        
  
    
   
}








?>


</body>