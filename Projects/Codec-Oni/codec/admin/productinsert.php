
<?php
//save product on the folder
if(isset($_POST['btn_upload']))
{
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    $filepath = "../img/".$filename;

    move_uploaded_file($filetmp,$filepath);
//insert porduct info
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$pprice=$_POST['pprice'];
$pcat=$_POST['pcat'];
include("../db/dbconn.php");
$result="INSERT INTO product(product_id,product_name,product_price,product_size,product_image,brand,img_path,img_type,price,category)
VALUES('$pid','$pname','$filename','$filepath','$filetype','$pprice','$prodesc')";
$query = mysqli_query($myconn,$result );
header("location:addproduct.php");

/*if($query===TRUE)
{
	echo "successfull";
}
else
{
	echo "not inserted";
}*/
}

exit();


?>