<?php
include("database/config.php")
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Delicious</title>

<link rel="stylesheet" type="text/css" href="css/style.css">

</head>

<body>

	<div id="header">

<?php include("header/header.php");   ?>

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
    
<form name="myForm2" action="postStatus2.php" onsubmit="" method="post" enctype="multipart/form-data" style="border:2px solid #ccc; padding:10px 10px 10px 10px; max-width:80%; margin: 0 auto">
     
	<label><b>Which Item you want to order ?</b></label><span>*</span>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<label><b>Quantity</b></label><span>*</span> <br>
    <select name="item1" class="select">
    	<option value="">Choose item</option>
    	<option value="Pudding">Special Pudding</option>
        <option value="Brawnie">Brawnie</option>
        <option value="Vanilla Icecream">Vanilla Icecream</option>
        <option value="Special Mix Icecream">Special Mix Icecream</option>
	</select><input name="quantity1" class="quantity" type="number" placeholder="Quantity">
    <br>
    <select name="item2" class="select">
    <option value="">Choose item</option>
    	<option value="Pudding">Special Pudding</option>
        <option value="Brawnie">Brawnie</option>
        <option value="Vanilla Icecream">Vanilla Icecream</option>
        <option value="Special Mix Icecream">Special Mix Icecream</option>
	</select><input name="quantity2" class="quantity" type="number" placeholder="Quantity">
    <br>
    <select name="item3" class="select">
    <option value="">Choose item</option>
    	<option value="Pudding">Special Pudding</option>
        <option value="Brawnie">Brawnie</option>
        <option value="Vanilla Icecream">Vanilla Icecream</option>
        <option value="Special Mix Icecream">Special Mix Icecream</option>
	</select><input name="quantity3" class="quantity" type="number" placeholder="Quantity">
    <br>
    <label><b>Name</b></label><span>*</span><br>
    <input name="fname" class="fname" type="text" placeholder="First Name"><input name="lname" class="lname" type="text" placeholder="Last Name"><br>
    
    <label><b>Email</b></label><span>*</span> <br>
    <input name="email" class="email" type="email" placeholder="Enter your email"><br>
	<br>
    <label><b>Address</b></label><span>*</span><br>
    <input name="street" class="street" type="text" placeholder="Street"><br>
    <input name="area" class="area" type="text" placeholder="Area Name"><input name="city" class="city" type="text" placeholder="City"><br>
    <input name="zip" class="zip" type="number" placeholder="ZIP Code"><input name="country" class="country" type="text" placeholder="Country">
	
	
    
	
    
    <br>
    <label><b>Contact Number</b></label><span>*</span> <br>
    <input name="c_num" class="c_num" type="text" placeholder="Contact Number">
	
    <br>
 
<center><button type="submit" name="submit" value="Submit" style="width:auto; color:green">Order</button> </center>
      
</form>  
    
</div>
	
	<div id="footer">

<?php include("footer/footer.php");   ?>

</div>

</body>
</html>
