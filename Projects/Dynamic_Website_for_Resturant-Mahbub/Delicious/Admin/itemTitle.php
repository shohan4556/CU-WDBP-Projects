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

$result2 = "SELECT * FROM item";
$query2 = mysqli_query($myconn, $result2);

$count =mysqli_num_rows($query2);

while($row = mysqli_fetch_array($query2)){
	$item_name = $row['item_name'];
	$imgpath = $row['img_path'];
	
	
	?>
		<div id="itemView">		
         <a style="text-decoration:none" href="view.php?item_id=<?=$row['item_id']?>"><?php echo '<img class="item-image" src="'.$imgpath.'">'; ?> <br><center> <?php echo $item_name; ?></center></a> 
         </div>
                
<?php
}
?> 
    
    
    
    
    </table>
    
    
    
</div>
	
	<div id="footer">

<?php include("../footer/footer.php");   ?>

</div>

</body>
</html>
