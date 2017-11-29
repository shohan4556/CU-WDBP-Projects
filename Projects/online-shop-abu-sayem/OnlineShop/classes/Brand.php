<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>
<?php

class Brand
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function brandInsert($brandName)
	{
		$brandName = $this->fm->validation($brandName);

		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		if (empty($brandName))
		{
			$errormsg = "field should not be empty!!";
			return $errormsg;
		}
		else
		{
			$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
			$brandInsert = $this->db->insert($query);
			if ($brandInsert)
			{
				$msg = "Brand Inserted Successfully!!";
				return $msg;
			}
			else
			{
				$msg = "Brand not Inserted!!";
				return $msg;
			}
		}
	}

	public function getAllBrand()
	{
		$query = "SELECT * FROM tbl_brand ORDER BY brandId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getbrandById($id)
	{
		$query = "SELECT * FROM tbl_brand WHERE brandId='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function brandUpdate($brandName, $id)
	{
		$brandName = $this->fm->validation($brandName);

		$brandName = mysqli_real_escape_string($this->db->link, $brandName);
		$id = mysqli_real_escape_string($this->db->link, $id);
		if (empty($brandName))
		{
			$errormsg = "field should not be empty!!";
			return $errormsg;
		}
		else
		{
			$query = "UPDATE tbl_brand SET brandName = '$brandName'WHERE brandId = '$id'";
			$updated_Row = $this->db->update($query);
			if ($updated_Row)
			{
				$msg = "brand Updated Successfully!!";
				return $msg;
			}
			else
			{
				$msg = "brand not Updated!!";
				return $msg;
			}
		}
	}

		public function delBrandById($id)
		{
			$query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
			$deldata = $this->db->delete($query);
			if ($deldata)
			{
				$msg = "Brand delete Successfully!!";
				return $msg;
			}
			else
			{
				$msg = "Brand not deleted!!";
				return $msg;
			}
		}
}
?>