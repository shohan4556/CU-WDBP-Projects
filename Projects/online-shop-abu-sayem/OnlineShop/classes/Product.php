<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php

class Product
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function productInsert($data, $file)
	{

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;

		if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "")
		{
			$errormsg = "fields should not be empty!!";
			return $errormsg;
		}
		else
		{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName, catId, brandId, body, price, image, type) VALUES('$productName', '$catId', '$brandId', '$body', '$price', '$uploaded_image', '$type')";
			$productInsert = $this->db->insert($query);
			if ($productInsert)
			{
				$msg = "Product Inserted Successfully!!";
				return $msg;
			}
			else
			{
				$msg = "Product not Inserted!!";
				return $msg;
			}
		}
	}
	public function getAllProduct()
	{
		$query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName FROM tbl_product INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId ORDER BY tbl_product.productId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getProductById($id)
	{
		$query = "SELECT * FROM tbl_product WHERE productId='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function productUpdate($data, $file, $id)
	{
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$catId = mysqli_real_escape_string($this->db->link, $data['catId']);
		$brandId = mysqli_real_escape_string($this->db->link, $data['brandId']);
		$body = mysqli_real_escape_string($this->db->link, $data['body']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited = array('jpg', 'jpeg', 'png', 'gif');
		$file_name = $file['image']['name'];
		$file_size = $file['image']['size'];
		$file_temp = $file['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext = strtolower(end($div));
		$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;

		if ($productName == "" || $catId == "" || $brandId == "" || $body == "" || $price == "" || $type == "")
		{
			$errormsg = "fields should not be empty!!";
			return $errormsg;
		}
		else
		{
			move_uploaded_file($file_temp, $uploaded_image);

			$query = "UPDATE tbl_product SET 
						productName = '$productName',
						catId = '$catId',
						brandId = '$brandId',
						body = '$body',
						price = '$price',
						image = '$uploaded_image',
						type = '$type'
						WHERE productId = '$id'
					";
			$productUpdated = $this->db->Update($query);
			if ($productUpdated)
			{
				$msg = "Product Update Successfully!!";
				return $msg;
			}
			else
			{
				$msg = "Product not Updated!!";
				return $msg;
			}
		}
	}

	public function delProductById($id)
	{
		$query = "SELECT * FROM tbl_product WHERE productId = '$id'";
		$getData = $this->db->select($query);
		if ($getData)
		{
			while ($delImg = $getData->fetch_assoc())
			{
				$dellink = $delImg['image'];
				unlink($dellink);
			}
		}

		$delquery = "DELETE FROM tbl_product WHERE productId = '$id'";
		if ($delquery)
		{
			$msg = "Product deleted Successfully!!";
			return $msg;
		}
		else
		{
			$msg = "Product not deleted!!";
			return $msg;
		}
	}
	public function getFeaturedProduct()
	{
		$query = "SELECT * FROM tbl_product WHERE type='0' ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getNewProduct()
	{
		$query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}
	public function getSingleProduct($id)
	{
		$query = "SELECT p.*, c.catName, b.brandName
				FROM tbl_product as p, tbl_category as c, tbl_brand as b WHERE p.catId = c.catId AND p.brandId=b.brandId AND p.productId = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
}
?>