<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
?>

<?php
	
	class Customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function customerRegistration($data)
		{
			$name = mysqli_real_escape_string($this->db->link, $data['name']);
			$address = mysqli_real_escape_string($this->db->link, $data['address']);
			$city = mysqli_real_escape_string($this->db->link, $data['city']);
			$country = mysqli_real_escape_string($this->db->link, $data['country']);
			$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
			$phone = mysqli_real_escape_string($this->db->link, $data['phone']);
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);

			if ($name == "" || $address == "" || $city == "" || $country == "" || $zip == "" || $phone == "" || $email == "" || $password == "")
			{
				$errormsg = "fields should not be empty!!";
				return $errormsg;
			}
			$mailquery = "SELECT * FROM tbl_customer WHERE email ='$email' LIMIT 1";
			$mailchk = $this->db->select($mailquery);
			if ($mailchk != false) {
				$errormsg = "Email already exists!!";
				return $errormsg;
			}
			$query = "INSERT INTO tbl_customer (name, address, city, country, zip, phone, email, password) VALUES('$name', '$address', '$city', '$country', '$zip', '$phone', '$email', '$password')";
			$customerRegistration = $this->db->insert($query);
			if ($customerRegistration)
			{
				$msg = "Successfully Registered!!";
				return $msg;
			}
			else
			{
				$msg = "Registration Failed!!!";
				return $msg;
			}

		}
		public function customerLogin($data)
		{
			$email = mysqli_real_escape_string($this->db->link, $data['email']);
			$password = mysqli_real_escape_string($this->db->link, $data['password']);
			if ($email == "" || $password == "")
			{
				$errormsg = "fields should not be empty!!";
				return $errormsg;
			}

			$query = "SELECT * FROM tbl_customer WHERE email = '$email' AND password = '$password'";
			$result = $this->db->select($query);
			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set("cuslogin", true);
				Session::set("cmrId", $value['id']);
				Session::set("cmrName", $value['name']);
				header("Location:index.php");
			}
			else
			{
				$msg = "Login Failed!!!";
				return $msg;
			}
		}
	}
?>