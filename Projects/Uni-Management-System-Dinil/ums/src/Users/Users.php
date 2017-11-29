<?php
namespace App\Users;
use App\Session\Session;
use App\Database\Database;


class Users{
    private $first_name;
    private $last_name;
    private $username;
    private $email;
    private $password;
    private $userId;





    public function login($loginInfo){
        $this->username = $loginInfo["user_name"];
        $this->password = trim($loginInfo["password"]);



    }


}