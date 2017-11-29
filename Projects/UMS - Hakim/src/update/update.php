<?php

namespace App\update;

use PDO;

session_start();

class update
{
    private $dbname = 'mysql:host=localhost;dbname=ums';
    private $dbuser = 'root';
    private $dbpass = '';

    public function UpdateDepartment($id = '')
    {
        $dep_id = $id['id'];
        $dep_code = $id['dep_code'];
        $dep_name = $id['dep_name'];

        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "UPDATE department SET dep_name=:dname, dep_code=:dcode, updated_at=:updated WHERE id=$dep_id";


        $stmt = $pdo->prepare($query);
        $data = array(
            ':dname' => $dep_name,
            ':dcode' => $dep_code,
            ':updated' => date('Y-m-d h:m:s')
        );

        $status = $stmt->execute($data);


        $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A department Successfully updated....
                </div>';
        $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to update a Department...
                </div>';

        if ($status) {
            $_SESSION['message'] = $success;
            header('location:../../view-all-department.php');
        } else {
            $_SESSION['message'] = $failed;
            header('location:../../view-all-department.php');
        }
    }

    public function UpdateCourse($id = '')
    {
        $cor_id = $id['id'];
        $cor_code = $id['cor_code'];
        $cor_name = $id['cor_name'];
        $cor_department = $id['cor_department'];
        $cor_semester = $id['cor_semester'];

        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "UPDATE course SET cor_name=:cname, cor_code=:ccode, cor_department=:cdep, cor_semester=:csem, updated_at=:updated WHERE id=$cor_id";


        $stmt = $pdo->prepare($query);
        $data = array(
            ':cname' => $cor_name,
            ':ccode' => $cor_code,
            ':cdep' => $cor_department,
            ':csem' => $cor_semester,
            ':updated' => date('Y-m-d h:m:s')
        );

        $status = $stmt->execute($data);


        $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A Course Successfully updated....
                </div>';
        $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to update a Course...
                </div>';

        if ($status) {
            $_SESSION['message'] = $success;
            header('location:../../course-statics.php');
        } else {
            $_SESSION['message'] = $failed;
            header('location:../../course-statics.php');
        }
    }

}