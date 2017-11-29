<?php

include("database/config.php");

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
    
    
    
    
