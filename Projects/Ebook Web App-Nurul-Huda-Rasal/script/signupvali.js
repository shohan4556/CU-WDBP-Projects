
function validateForm() {
    var x1 = document.forms["sform"]["username"].value;
    var x2 = document.forms["sform"]["email"].value;
	var x3 = document.forms["sform"]["password"].value;
    var x4 = document.forms["sform"]["gender"].value;
    var x5 = document.forms["sform"]["country"].value;

    if (x1 =="") {
        alert("User name must be filled out");
        return false;
            }
    else if(x2 =="")
        {
        alert("Email must be filled out");
        return false;
            }
			 else if(x3 =="")
        {
        alert("Password must be filled out");
        return false;
            }
			 else if(x4 =="")
        {
        alert("Gender must be field out");
        return false;
            }
			 else if(x5 =="")
        {
        alert("Country must be field out  ");
        return false;
            }
			else
			{return false;}

        }
