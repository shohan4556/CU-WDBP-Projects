<head>

    <link rel="stylesheet" type="text/css" href="include/site.css">
    
    <style>
    
        #box{
            background-color: white;
            color: black;
            padding: 90px;
            max-width: 1080px;
            margin: 40px auto;
            
            
        }
        
       #box>h1{
            
            color:cornflowerblue;
            font-size: 40px;
        }
        
        #box>img{
            
            width: 380px;
            height:390px;
            border-radius: 6%;
            
        }
        
        
        #cmnt{
            
            background-color: white;
            color: black;
            padding: 20px;
            max-width: 1240px;
            margin: 20px auto;
            
            
        }
        input{
            
            width: 70%;
            padding: 10px 18px;
        }
        
        button{
             width: 30%;
            padding: 10px 18px;
            background-color: cornflowerblue;
            font-size: 20px;
            color: white;
            
        }
    
        #cShow{
            background-color: white;
            color: black;
            padding: 20px;
            max-width: 1240px;
            margin: 20px auto; 
            border: 2px solid black;
            
        }
        
        #cShow>p{
            
            color: coral;
        }
        
    </style>
    
</head>

<body>



<?php 
    
include("include/header.php");   ?>
    
    
<div id="box" >  
    
    <?php

include("config.php");

$id=$_GET["id"];

if(isset($_GET["id"]))    
{  
    
    
    $sql="SELECT * FROM post WHERE id=".$id;
   
    mysqli_select_db($conn,"myblog");
    
    $res=mysqli_query($conn,$sql);
    
    if($res){
        
        while($row=mysqli_fetch_array($res))
        {
            
            echo' 
                 <h1>'.$row["post_title"].'</h1>
                 
                 <p style="color:red"> '.$row["post_date"].'</p>
                 
                 <img src="img/'.$row["post_img"].'">
                 
                 <p> <b>'.$row["post_content"].'<b></p>
            
            ';
            
        }
    
    }
    else
        echo " ".$id;
    
}

 





?>
 </div>    
    
    
    <div>
    
    
    <?php
        
     $sql="SELECT * FROM comment";
   
    mysqli_select_db($conn,"myblog");
    
    $res=mysqli_query($conn,$sql);
    
    if($res){
        
        while($row=mysqli_fetch_array($res))
        {
            
            
            $qry="SELECT * FROM usertbl WHERE id=".$row["user_id"];
            
            mysqli_select_db($conn,"myblog");
    
             $res2=mysqli_query($conn,$qry);
            
            $uRow=mysqli_fetch_array($res2);
            
            $u_name=$uRow["firstname"];
            
            echo' 
                  <div id="cShow">
                  <p> <b>'.$u_name.' <b></p> 
                 <h5>'.$row["content"].'</h5> 
                 </div>
            
            ';
            
        }
    
    }
    
    ?>
    
    
    
    
    
    
    
    </div>
    
    
    
    
    
    <div id="cmnt">
    
       
        <form  method="post"  action="commentInsert.php" >
            
            <table>
                
                <tr>  
       <input type="text" name="comment" placeholder="Write Something" >    
          
                </tr>
                
                
                 <tr>  
       <input type="hidden" name="id" value="<?php echo"".$_GET["id"]; ?>" required>    
          
                </tr>
                
                <tr>  
       <input type="hidden" name="user" value="<?php echo"".$_GET["id"]; ?>" required>    
          
                </tr>
            
                   <tr>
                          
           
            <button type="submit" name="submit" >Comment</button>
                    
             
                  </tr>
           
        </table>
        </form>
    
    
    
    
    </div>
    
    <?php include("include/footer.php"); ?>
    
   
    
    </body>