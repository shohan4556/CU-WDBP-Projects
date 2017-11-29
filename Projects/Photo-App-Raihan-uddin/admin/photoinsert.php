
<?php
//save product on the folder
if(isset($_POST['btn_upload']))
{
    $filetmp = $_FILES["file_img"]["tmp_name"];
    $filename = $_FILES["file_img"]["name"];
    $filetype = $_FILES["file_img"]["type"];
    $filepath = "prodimg/".$filename;

    move_uploaded_file($filetmp,$filepath);
$pid=$_POST['pid'];
$pname=$_POST['pname'];
$photodesc=$_POST['pdesc'];
include("../database/config.php");
$result="INSERT INTO photoinfo(photo_id,name,img_name,img_path,img_type,photodesc)
VALUES('$pid','$pname','$filename','$filepath','$filetype','$photodesc')";
$query = mysqli_query($myconn,$result );
header("location:addphoto.php");

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