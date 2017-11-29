<?php
include("../../database/config.php");
$pid=$_GET['pid'];
$sql=" SELECT * FROM prodinfo WHERE prod_id=$pid";
$query=mysqli_query($myconn,$sql);
echo'<center><table border="1px" width="80%" > <tr>
<td width="" >Product id</td>
<td width="" >Product name</td>
<td width="" >Product image</td>
<td width="" >Product price</td>
<td width="" >Product description</td>
<td width="" >Action</td>
</tr>
</table></center>';
while($row=mysqli_fetch_array($query))
{
$pid=$row['prod_id'];
$pname=$row['name'];
$picpath=$row['img_path'];
$price=$row['price'];
$pdesc=$row['prodesc'];

echo'<center>
<form method="post" action="update.php"><table border="1px" width="80%" >
<tr>
<td width="10%"><input  type="text" name="pid" value="'.$pid.'" /></td>
<td width=""><input type="text" name="name" value="'.$pname.'" /></td>
<td width=""><input type="text" name="picpath" value="'.$picpath.'" /></td>
<td width=""><input type="text"  name="price" value="'.$price.'" /></td>
<td width=""><textarea type="text" name="pdesc" >'.$pdesc.'</textarea></td>
<td width="" ><input type="submit" value="Update now" /></td>
</tr>
</table></form></center>';

}

?>

