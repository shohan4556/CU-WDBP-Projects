<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Square Hospital</title>
    <link rel="stylesheet" type="text/css" href="style.css">
     </head>
    <style>
        #h1
           {width:100%;
            height:130px;
            position: absolute;
          left:0px;
    background-color: blueviolet;
background-size:auto;
               top:0;}
        .navbar{
        text-align: center;
        width=100%;
     font-size:20px;
        padding: 5px;
        text-align: center;
        font-family:cursive;
        font-weight: 100;
         }
    a:hover{
        background-color: burlywood;
        trasition:0.4s;
    }
    .navbar ul{
        margin:3;
        padding:3;
        list-style: non;
        position: relative;
    }
    ul{
        list-style-type: none;
        margine:0;
        padding;0;
        position:absolute;
    }
    .navbar li{
        float:left;
    }
    
    </style>
<body>
    <div id="h1"> 
<div class="navbar">
     <h2>hospital</h2> 
    <nav>
    <ul>
        <li><a herf="#">Home</a> </li>
        <li><a herf="#">About</a> </li>
        <li><a herf="#">News</a> </li>
        <li><a herf="#">Sign in</a> </li>
        <li><a herf="#">Feedback</a> </li>

</ul>
        <form class= "search-form">
       <input type="text" placeholder="hospital_search">
            <button>search</button>
        
        </form>
    </nav>

    </div>
    
    <h4>Square Hospital is located in the heart of Dhaka and aims to serve greater portion of the capital city.<br/>
        At present it comprises of two buildings on either side of Panthapath connected by an over-bridge. The main hospital building is 18 stories and is approximately 450,000 sq.ft. The second building (ASTRAS) is located across the street and is 16 stories with 136,000 sq.ft.
        <br/>The second building is expected to be operational by 2011. Both facilities are constructed in accordance with US Fire and Building safety standards
 </h4>
    <h2>Patient form</h2>
    <form method="post" action="config.php"><br/>
    
        
    
   <div>Patient_name: </div>
        <input id="text" name="Patient_name" type="text"  maxlength="16"><br/>
         <div>Father or Mather_name: </div>
        <input id="text"  name="Father or Mather_name" type="text"  maxlength="16"><br/>
         <div>Email: </div>
        <input id="email" name="Email" type="text"  maxlength="16"><br/>
         <div>Phon-number </div>
        <input id="number"  name="Phon-number" type="number"  maxlength="16"><br/>
         <div>NID </div>
        <input id="number"  name="NID" type="number"  maxlength="16"><br/>
         <div>Address </div>
        <input id="text"  name="Address" type="text"  maxlength="16"><br/>
        
<div>
        <input type="radio" id="male" name="gender"><label for="male">Male</label>
    <input type="radio" id="female" name="gender"><label for="female">Female</label>
    <input type="radio" id="child" name="gender"><label for="child">child</label>
        </div>
        <input type="submit" name="Submit">
         </form>
    
    </body>
</html>