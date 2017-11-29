<?php
$pid=$_GET['product_id'];
include("database/config.php");
$sql=" SELECT * FROM prodinfo WHERE prod_id=$pid ";
$query=mysqli_query($myconn,$sql);
/*echo'<table border="2px" width="80%" > <tr>
<td width="" >Product name</td> 
<td width="" >Product pic</td>
<td width="" ></td>
<td width="" ></td>
<td width="" ></td></tr></table>';*/
while($row=mysqli_fetch_array($query))
{
$pid=$row['prod_id'];
$pname=$row['name'];	
$picpath=$row['img_path'];	
$price=$row['price'];	
$pdesc=$row['prodesc'];	

echo'<div id="pname" style="float:right;  width:100%; height:100%; border:solid 0px #333333; text-align="center";">'.$pname.'<br>
<img src="admin/'.$picpath.'" width="80%" height="80%" ><br>
Price:'.$price.'Tk <br/>
Description:'.$pdesc.' <br/></div>
<form method="post" action="login.php"><input type="submit" value="add to cart" style="color:green; "/></form>';
	
}

?>

