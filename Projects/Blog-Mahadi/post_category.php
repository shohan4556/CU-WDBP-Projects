<head>

 <link rel="stylesheet" type="text/css" href="include/site.css">
    
</head>

<body>
    
    <?php include("admin/adminHeader.php"); ?>
    
    
    <a href="add_category.php"><b>Add Category</b></a>
    
    <?php
    
     include("config.php"); 
    
     $sql="SELECT * FROM category";
    
    mysqli_select_db($conn,"myblog");
    
   $res= mysqli_query($conn,$sql);
    
    
    while($row=mysqli_fetch_array($res)){
        
        
        
        echo"<p><b>".$row["name"]."</b></p><br>";
        
    }
    
    
    
    
    
    ?>
    



</body>