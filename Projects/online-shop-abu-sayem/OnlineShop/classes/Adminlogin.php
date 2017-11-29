<?php
	$filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
	include '../lib/Session.php';
	Session::checkLogin();
?>
<?php
	/**
	* Admin Login class
	*/
	class Adminlogin
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function adminLogin($adminUser,$adminPass)
		{
			$adminUser = $this->fm->validation($adminUser);
			$adminPass = $this->fm->validation($adminPass);

			$adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
			$adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

			if (empty($adminUser) || empty($adminPass))
			{
				$loginmsg = "field should not be empty!!";
				return $loginmsg;
			}
			else
			{
				$query = "SELECT * FROM admin_login WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";

				$result = $this->db->select($query);

				if ($result != false)
				{
					$value = $result->fetch_assoc();

					Session::set("adminlogin", true);
					Session::set("adminId", $value['adminId']);
					Session::set("adminUser", $value['adminUser']);
					Session::set("adminName", $value['adminName']);

					header("location:dashboard.php");
				}
				else
				{
					$loginmsg = "Username or Password did not match!";
					return $loginmsg;
				}
			}
		}
	}
?>