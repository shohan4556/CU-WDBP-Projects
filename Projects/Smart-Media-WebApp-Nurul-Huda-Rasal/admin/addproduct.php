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
    var x5 = document.forms["product"]["pdesc"].value;

    if (x1 == "") {
        alert("Photo id must be filled out");
        return false;
            }
    else if(x2 =="")
        {
        alert("Photo name must be filled out");
        return false;
            }
			 else if(x3 =="")
        {
        alert("Photo price must be filled out");
        return false;
            }
			 else if(x4 =="")
        {
        alert("Uploade your Photoe");
        return false;
            }
			 else if(x5 =="")
        {
        alert("Write Photo decription ");
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
<h2><center>
<form id="product" name="product" method="post" action="productinsert.php" enctype="multipart/form-data" onSubmit="return validateForm(); " >

  <div>Photo ID:</div>
    <input id="picid"  name="pid" type="text" >
    <div>Photo Name:</div>
    <input id="picname"  name="pname" type="text"  >

	<div>Photo Price:</div>
	<input id="picprice"  name="pprice" type="text"  >

    <div>Photo Upload:</div>

      <input type="file" name="file_img" id="file_img" >


     <div>Photo Description:</div>

     <textarea name="pdesc" id="pdesc" rows="3" cols="40"></textarea>

    <div><input type="submit" name="btn_upload" button id="addnewprouct" value="Add new product"   ></button> </div>
  </h2></center>
  </form>


<div id="footer">
<?php include("../footer/footer.php");   ?>




</div>
</div>



 </body>
</html>



