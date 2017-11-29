<?php
	

class Session
{
	public static function init()
	{
		if (version_compare(phpversion(), '7.1.8', '<'))
		{
			if (session_id() == '')
			{
				session_start();
			}
			elseif (session_status() == PHP_SESSION_NONE)
			{
				session_start();
			}
		}
	}

	public static function set($key, $val)
	{
		$_SESSION[$key] = $val;
	}

	public static function get($key)
	{
		if (isset($_SESSION[$key]))
		{
			return $_SESSION[$key];
		}
		else
		{
			return false;
		}
	}

	public static function checkSession()
	{
		self::init();
		if (self::get("adminlogin") == true)
		{
			self::destroy();
			header("Location:login.php");
		}
	}

	public static function checkLogin()
	{
		self::init();
		if (self::get("adminlogin") == true)
		{
			header("location:dashboard.php");
		}
	}

	public static function destroy()
	{
		session_destroy();
		header("Location:login.php");
	}
}
?>