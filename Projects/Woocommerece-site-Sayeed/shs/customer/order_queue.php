<?php
	
	
	include("../database/config.php");
	
	$pid = $_GET['id'];
	
	$sql = "insert into customer_order(prod_id,quantity) values('$pid','1')";
		
	
	$query = mysqli_query($myconn,$sql);
	
	
	if($query==true)
	{
			$sql = "select * from productinfo where prod_id='$pid'";
			
			$query = mysqli_query($myconn,$sql);
			
			while($row=mysqli_fetch_array($query))
			{
				
				$pid=$row['prod_id'];
				$pname=$row['pname'];
				$imgpath=$row['img_path'];
				$pprice=$row['price'];
				$pdesc=$row['description'];
				
				
				print($pid);
				echo "Product Name: ".$pname;
				echo "Product Description : ".$pdesc;

				
			}
		
	}			

?>