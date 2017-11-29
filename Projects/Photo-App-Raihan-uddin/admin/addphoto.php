<?php

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Upload Photo</title>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<script >

function validateForm() {
    var x1 = document.forms["photos"]["pid"].value;
    var x2 = document.forms["photos"]["pname"].value;
	var x3 = document.forms["photos"]["pprice"].value;
    var x4 = document.forms["photos"]["file_img"].value;
    var x5 = document.forms["photos"]["pdesc"].value;

    if (x1 == "") {
        alert("photos id must be filled out");
        return false;
            }
    else if(x2 =="")
        {
        alert("photos name must be filled out");
        return false;
            }
			 else if(x3 =="")
        {
        alert("Photos price must be filled out");
        return false;
            }
			 else if(x4 =="")
        {
        alert("Uploade your photos image");
        return false;
            }
			 else if(x5 =="")
        {
        alert("Write photos decription ");
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

<div  id="cont">

<form id="photos" name="photos" method="post" action="photoinsert.php" enctype="multipart/form-data" onSubmit="return validateForm(); " >

  <div>Photo ID:</div>
    <input id="picid"  name="pid" type="text" >
    <div>Photo Name:</div>
    <input id="picname"  name="pname" type="text"  >


    <div>Photo Image:</div>

      <input type="file" name="file_img" id="file_img" >


     <div>Photo Description:</div>

     <textarea name="pdesc" id="pdesc" rows="3" cols="40"></textarea>

    <div><input type="submit" name="btn_upload" button id="addnewphotos" value="Add new photos"   >Add new photos</button> </div>
  </form>

</div>



 </body>
</html>



