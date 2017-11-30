
<head>

    <link rel="stylesheet" type="text/css" href="include/site.css">
    
<style>
    
    
    
    table, th, td {
    border: 2px inset black;
    border-collapse: collapse;
}
    
    th, td {
    padding: 15px;
}
    th{
        background-color:rosybrown;
        color: white;
        
    }
    
    
    button{
        width: 80%;
        padding: 7px;
        color:yellow;
    }
    
</style>



</head>



<body style="background-color:CornSilk">


<?php 
    
   session_start();
    
    if($_SESSION["admin"]==false)
        header("location: login.php");
        




include("config.php");

include("include/header.php");
include("include/footer.php");  



mysqli_select_db($conn,"pic");

$sql="SELECT * FROM img";

$res=mysqli_query($conn,$sql);

?>
<a href="imgUpForm.php" style="color:tomato; margin:2px 0px 120px 90px"> <b>Add Image?</b></a></br>
<br>
<div id="manageP">
    
<table style="width:100%">

<tr>
    
<th> Caption</th>
    
  

<th> Image</th>      
    
 <th> Action</th> 
   
    
</tr>    

<?php

if($res){
    
    while($row=mysqli_fetch_array($res)){
        
        $title=$row["img_title"];
        $img=$row["img_path"];
        
echo ' <tr> <td> '.$title.' </td> <td> <img src="'.$img.'" width="120px" height="100px"> </td> <td>';
        
  echo '<button type="button" style="background-color:cornflowerblue; margin-bottom:7px" onclick="link('.$row["id"].')" >Edit</button> 
  <button type="button"style="background-color:#c94f42" onclick="dConfirm('.$row["id"].')">Delete</button> </td></tr>';      
        
        
        
    }
    
    
}



?>
    
    <script>
    
function  link(val){
    
    location.href='editImg.php?id='+val;
}
        
function dConfirm(val){
    
var con=confirm("This Image will be Deleted");
    
    if(con==true){
        window.location.href='deleteImg.php?id='+val; 
        
    }
    
    
   
  
}        
  
    
    </script>   
    
</table>    
    
</body>    