<head>
<link rel="stylesheet" type="text/css" href="include/site.css">

    
    <style>   
 
        input{
            
            width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            font-size: 14px;
            
        } 
        
         button{
            width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 20px 0px 10px 0px;
            background-color:FireBrick;
            font-size: 19px;
            cursor: pointer;
            
        }
    
</style>     
    

</head>

<body>
    
    
    <?php   
    
    include("config.php");
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        
     mysqli_select_db($conn,"pic");
        
        $email=$_POST["email"];
        $pass=$_POST["password"];
        
        $sql="SELECT * FROM user WHERE email='$email' AND password='$pass'";
        
        $res=mysqli_query($conn,$sql);
        
        if($res){
            
            $rowCou=mysqli_num_rows($res);
            
            if($rowCou==1){
                
                $row=mysqli_fetch_array($res);
                
                if($row["user_role"]==="admin"){
                    
                    session_start();
                    $_SESSION["admin"]=true;
                    header("location: manageImg.php");
                }
                
            }
            
        }
        
        
    }
    
   
    
    
    
    
    ?>
    
    
    
<div id="L_title">
    
    <h1> LOGIN PLEASE?</h1>
    
    </div>

    <div id="login">
    
    
    
    
    <form  method="post"  action="login.php" >
            
            <table>
                
                <tr>
             <span><b>Email</b></span></br>
            <input type="text" placeholder="What is Your Email?" name="email" required>
                   
                </tr>
            
         <tr>
             <span><b>Password</b></span></br>
            <input type="text" placeholder="What is Your Password?" name="password" required>
                   
         </tr>
            
        
                   <tr>
                   
           <button Style="border-radius:60%" type="submit" name="Login" > LOGIN </button>
                    
                   
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    
    
    
    </div>
    


</body>