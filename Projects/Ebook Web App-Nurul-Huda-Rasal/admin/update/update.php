
<?php
$pid=$_POST['pid'];
$name=$_POST['name'];
$picpath=$_POST['picpath'];
$price=$_POST['price'];
$prodesc=$_POST['pdesc'];

include_once("../../database/config.php");
$sql="UPDATE prodinfo SET name='$name',img_path='$picpath',price='$price',prodesc='$prodesc' WHERE prod_id='$pid'";
$query = mysqli_query($myconn, $sql);
header("location:../edit.php ? pid=$pid");

exit();
?>
