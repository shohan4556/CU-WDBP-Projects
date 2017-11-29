<?php

namespace App\view;

use PDO;


class view
{

    private $dbname = 'mysql:host=localhost;dbname=ums';
    private $dbuser = 'root';
    private $dbpass = '';

    public function viewDepartment()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM department ORDER BY dep_code ASC";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewSingleDepartment($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM department WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function viewCourse()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM course ORDER BY cor_code ASC";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }


    public function viewSingleCourse($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM course WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data;
    }

    public function viewSemester()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM semester";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewDesignation()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM designation";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewRooms()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM rooms";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewDays()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM days";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewTeacher($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM teachers WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewTeachers()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT teachers.tea_name, department.dep_name, designation.designation_name FROM teachers JOIN department ON department.id = teachers.tea_department JOIN designation ON designation.id = teachers.tea_designation";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewStudent()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT stu_reg_no FROM students";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

    public function viewGrades()
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "SELECT * FROM grades";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetchAll();
        return $data;
    }

}