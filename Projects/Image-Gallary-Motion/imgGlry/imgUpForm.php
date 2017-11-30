<head>

      <link rel="stylesheet" type="text/css" href="include/site.css">
    
    <style>
    
    input{
            
            width:60%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            font-size: 14px;
            
        }
    
    
     select{
             width:60%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            
            
        }
    
         button{
            width:60%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            background-color:Grey;
            font-size: 19px;
            cursor: pointer;
            
        }
    
    
    </style>
    
</head>



<body>
    
    <?php include("include/header.php"); ?>


  <div id="title">
    
    <h1>ADD IMAGE</h1>
    
    
    </div>
    
<div id="Fbody"> 
        
        <form  method="post"  action="imgUpld.php" enctype="multipart/form-data" >
            
            <table>
                
                <tr>
             <span><b>Caption</b></span></br>
            <input type="text" placeholder="Give the caption" name="title" required> </br>
                   
                </tr>
            
                 <tr>
                   
             <span><b>Select a Category</b></span></br>
             
              
            <select name="Category">
                
                 <?php
    
                 include("config.php"); 
    
                 $sql="SELECT * FROM category";
    
                  mysqli_select_db($conn,"pic");
    
                  $res= mysqli_query($conn,$sql);
    
    
                   while($row=mysqli_fetch_array($res)){
                       
                       $name=$row["name"];
                       $id=$row["id"];
                     
        
                   echo'<option value="'.$id.'">'.$name.'</option>';
        
                     }
    
                  ?>
                 
                    
                  </tr> </br>

                <tr> 
                    
             <span><b>Take Image</b></span></br>
            <input type="file"  name="browse">
                   
                </tr>
            
                 
        
                
                   <tr>
                   
           <button type="submit" name="submit" > Upload </button>
                    
                   
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    </div>

<?php include("include/footer.php"); ?>

</body>