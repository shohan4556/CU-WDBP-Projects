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
    

<?php

include("../database/config.php");
if(isset($_GET['item_id'])){
	$item_id = $_GET['item_id'];
	
$result2 = "SELECT * FROM `item` where `item_id`='".$item_id."'";
$query2 = mysqli_query($myconn, $result2);
$count =mysqli_num_rows($query2);

?>
        <p><?php

        if (isset($_SESSION['update_msg'])){
            echo $_SESSION['update_msg'];
            unset($_SESSION['update_msg']);
        }
            ?></p>
        <form method="post" action="update.php" role="form">
<table width="50%" style="margin:0 auto" border="1px solid black" cellspacing="0" cellpadding="6">
                
<?php
while($row = mysqli_fetch_array($query2)){
	$item_name = $row['item_name'];
	$category = $row['category'];
	$price = $row['price'];
	$description = $row['description'];
	$imgname = $row['img_name'];
	$imgpath = $row['img_path'];
	$imgtype = $row['img_type'];
	
	if($item_name == $item_name){
?>
        <input type="hidden" name="item_id" value="<?=$row['item_id']?>"
				<tr width="100%"><td colspan="2"><center><?php echo '<img class="item_img" src="'.$imgpath.'">';?><br>
                            <input class="item_name" type="text" name="name" value="<?php echo $item_name; ?>"/></center></td>
                </tr>
                <tr><td width="50%"><center>Category</center></td>
                <td><center><input class="category" type="text" name="category" value="<?php echo $category; ?>"/></center></td></tr>
                <tr><td width="50%"><center>Price</center></td>
                <td><center><input class="price" type="number" name="price" value="<?php echo $price; ?>"/></center></td
                ></tr>
                <tr><td width="50%"><center>Description</center></td>
                <td><center><input class="description" type="text" name="desc" value="<?php echo $description; ?>"/></center></td></tr>
                <tr width="100%"><td colspan="2"><center><input type="submit" value="Save" style="color:green"></center></td></tr>
               
                
                
                
<?php
		}
	}
}
?> 
    
</table>
 
        </form>
</div>
	
	<div id="footer">

<?php include("../footer/footer.php");   ?>

</div>

</body>
</html>
