<?php
include("../database/config.php");
$sql=" SELECT * FROM prodinfo";
$query=mysqli_query($myconn,$sql);

while($row=mysqli_fetch_array($query))
{
$pid=$row['prod_id'];
$pname=$row['name'];	
$picpath=$row['img_path'];	
$price=$row['price'];	
$pdesc=$row['prodesc'];	

echo'<div id="pname" style="float:right;  width:20%; height:20%; border:solid 0px #333333; text-align="center";">'.$pname.'<br>
<a href="viewditels.php? product_id='.$pid.'"><img src="../admin/'.$picpath.'" width="80%" height="80%" ></a><br>
Price:'.$price.'Tk <br/></div>';
	
}

?>

