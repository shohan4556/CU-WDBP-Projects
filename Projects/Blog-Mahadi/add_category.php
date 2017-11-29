

<head>

      <link rel="stylesheet" type="text/css" href="include/site.css">
    

    <style>
    
    
    
  #Fbody{
            max-width: 600px;
            margin: 0px auto;
            background-color:#1997e5;
            padding: 40px;
            box-shadow:50px;
            height: 520px;
            
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
    
    if(isset($_POST["submit"])){
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    
        $name=$_POST["name"];
        
        $sql="INSERT INTO category (name)VALUES('$name')";
        
        mysqli_select_db($conn,"myblog");
        mysqli_query($conn,$sql);
        header("location: post_category.php");
        
        
    }
 }
    
    
    
  
    
    include("admin/adminHeader.php"); 
    
    ?>


  <div id="title">
    
    <h1> ADD CATEGORY </h1>
    
    
    </div>
    
<div id="Fbody"> 
        
        <form  method="post"  action="add_category.php" >
            
            <table>
                
                <tr>
             <span><b>Post Title</b></span></br>
            <input type="text" placeholder="Enter Category Name" name="name" required>
                   
                </tr>
        
                
       
                
                   <tr>
                   
           <button type="submit" name="submit" >ADD</button>
                    
                   
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    </div>



</body>