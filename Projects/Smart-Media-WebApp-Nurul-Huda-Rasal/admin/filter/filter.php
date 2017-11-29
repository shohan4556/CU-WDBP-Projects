<?php
$pid=$_POST['pid'];
include("../../database/config.php");
$sql=" SELECT * FROM prodinfo WHERE prod_id=$pid";
$query=mysqli_query($myconn,$sql);
echo'<a href="../find.php"> <p style="color:green;"> Go Back </a>';
echo'<center><table border="1px" width="80%" > <tr>
<td width="15%" >Product id</td>
<td width="15%" >Product name</td>
<td width="15%" >Product image</td>
<td width="8%" >Product price</td>
<td width="15%" >Product description</td>

</tr>
</table></center>';
while($row=mysqli_fetch_array($query))
{
$pid=$row['prod_id'];
$pname=$row['name'];
$picpath=$row['img_path'];
$price=$row['price'];
$pdesc=$row['prodesc'];

echo'<center><table border="1px" width="80%" >
<tr>
<td width="15%">'.$pid.'</td>
<td width="15%">'.$pname.'</td>
<td width="15%"><img src="../../admin/'.$picpath.'" width="40%"height="40%"/></td>
<td width="8%">'.$price.'</td>
<td width="15%">'.$pdesc.'</td>

</tr>
</table></center>';

}

?>
