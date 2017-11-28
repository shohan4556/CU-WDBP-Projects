
<head>

    <link rel="stylesheet" type="text/css" href="include/site.css">
    
<style>
    
    #manageP{
       max-width: 1190px;
        height: auto;   
        margin: auto;
        background-color: white;
        padding: 40px
    } 
    
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
    
    th, td {
    padding: 15px;
}
    th{
        background-color:cornflowerblue;
        color: white;
        
    }
    
    tr:nth-child(even) {
    background-color: #eee;
}
    
    button{
        width: 100%;
        padding: 7px;
        color:white;
    }
    
</style>



</head>



<body>


<?php 
    
    session_start();
    
    if($_SESSION["admin"]==false)
        header("location: login.php");
        
    
    

include("admin/adminHeader.php");    

include("config.php");

mysqli_select_db($conn,"myblog");

$sql="SELECT * FROM POST";

$res=mysqli_query($conn,$sql);

?>
<a href="postForm.php" style="color:blue; margin:0px 0px 90px 90px"> <b>Add New Post</b></a>    

<div id="manageP">
    
<table style="width:100%">

<tr>
    
<th> Title</th>
    
<th> Description</th>    

<th> Submit Date</th>      
    
<th> Status</th>
    
<th> Actions</th>    
    
</tr>    

<?php

if($res){
    
    while($row=mysqli_fetch_array($res)){
        
         $post=substr($row["post_content"],0,80);
        
echo "<tr> <td>".$row["post_title"]."</td> <td>".$post."</td> <td>".$row["post_date"]."</td> <td>".$row["post_status"]."</td> <td>";
        
  echo '<button type="button" style="background-color:cornflowerblue; margin-bottom:7px" onclick="link('.$row["id"].')" >Edit</button> 
  <button type="button"style="background-color:#c94f42" onclick="dConfirm('.$row["id"].')">Delete</button> </td></tr>';      
        
        
        
    }
    
    
}



?>
    
    <script>
    
function  link(val){
    
    location.href='editForm.php?id='+val;
}
        
function dConfirm(val){
    
var con=confirm("This Post will be Delete");
    
    if(con==true){
        window.location.href='delete.php?id='+val; 
        
    }
    
    
   
    
}        
    
    
    </script>
    
    
</table>    
    
</body>    