<?php

?>

<!DOCTYPE HTML>
<html>
<head>
<title>Product Insert</title>



</head>
<body>
<center>
<div id="header">


</div>

  <div id="menu">

	<a href="../product/prodinfo.php">|Product info|</a>
	<a href="cusinfo.php">customer Details|</a>
	<a href="../order/order.php">|Order</a>
	<a href="../report.php">Report|</a>
    <a href="edit.php"> Edit|</a>
    <a href="delete.php"> Delete|</a>

  </div>

</div>
<div id="cont">


<table border="3px" width="60%">
<form id="prodinfo" name="prodinfo" method="post" action="cusinsert.php";>
<tr>
   	<td>Customer Name: <input id="name" input name="name"  type="text"  maxlength="16"></td>
   	<td>Password:        <input id="pass" input name="pass"  type="pass"  maxlength="16"></td></tr>


   <tr><td><button id="btn" input type="submit">Add New Customer</button><br ></td></tr>

  </form>
</table>


<?php

include("../config.php");
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


</tr>


</table>';


}



?>


</div>
</center>
 </body>
</html>



