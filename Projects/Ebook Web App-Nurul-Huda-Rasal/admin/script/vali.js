
    function validateForm() {
    var x1 = document.forms["product"]["pid"].value;
    var x2 = document.forms["product"]["pname"].value;
	var x3 = document.forms["product"]["pprice"].value;
    var x4 = document.forms["product"]["file_img"].value;
    var x5 = document.forms["product"]["pdesc"].value;

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
		
			
        }
		
function delete()
{
		var z= confirm("sure you want to insert");
		if(z=="yes")
		{
			return true; 
		 }
		else
		{
			return false; 
	
			}
}




     
	
