<?php
$pid=$_GET['photos_id'];
include("database/config.php");
$sql=" SELECT * FROM photoinfo WHERE photo_id=$pid ";
$query=mysqli_query($myconn,$sql);
/*echo'<table border="2px" width="80%" > <tr>
<td width="" >Photo name</td> 
<td width="" >Photo pic</td>
<td width="" ></td>
<td width="" ></td>
<td width="" ></td></tr></table>';*/
while($row=mysqli_fetch_array($query))
{
$pid=$row['photo_id'];
$pname=$row['name'];	
$picpath=$row['img_path'];	
$pdesc=$row['photodesc'];	

echo'<div id="pname" style="float:center;  width:110%; height:110%; border:solid 0px #333333; text-align="center";">'.$pname.'<br>
<img src="admin/'.$picpath.'" width="80%" height="80%" ></div>';
	
}

?>

