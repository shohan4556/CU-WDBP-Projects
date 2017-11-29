<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php
	
	class Cart
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function addToCart($quantity, $id)
		{
			$quantity = $this->fm->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$productId = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();

			$squery = "SELECT * FROM tbl_product WHERE productId = '$productId'";
			$result = $this->db->select($squery)->fetch_assoc();
			
			$productName = $result['productName'];
			$price = $result['price'];
			$image = $result['image'];

			$query = "INSERT INTO tbl_cart(sId, productid, productName, price, quantity, image) VALUES('$sId', '$productid', '$productName', '$price', '$quantity', '$image')";
			$productInsert = $this->db->insert($query);
			if ($productInsert)
			{
				header("Location:cart.php");
			}
			else
			{
				header("Location:404.php");
			}
		}

		public function getCartProduct()
		{
			$sId = session_id();
			$query = "SELECT * FROM tbl_cart WHERE sId='$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateCart($cartId, $quantity)
		{
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$query = "UPDATE tbl_cart SET 
						quantity = '$quantity'
						WHERE cartId = '$cartId'
					";
			$productUpdated = $this->db->Update($query);
			if ($productUpdated)
			{
				$msg = "Cart Update Successfully!!";
				return $msg;
			}
			else
			{
				$msg = "Cartt not Updated!!";
				return $msg;
			}
		}
		public function delProductByCart($delId)
		{
			$query = "DELETE FROM tbl_cart WHERE cartId = '$delId'";
			$deldata = $this->db->delete($query);
			if ($deldata)
				echo "<script>window.location = 'cart.php';</script>";
			else
			{
				$msg = "Cart not deleted!!";
				return $msg;
			}
		}
	}
?>