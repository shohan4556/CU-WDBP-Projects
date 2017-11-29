<?php
include("../database/config.php")
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delicious</title>

<link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>

	<div id="header">

<?php include("../header/header.php");   ?>

</div>

<div id="menu"> 



	</div>
	<div id="menu1"> 

<?php include("menu/menu.php");   ?>

	</div>
	
	<div id="sbar">
    
    
</div>
	<div id="sbar1"></div>
	
	<div id="cont">
    
<form name="myForm" action="postStatus.php" onsubmit="" method="post" enctype="multipart/form-data" style="border:2px solid #ccc; padding:10px 10px 10px 10px; max-width:50%; margin: 0 auto">
     
	<label><b>Item Name</b></label><span>*</span>  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <label><b>Item Image</b></label><span>*</span> <br>
    <input name="item_name" class="item_name" type="text" placeholder="Enter item name"><input name="item_img" class="item_img" type="file">
	<br>
    <label><b>Category</b></label><span>*</span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <label><b>Price</b></label><span>*</span> <br>
    <input name="category" class="category" type="text" placeholder="Enter item category"><input name="price" class="price" type="number" placeholder="Enter item price">

	
    
	
    
    <br>
    <label><b>Description</b></label><span>*</span> <br>
    <input name="description" class="description" type="text" placeholder="Enter item description">
	
    <br>
 
<center><button type="submit" name="submit" value="Submit" style="width:auto; color:green">Add</button> </center>
      
</form>  
    
</div>
	
	<div id="footer">

<?php include("../footer/footer.php");   ?>

</div>

</body>
</html>
