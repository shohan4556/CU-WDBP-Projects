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
            margin: 10px 0px 10px 0px;
            background-color:coral;
            font-size: 19px;
            cursor: pointer;
            
        }
    
</style>     
    

</head>

<body>
    
    
    <?php   
    
    include("config.php");
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        
     mysqli_select_db($conn,"myblog");
        
        $email=$_POST["email"];
        $pass=$_POST["password"];
        
        $sql="SELECT * FROM usertbl WHERE email='$email' AND password='$pass'";
        
        $res=mysqli_query($conn,$sql);
        
        if($res){
            
            $rowCou=mysqli_num_rows($res);
            
            if($rowCou==1){
                
                $row=mysqli_fetch_array($res);
                
                if($row["user_role"]==="admin"){
                    
                    session_start();
                    $_SESSION["admin"]=true;
                    $_SESSION["ad_name"]=$row["firstname"];
                    $_SESSION["ad_id"]=$row["id"];
                    header("location: managePost.php");
                }
                
                else{
                    
                     session_start();
                    $_SESSION["user"]=true;
                    $_SESSION["usr_name"]=$row["firstname"];
                    $_SESSION["usr_id"]=$row["id"];
                    header("location: index.php");
                
                    
                    
                }
                
               
                
            }
            
             else{
                    echo' <p style="text-align:center;color:red;margin-top:20px"> <b>Incorrect email or password </b> </p>';
                }
            
        }
        
        
    }
    
   
    
    
    
    
    ?>
    
    
    
<div id="L_title">
    
    <h1> LOGIN</h1>
    
    </div>

    <div id="login">
    
    
    
    
    <form  method="post"  action="login.php" >
            
            <table>
                
                <tr>
             <span><b>Email</b></span></br>
            <input type="text" placeholder="Enter Email" name="email" required>
                   
                </tr>
            
         <tr>
             <span><b>Password</b></span></br>
            <input type="password" placeholder="Enter Password" name="password" required>
                   
         </tr>
            
        
                   <tr>
                   
           <button type="submit" name="Login" > LOGIN </button>
                    
                   
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    <a href="index.php"> Back to home</a>
     <a href="SignUp.php" style="margin-left:200px"> SignUp here</a>
    
    
    </div>
    


</body>