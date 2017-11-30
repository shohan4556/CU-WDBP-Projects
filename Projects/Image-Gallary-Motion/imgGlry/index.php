<?php 

?>


<head>
    
 <link rel="stylesheet" type="text/css" href="include/site.css">


</head>

<body>

<?php 
    
 include("include/header.php"); 
    
    include("config.php");

 mysqli_select_db($conn,"pic");

$sql="SELECT * FROM img";
    
   

$rowData=mysqli_query($conn,$sql);

if($rowData){
    
    while($row=mysqli_fetch_array($rowData))
    
    {
       $img=$row["img_path"];
    
    
     echo ' <a href="singleView.php?id='.$row["id"].' "><img src="'.$img.'" width="120px" height="140px" style="float:left;margin-left:20px"></a> ';
    
  
    }
    
}

else
    echo mysqli_error($conn);

    
?>

</body>