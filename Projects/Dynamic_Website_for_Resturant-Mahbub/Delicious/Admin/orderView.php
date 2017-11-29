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
	
	<div id="cont" style="padding:1%">
    

<table width="90%" border="2px solid black">

<tr>
<th width="5%">Order ID</th>
<th width="5%">Item 1</th>
<th width="5%">Quantity</th>
<th width="5%">Item 2</th>
<th width="5%">Quantity</th>
<th width="5%">Item 3</th>
<th width="5%">Quantity</th>
<th width="5%">First Name</th>
<th width="5%">Last Name</th>
<th width="5%">Email</th>
<th width="5%">Street</th>
<th width="5%">Area</th>
<th width="5%">City</th>
<th width="5%">ZIP</th>
<th width="5%">Country</th>
<th width="5%">Contact Number</th>
</tr> 

<?php
$sql = "SELECT * FROM `order`" ;
$result = mysqli_query($myconn,$sql) ;

while($row = mysqli_fetch_array($result)){

$order_id = $row['order_id'];
$item1 = $row['item1'];
$item2 = $row['item2'];
$item3 = $row['item3'];
$quantity1 = $row['quantity1'];
$quantity2 = $row['quantity2'];
$quantity3 = $row['quantity3'];
$fname = $row['fname'];
$lname = $row['lname'];
$email = $row['email'];
$street = $row['street'];
$area = $row['area'];
$city = $row['city'];
$zip = $row['zip'];
$country = $row['country'];
$c_num = $row['c_num'];

?>

<tr>

<td width="5%"><center><?php echo $order_id; ?></center></td>
<td width="5%"><center><?php echo $item1; ?></center></td>
<td width="5%"><center><?php echo $quantity1; ?></center></td>
<td width="5%"><center><?php echo $item2; ?></center></td>
<td width="5%"><center><?php echo $quantity2; ?></center></td>
<td width="5%"><center><?php echo $item3; ?></center></td>
<<td width="5%"><center><?php echo $quantity3; ?></center></td>
<td width="5%"><center><?php echo $fname; ?></center></td>
<td width="5%"><center><?php echo $lname; ?></center></td>
<td width="5%"><center><?php echo $email; ?></center></td>
<td width="5%"><center><?php echo $street; ?></center></td>
<td width="5%"><center><?php echo $area; ?></center></td>
<td width="5%"><center><?php echo $city; ?></center></td>
<td width="5%"><center><?php echo $zip; ?></center></td>
<td width="5%"><center><?php echo $country; ?></center></td>
<td width="5%"><center><?php echo $c_num; ?></center></td>

</tr>

<?php
}
?>
 
    
</div>
	
	<div id="footer">

<?php include("../footer/footer.php");   ?>

</div>

</body>
</html>
