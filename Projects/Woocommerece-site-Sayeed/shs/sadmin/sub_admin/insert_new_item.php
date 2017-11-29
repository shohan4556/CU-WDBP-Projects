<?php
	
	include("login/session.php");
	
	include("../../database/config.php");

	if(isset($_POST['btn_upload']))
	{
		$filetmp = $_FILES["pimage"]["tmp_name"];
		$filename = $_FILES["pimage"]["name"];
		$filetype = $_FILES["pimage"]["type"];
		$filepath = "../prodimg/".$filename;

		move_uploaded_file($filetmp,$filepath);
		
		$filepath = "prodimg/".$filename;

		$pid=$_POST['pid'];
		$pname=$_POST['pname'];
		$price=$_POST['pprice'];
		$prodesc=$_POST['pdesc'];
		
		$result="INSERT INTO productinfo(prod_id,pname,img_name,img_path,img_type,price,description)
		VALUES('$pid','$pname','$filename','$filepath','$filetype','$price','$prodesc')";
		
		$query = mysqli_query($myconn,$result );
		
		

		if($query===TRUE){
			header("location:product_view.php");
		}
		else{
			echo '<h1 style="color:red">Item Not Inserted.</h1>';
		}
	}

	exit();

?>