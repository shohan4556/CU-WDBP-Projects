<?php
include("login/session.php");

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Customer info</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script >

function validateForm() {
    var x1 = document.forms["product"]["pid"].value;
    var x2 = document.forms["product"]["pname"].value;
	var x3 = document.forms["product"]["pprice"].value;
    var x4 = document.forms["product"]["file_img"].value;
    var x5 = document.forms["product"]["pcat"].value;

    if (x1 == "") {
        alert("Product id must be filled out");
        return false;
            }
    else if(x2 =="")
        {
        alert("Product name must be filled out");
        return false;
            }
			 else if(x3 =="")
        {
        alert("Product price must be filled out");
        return false;
            }
			 else if(x4 =="")
        {
        alert("Uploade your product image");
        return false;
            }
			 else if(x5 =="")
        {
        alert("Write product decription ");
        return false;
            }
		
			/*var z= confirm("Would you want to insert a new product");
		if(z=="yes")
		{
			return true; 
		 }
		else
		{
			return false; 
	
			}*/
        }
		
</script>

</head>
<body>
<div id="head" >
<?php include("../header/header.php");   ?>

</div>
<div id="menu">
<?php include("menu/menu.php");   ?>

</div>

<div  id="cont">

<form id="product" name="product" method="post" action="productinsert.php" enctype="multipart/form-data" onSubmit="return validateForm(); " >

  <div>Product ID:</div>
    <input id="picid"  name="pid" type="text" >
    <div>Product Name:</div>
    <input id="picname"  name="pname" type="text"  >

	<div>Product Price:</div>
	<input id="picprice"  name="pprice" type="text"  >

    <div>Product Image:</div>

      <input type="file" name="file_img" id="file_img" >


     <div>Product Category:</div>
	    <select input id="category" input name="category" >*
          <option value=""></option>

      <option value="photo">photo</option>
	<option value="music">music</option>
	<option value="ebook">ebook</option>

    </select>

    <div><input type="submit" name="btn_upload" button id="addnewprouct" value="Add new product"   >Add new product</button> </div>
  </form>


<div id="footer">
<?php include("../footer/footer.php");   ?>




</div>
</div>



 </body>
</html>



