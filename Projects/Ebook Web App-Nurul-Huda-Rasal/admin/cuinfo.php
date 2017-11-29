<?php

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Product Insert</title>
<script>
function del() {
    
       var del= confirm("For sure Would you like to delete it?");
    if(del==true)
        { return true;}
    else 
        { return false;}
           }
</script>


</head>
<body>
<center>
<div id="header">


</div>

  <div id="menu">

	<a href="../product/prodinfo.php">|Product info|</a>
      <a href="cuadd.php">|Add customer|</a>
	<a href="../customer/cusinfo.php">customer Details|</a>
	<a href="../order/order.php">|Order</a>
	<a href="../report.php">Report|</a>
    <a href="cuinfo.php"> Edit|</a>
    <a href="delete.php"> Delete|</a>

  </div>

</div>
<div id="cont">


<table border="3px" width="60%">
<form id="prodinfo" name="prodinfo" method="post" action="";>
<tr>
   	<td>Search by Name: <input id="name" input name="name"  type="text"  placeholder="customer name" maxlength="16"><input  type="submit" name="btn" value="Find it"/></td>
   	 </tr>

  </form>
</table>


<?php

include("../database/config.php");
echo'<table width="60%" border="3px" cellspacing="0" cellpadding="6">
<tr><td width="20%" valign="top">Customer Id	</td>
<td width="20%" valign="top"> Customer Name</td><td width="20%" valign="top">Price password </td></tr></table>';

$sql = "SELECT * FROM custinfo ";
$result=mysqli_query($myconn,$sql);

while($row=mysqli_fetch_array($result) ) {
$id= $row['cu_id'];
$name= $row['name'];
$pass= $row['password'];

echo'<table width="60%" border="3px" cellspacing="0" cellpadding="6">

<tr>
	<td width="20%" valign="top">'.$id.'</td>
 	<td width="20%" valign="top">'.$name.' </td>
	<td width="20%" valign="top">'.$pass.' </td>
    <td width="5%" valign="top"><a href="edit.php?id='.$id.'" style="color:green;">Edit</td></a>
    <td width="5%" valign="top"><a href="delete.php?id='.$id.'"style="color:red;"><input type="submit" value="Delete"style="color:red;"onclick="return del()"> </td></a>

</tr>


</table>';


}



?>


</div>
</center>
 </body>
</html>



