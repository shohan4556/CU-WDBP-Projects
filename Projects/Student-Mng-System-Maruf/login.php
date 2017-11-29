<?php include_once('lib/connection.php'); ?>
<?php include_once('lib/settings.php'); ?>

<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css/style.css">
<!---<script>
function vali()
{
	var x1=document.forms["form"]["name"].value;
	var x2=document.forms["form"]["email"].value;
	var x3=document.forms["form"]["pass"].value;
	
	 if(x2=="")
	{ alert("email must be field out");
		return true;
	 }
	else if(x3=="")
	{ alert("pass must be field out");
		return true;

	 }
	


}
</script>--->
<script src="script/vali.js"></script>
</head>
    
    
    <?php
       
    include("config.php");
    
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        
        
     mysqli_select_db($conn,"crud");
        
        $email=$_POST["email"];
        $pass=$_POST["password"];
        
        $sql="SELECT * FROM admin WHERE email='$email' AND password='$pass'";
        
        $res=mysqli_query($conn,$sql);
        
        if($res){
            
            $rowCou=mysqli_num_rows($res);
            
            if($rowCou==1){
                
                $row=mysqli_fetch_array($res);
                
               
                    
                    session_start();
                    $_SESSION["admin"]=true;
                    header("location: dashboard.php");
                
            }
            
             else{
                    echo' <p style="text-align:center;color:red;margin-top:20px"> <b>Incorrect email or password </b> </p>';
                }
            
        }
        
        
    }
    
   
    
    
    
    
    ?>
    

<body>
<div id="head" >
<?php include("views/elements/header.php");   ?>

</div>
<div id="menu">

</div>

<div  id="cont">
<form id="form" action="login.php" method="post" ;>
<div id="email">email :</div>
<input id="email" type="text" name="email"  style="background-color:#b4de9c"/><br />
<div id="pass">password :</div>
<input id="pass" type="text" name="password" style="background-color:#b4de9c" /><br />
<input type="submit" value="submit" />
</form>

</div>

<div id="footer">


</div>
</body>
</html>