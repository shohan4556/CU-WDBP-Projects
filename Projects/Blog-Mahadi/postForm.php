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
    
    <?php include("include/header.php"); ?>


  <div id="title">
    
    <h1> ADD POST </h1>
    
    
    </div>
    
<div id="Fbody"> 
        
        <form  method="post"  action="post_insert.php" enctype="multipart/form-data" >
            
            <table>
                
                <tr>
             <span><b>Post Title</b></span></br>
            <input type="text" placeholder="Enter Post Title" name="title" required>
                   
                </tr>
            
                <tr>
                    <span><b>Post Description </b></span></br>

               <textarea rows="18" cols="83" name="content" placeholder="Description">
                   
             </textarea>

            
                 </tr>


                 <tr>
                   
             <span><b>Select a Category</b></span></br>
             
              
            <select name="PostCategory">
                
                 <?php
    
                 include("config.php"); 
    
                 $sql="SELECT * FROM category";
    
                  mysqli_select_db($conn,"myblog");
    
                  $res= mysqli_query($conn,$sql);
    
    
                   while($row=mysqli_fetch_array($res)){
                       
                       $name=$row["name"];
                       $id=$row["id"];
        
                   echo'<option value="'.$id.'">'.$name.'</option>';
        
                     }
    
                  ?>
                 
                    
                  </tr>

                <tr> 
                    
             <span><b>Post Image</b></span></br>
            <input type="file"  name="browse">
                   
                </tr>
            
                 
        
                <tr>
                   
             <span><b>Select an Option</b></span></br>
             
              
            <select name="PostStatus">
                 
                <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                 
                </select>
                       
                 
                    
                  </tr>
                
       
                
                   <tr>
                   
           <button type="submit" name="submit" > POST </button>
                    
                   
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    </div>

<?php include("include/footer.php"); ?>

</body>