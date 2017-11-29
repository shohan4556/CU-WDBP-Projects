<?php

namespace App\delete;

use PDO;

session_start();

class delete
{
    private $dbname = 'mysql:host=localhost;dbname=ums';
    private $dbuser = 'root';
    private $dbpass = '';

    public function DeleteDepartment($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "DELETE FROM department WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $status = $stmt->execute();


        $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A department Successfully deleted....
                </div>';
        $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to delete a Department...
                </div>';

        if ($status) {
            $_SESSION['message'] = $success;
            header('location:../../view-all-department.php');
        } else {
            $_SESSION['message'] = $failed;
            header('location:../../view-all-department.php');
        }
    }

    public function DeleteCourse($id = '')
    {
        $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
        $query = "DELETE FROM course WHERE id=$id";

        $stmt = $pdo->prepare($query);
        $stmt->execute();
        $status = $stmt->execute();


        $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A Course Successfully deleted....
                </div>';
        $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to delete a Course...
                </div>';

        if ($status) {
            $_SESSION['message'] = $success;
            header('location:../../view-all-courses.php');
        } else {
            $_SESSION['message'] = $failed;
            header('location:../../view-all-courses.php');
        }
    }

    public function unassign(){
        {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "UPDATE assign_teacher SET deleted_at=:deleted_at";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':deleted_at' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    All Courses Successfully Unassigned...
                </div>';
            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to Unassign Courses...
                </div>';

            if ($status) {
                $_SESSION['message'] = $success;
                header('location:../../unassign-all-course.php');
            } else {
                $_SESSION['message'] = $failed;
                header('location:../../unassign-all-course.php');
            }
        }
    }

    public function unallocate(){
        {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "UPDATE allocate_classroom SET deleted_at=:deleted_at";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':deleted_at' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    All Classroom Successfully Unallocated...
                </div>';
            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to Unallocate Classroom...
                </div>';

            if ($status) {
                $_SESSION['message'] = $success;
                header('location:../../unallocate-all-class-room.php');
            } else {
                $_SESSION['message'] = $failed;
                header('location:../../unallocate-all-class-room.php');
            }
        }
    }

}