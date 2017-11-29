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
    

<table width="90%" border="2px solid black">

<tr>
<th width="5%">Item ID</th>
<th width="20%">Item Image</th>
<th width="10%">Item Name</th>
<th width="10%">Category</th>
<th width="10%">Price</th>
<th width="20%">Description</th>
<th width="10%">Update</th>

</tr> 

<?php
$sql = "SELECT * FROM item" ;
$result = mysqli_query($myconn,$sql) ;

while($row = mysqli_fetch_array($result)){

$item_id = $row['item_id'];
$item_name = $row['item_name'];
$category = $row['category'];
$price = $row['price'];
$description = $row['description'];
$imgpath = $row['img_path'];

?>

<tr><td width="5%"><center><?php echo $item_id; ?></center></td>
<td width="20%"><center><?php echo '<img class="item_img" src="'.$imgpath.'">';?></center></td>
<td width="10%"><center><?php echo $item_name; ?></center></td>
<td width="10%"><center><?php echo $category; ?></center></td>
<td width="10%"><center><?php echo $price; ?></center></td>
<td width="20%"><center><?php echo $description; ?></center></td>

<td width="10%" ><center><a style="text-decoration:none" href="edit.php?item_id=<?=$row['item_id']?>"><input type="submit" value="Edit" style="color:green" onclick=""></a>
<a style="text-decoration:none" href="delete.php?item_id=<?=$row['item_id']?>"><input type="submit" value="Delete" style="color:red" onclick="return del()"><center></td></a>
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
