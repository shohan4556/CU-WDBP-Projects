<?php

namespace App\auth;

use PDO;

session_start();

class auth
{
    private $dbname = 'mysql:host=localhost;dbname=ums';
    private $dbuser = 'root';
    private $dbpass = '';

    private $email;
    private $password;

    //student register field

    private $stu_name;
    private $stu_email;
    private $stu_mobile;
    private $stu_reg_date;
    private $stu_address;
    private $stu_department;
    private $stu_password;
    private $stu_reg;

    public function setData($data = '')
    {
        if (!empty($data['email'])) {
            $this->email = $data['email'];
        }
        if (!empty($data['password'])) {
            $this->password = $data['password'];
        }

        //student register
        if (!empty($data['stu_name'])) {
            $this->stu_name = $data['stu_name'];
        }
        if (!empty($data['stu_email'])) {
            $this->stu_email = $data['stu_email'];
        }
        if (!empty($data['stu_mobile'])) {
            $this->stu_mobile = $data['stu_mobile'];
        }
        if (!empty($data['stu_reg_date'])) {
            $this->stu_reg_date = $data['stu_reg_date'];
        }
        if (!empty($data['stu_address'])) {
            $this->stu_address = $data['stu_address'];
        }
        if (!empty($data['stu_department'])) {
            $this->stu_department = $data['stu_department'];
        }
        if (!empty($data['stu_password'])) {
            $this->stu_password = $data['stu_password'];
        }

        return $this;
    }

    public function emailStudent()
    {

    }


    public function login($info = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);

        $UserOrEmail = "'" . $info['email'] . "'";
        $password = "'" . $info['password'] . "'";

        $query = "SELECT * FROM admin WHERE (email OR username=$UserOrEmail) AND password=$password";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch();

        if (!empty($data)) {
            $_SESSION['user'] = $data;
            header('location:../../index.php');
        } else {
            $_SESSION['message'] = "<b style='color: red'>Your Email or Password is Wrong</b>";
            header('location:../../login.php');
        }
    }


    public function registerStudent()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);


            $query1 = "SELECT dep_name FROM department WHERE id=$this->stu_department";
            $stmt1 = $pdo->prepare($query1);
            $stmt1->execute();
            $dep_full = $stmt1->fetch()['dep_name'];
            $dep3 = substr($dep_full, 0, 3);

            if(!empty($dep3)) {

                $numRows = $pdo->query("select * from students where stu_department='$this->stu_department'")->rowCount();
                $nRows = $numRows + 1;
                if ($nRows < 10) {
                    $stu_reg_no = $dep3 . "-" . date('Y') . "-" . "00" . $nRows;
                }
                else if ($nRows >= 10 && $nRows <= 99) {
                    $stu_reg_no = $dep3 . "-" . date('Y') . "-" . "0" . $nRows;
                }
                else if ($nRows >= 100) {
                    $stu_reg_no = $dep3 . "-" . date('Y') . "-" . $nRows;
                }
            }

            $query = "INSERT INTO students (id,stu_name,stu_email,stu_mobile,stu_reg_date,stu_address,stu_department,stu_password,stu_reg_no,created_at) VALUES(:stu_id,:stu_name,:stu_email,:stu_mobile,:stu_reg,:stu_address,:stu_department,:stu_password,:stu_regi,:created)";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':stu_id' => '',
                ':stu_name' => $this->stu_name,
                ':stu_email' => $this->stu_email,
                ':stu_mobile' => $this->stu_mobile,
                ':stu_reg' => $this->stu_reg_date,
                ':stu_address' => $this->stu_address,
                ':stu_department' => $this->stu_department,
                ':stu_password' => $this->stu_password,
                ':stu_regi' => $stu_reg_no,
                ':created' => date('Y-m-d h:m:s')
            );
            $status = $stmt->execute($data);


            $subject = "University Admission Information";
            $msg = "Your Admission Successfully Submitted <br> Your Password is: " . $this->stu_password . " <br> Your registration no is: ". $stu_reg_no;
//        $txt = wordwrap($msg,70);
            mail($this->stu_email, $subject, $msg);


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A student Successfully registered.... Registration Number is: <b>' . $stu_reg_no . '</b>
                </div>';
            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to register a student...
                </div>';

            if ($status) {
                $obj = new auth();
                $obj->emailStudent();

                $_SESSION['message'] = $success;
                header('location:../../register-student.php');
            } else {
                $_SESSION['message'] = $failed;
                header('location:../../register-student.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }


}