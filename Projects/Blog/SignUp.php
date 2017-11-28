<head>
    
    
    <style>
        
        body{
            padding: 0px;
            margin: 0px;
            background-color: #2C2B2B;
           
        }
        
        
        #title{
            
            font-size: 25px;
            color: #10B25C;
            margin:0px auto;
            max-width: 400px;
            text-align: center;
            font-family:sans-serif;
        }
    
        #Fbody{
            max-width: 400px;
            margin: 0px auto;
            background-color: #4DBDF5;
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
        
        button{
            width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            background-color: coral;
            font-size: 19px;
            cursor: pointer;
            
        }
        
        
        select{
             width:100%;
            box-sizing: border-box;
            padding: 10px 18px;
            margin: 10px 0px 10px 0px;
            
            
        }
    
    </style>
  
    
    <script>
        
       
     
        
    function passMatchChecker() {
   
         var Sform1 = document.getElementById("mySform");
      
        var pass1=Sform1.elements[4].value;
        
        var pass2=Sform1.elements[5].value;
       
        if(pass1 != pass2)
            return true;
       
        else
            return false;
            
        
}
        
        
        function passValidChecker() {
   
         var pss =   document.getElementById("mySform").elements[4].value;
            
            var chk= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
              
            if(!chk.test(pss))
            {
                return true;
                
                
            }
            
            else 
            {
                return false;
            }
            
            
}
        
        
        function nullChecker() {
            
            var hasNull=false;
        
        var Sform2 = document.getElementById("mySform");
          
            var chek1=Sform2.elements[0].value;
            var chek2=Sform2.elements[2].value;
            var chek4=Sform2.elements[4].value;
            var chek5=Sform2.elements[5].value;
            
            if(chek1==="" || chek2==="" || chek4==="" || chek5===""){
             
                hasNull=true;
                
            }
            
            if(hasNull==true){
                return true;
            }
            else{
                return false;
            }
            
        }
        
        
        function emailChecker() {
   
            
            var sform2= document.getElementById("mySform");
            var eml=sform2.elements[2].value;
            var code=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            
            if(!code.test(eml))
            {
                return true;
                
                
            }
            
            else 
            {
                return false;
            }
            
                     }
        
        
    
    function checkValid(){
        
       
        if(nullChecker())
        {
            window.alert("Please Fill These Required Field");
            return false;
        }
        
        
    else{
           
      
        if(emailChecker()){
            
            
            
                window.alert("Invalid Email Address");
               return false;
            
        }
        
        
        
            else{
        
                   if(passMatchChecker())
                    {
    
                       window.alert("Passwords did not match");
                          return false;
                
                     }
                
                   else{
                       
                     if(passValidChecker())
                      {
    
                       window.alert("You Entered an Invalid Password \n Please Enter Minimum 7 character \n Use at least one lowercase and Upercase letter, one number, and one Special charater");
                          return false;
                
                       }
                       
                       
                       
                     }
            
            
               }
           
                
            
         }
       
        
        
        
        
    }
    
    
    
    </script>
    
    
    
    
</head>



<body>
    
    
    
    <div id="title">
    
    <h1> Sign Up Here </h1>
    
    
    </div>
    
    
    
    <div id="Fbody"> 
        
        <form id="mySform" method="post" onsubmit="return checkValid()" action="insertUser.php" name="Sform">
            
            <table>
                
                <tr>
                    
              <span><b>First Name </b></span><span style="color:red">*</span><br>
            <input name="name1" placeholder="Enter First Name" type="text">
                   
                   
                </tr>
            
                <tr>
                  
             <span><b>Last Name</b></span><br>
            <input name="name2" placeholder="Enter Last Name" type="text" >
                    
                 </tr>
                 
                
                <tr>
                   
             <span><b>Email </b></span><span style="color:red">*</span><br>
            <input id="eml" name="email" placeholder="Enter Email" type="text">
                    
                   
                  </tr>
                
                
                 
                <tr>
                   
             <span><b>Country</b></span><br>
             <select name="Country">
                 
                <option value="BD">Bangladesh</option>
                  <option value="IN">India</option>
                  <option value="PK">Pakistan</option>
                   <option value="SR">Srilanka</option>
                </select>
                       
                 
                    
                  </tr>
                
                
                   
             <span><b>Password </b></span><span style="color:red">*</span><br>
            <input name="Password" placeholder="Enter Password" type="password">
                   
                    
                  </tr>
                
                 <tr>
                    
             <span><b>Retype password </b></span><span style="color:red">*</span><br>
            <input name="Retype_Password " placeholder="Enter Same Password" type="password">
                    
                   
                  </tr>
                
                
                   <tr>
                   
           <button id="mm" type="submit" > Submit </button>
                    
                   
                  </tr>
                
                
                
                
             
             
        </table>
        </form>
    
    
    
    </div>


 
   

</body>