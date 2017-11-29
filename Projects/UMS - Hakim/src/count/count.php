<?php

namespace App\count;

use PDO;

class count
{
    private $dbname = 'mysql:host=localhost;dbname=ums';
    private $dbuser = 'root';
    private $dbpass = '';

    public function TotalStudent(){
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT COUNT(*) AS total_stu FROM students";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function EnrollStudent(){
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT COUNT(*) AS enroll_stu FROM enroll_student";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

}