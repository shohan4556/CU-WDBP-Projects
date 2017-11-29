<?php

namespace App\save;

use PDO;

session_start();

class save
{
    private $dbname = 'mysql:host=localhost;dbname=ums';
    private $dbuser = 'root';
    private $dbpass = '';


    //save department
    private $dep_id;
    private $dep_code;
    private $dep_name;


    //save course
    private $cor_id;
    private $cor_code;
    private $cor_name;
    private $cor_dep;
    private $cor_credit;
    private $cor_desc;
    private $cor_sem;


    //save teacher
    private $tea_id;
    private $tea_name;
    private $tea_address;
    private $tea_email;
    private $tea_mobile;
    private $tea_credit_taken;
    private $tea_designation;
    private $tea_department;

    //allocate classroom
    private $room_id;
    private $day_id;
    private $time_from;
    private $time_to;

    //enroll
    private $stu_reg_no;

    //enroll
    private $grade_id;

    public function setData($data = '')
    {
        //save Department

        if (!empty($data['dep_id'])) {
            $this->dep_id = $data['dep_id'];
        }
        if (!empty($data['dep_code'])) {
            $this->dep_code = $data['dep_code'];
        }
        if (!empty($data['dep_name'])) {
            $this->dep_name = $data['dep_name'];
        }

        //save Course
        if (!empty($data['cor_id'])) {
            $this->cor_id = $data['cor_id'];
        }
        if (!empty($data['cor_code'])) {
            $this->cor_code = $data['cor_code'];
        }
        if (!empty($data['cor_name'])) {
            $this->cor_name = $data['cor_name'];
        }
        if (!empty($data['cor_dep'])) {
            $this->cor_dep = $data['cor_dep'];
        }
        if (!empty($data['cor_credit'])) {
            $this->cor_credit = $data['cor_credit'];
        }
        if (!empty($data['cor_desc'])) {
            $this->cor_desc = $data['cor_desc'];
        }
        if (!empty($data['cor_sem'])) {
            $this->cor_sem = $data['cor_sem'];
        }


        //save teacher
        if (!empty($data['tea_id'])) {
            $this->tea_id = $data['tea_id'];
        }
        if (!empty($data['tea_name'])) {
            $this->tea_name = $data['tea_name'];
        }
        if (!empty($data['tea_address'])) {
            $this->tea_address = $data['tea_address'];
        }
        if (!empty($data['tea_email'])) {
            $this->tea_email = $data['tea_email'];
        }
        if (!empty($data['tea_mobile'])) {
            $this->tea_mobile = $data['tea_mobile'];
        }
        if (!empty($data['tea_credit_taken'])) {
            $this->tea_credit_taken = $data['tea_credit_taken'];
        }
        if (!empty($data['tea_designation'])) {
            $this->tea_designation = $data['tea_designation'];
        }
        if (!empty($data['tea_department'])) {
            $this->tea_department = $data['tea_department'];
        }

        //allocate classroom
        if (!empty($data['room_id'])) {
            $this->room_id = $data['room_id'];
        }
        if (!empty($data['day_id'])) {
            $this->day_id = $data['day_id'];
        }
        if (!empty($data['time_from'])) {
            $this->time_from = $data['time_from'];
        }
        if (!empty($data['time_to'])) {
            $this->time_to = $data['time_to'];
        }

        //enroll
        if (!empty($data['stu_reg_no'])) {
            $this->stu_reg_no = $data['stu_reg_no'];
        }

        //result
        if (!empty($data['grade_id'])) {
            $this->grade_id = $data['grade_id'];
        }

        return $this;
    }

    public function saveDepartment()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = " SELECT * FROM department WHERE dep_code=$this->dep_code";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $query1 = " SELECT * FROM department WHERE dep_name=$this->dep_name";
            $stmt1 = $pdo->prepare($query1);
            $stmt1->execute();


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This Department Successfully Saved....
                </div>';


            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This Department Already Exists...
                </div>';


            if ($stmt->rowCount() > 0 or $stmt1->rowCount() > 0) {
                $_SESSION['message'] = $failed;
                header('location:../../save-department.php');
            } else {
                $query = "INSERT INTO department (id,dep_code,dep_name,created_at) VALUES(:i,:dc,:dn,:created_at)";
                $stmt = $pdo->prepare($query);
                $data = array(
                    ':i' => '',
                    ':dc' => $this->dep_code,
                    ':dn' => $this->dep_name,
                    ':created_at' => date('Y-m-d h:m:s')
                );
                $stmt->execute($data);
                $_SESSION['message'] = $success;
                header('location:../../save-department.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }


    public function saveCourse()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = " SELECT cor_code FROM course WHERE cor_code='$this->cor_code' OR cor_name='$this->cor_name'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This Course Successfully Saved....
                </div>';


            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This Course Already Exists...
                </div>';


            if ($stmt->rowCount() > 0) {
                $_SESSION['message'] = $failed;
                header('location:../../save-course.php');
            } else {
                $query = "INSERT INTO course (id,cor_department,cor_semester,cor_code,cor_name,cor_desc,cor_credit,created_at) VALUES(:i,:d,:s,:cc,:cn,:cd,:ccr,:created)";

                $stmt = $pdo->prepare($query);
                $data = array(
                    ':i' => '',
                    ':d' => $this->cor_dep,
                    ':s' => $this->cor_sem,
                    ':cc' => $this->cor_code,
                    ':cn' => $this->cor_name,
                    ':cd' => $this->cor_desc,
                    ':ccr' => $this->cor_credit,
                    ':created' => date('Y-m-d h:m:s')
                );

                $stmt->execute($data);

                $_SESSION['message'] = $success;
                header('location:../../save-course.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }


    public function saveTeacher()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = "INSERT INTO teachers (id,tea_name,tea_address,tea_email,tea_mobile,tea_credit_taken,tea_designation,tea_department,created_at) VALUES(:i,:tname,:address,:email,:mobile,:credit,:designation,:department,:created)";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => '',
                ':tname' => $this->tea_name,
                ':address' => $this->tea_address,
                ':email' => $this->tea_email,
                ':mobile' => $this->tea_mobile,
                ':credit' => $this->tea_credit_taken,
                ':designation' => $this->tea_designation,
                ':department' => $this->tea_department,
                ':created' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A Teacher Successfully Saved....
                </div>';
            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    failed to save a Teacher...
                </div>';

            if ($status) {
                $_SESSION['message'] = $success;
                header('location:../../save-teacher.php');
            } else {
                $_SESSION['message'] = $failed;
                header('location:../../save-teacher.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function assignTeacher()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);

            $query = " SELECT course_code FROM assign_teacher WHERE course_code='$this->cor_code' AND teacher_id=$this->tea_id AND deleted_at = '0000-00-00 00:00:00'";
            $stmt = $pdo->prepare($query);
            $stmt->execute();

            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A Teacher Successfully Assigned to a Course....
                </div>';
            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This Course Already Assigned to this teacher...
                </div>';

            if ($stmt->rowCount() > 0) {
                $_SESSION['message'] = $failed;
                header('location:../../course-assign-teacher.php');
            } else {
                $query = "INSERT INTO assign_teacher (id,teacher_id,department_id,course_id,course_code,course_credit,created_at) VALUES(:i,:tid,:department,:course_id,:ccode,:ccred,:created)";

                $stmt = $pdo->prepare($query);
                $data = array(
                    ':i' => '',
                    ':tid' => $this->tea_id,
                    ':department' => $this->dep_id,
                    ':course_id' => $this->cor_id,
                    ':ccode' => $this->cor_code,
                    ':ccred' => $this->cor_credit,
                    ':created' => date('Y-m-d h:m:s')
                );

                $stmt->execute($data);

                $_SESSION['message'] = $success;
                header('location:../../course-assign-teacher.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function allocate()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);

         /*   $query = "select * from allocate_classroom where room_id = $this->room_id and day_id = $this->day_id and time_from < $this->time_to and time_to > $this->time_from";
            $stmt = $pdo->prepare($query);
            $stmt->execute();*/


            $query = "INSERT INTO allocate_classroom (id,department_id,course_id,room_id,day_id,time_from,time_to,created_at) VALUES(:i,:department_id,:course_id,:room_id,:day_id,:tfrom,:tto,:created)";

            $stmt = $pdo->prepare($query);
            $data = array(
                ':i' => '',
                ':department_id' => $this->dep_id,
                ':course_id' => $this->cor_id,
                ':room_id' => $this->room_id,
                ':day_id' => $this->day_id,
                ':tfrom' => $this->time_from,
                ':tto' => $this->time_to,
                ':created' => date('Y-m-d h:m:s')
            );

            $status = $stmt->execute($data);


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    A Course Successfully Allocated to Classroom....
                </div>';
            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    oopps....!  failed.......
                </div>';

            if ($status) {
                $_SESSION['message'] = $success;
                header('location:../../allocate-class-room.php');
            } else {
                $_SESSION['message'] = $failed;
                header('location:../../allocate-class-room.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public
    function enroll()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = " SELECT * FROM enroll_student WHERE stu_reg_no='$this->stu_reg_no' AND course_id=$this->cor_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute();


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This student Successfully Enrolled in a Course....
                </div>';


            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    This Student Already Enrolled in This Course...
                </div>';


            if ($stmt->rowCount() > 0) {
                $_SESSION['message'] = $failed;
                header('location:../../enroll-course.php');
            } else {
                $query = "INSERT INTO enroll_student (id,stu_reg_no,course_id,created_at) VALUES(:i,:srn,:cor_id,:created)";

                $stmt = $pdo->prepare($query);
                $data = array(
                    ':i' => '',
                    ':srn' => $this->stu_reg_no,
                    ':cor_id' => $this->cor_id,
                    ':created' => date('Y-m-d h:m:s')
                );

                $stmt->execute($data);

                $_SESSION['message'] = $success;
                header('location:../../enroll-course.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }


    public
    function saveResult()
    {
        try {
            $pdo = new PDO($this->dbname, $this->dbuser, $this->dbpass);
            $query = " SELECT * FROM results WHERE stu_reg_no='$this->stu_reg_no' AND course_id=$this->cor_id";
            $stmt = $pdo->prepare($query);
            $stmt->execute();


            $success = '<div class="alert bg-success alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    Successfully Saved....
                </div>';


            $failed = '<div class="alert bg-warning-400 alert-styled-left">
                    <button type="button" class="close" data-dismiss="alert"><span>X</span><span class="sr-only">Close</span></button>
                    The Result for this student in this course Already saved...
                </div>';


            if ($stmt->rowCount() > 0) {
                $_SESSION['message'] = $failed;
                header('location:../../save-student-result.php');
            } else {
                $query = "INSERT INTO results (id,stu_reg_no,course_id,grade_id,created_at) VALUES(:i,:srn,:cor_id,:grade,:created)";

                $stmt = $pdo->prepare($query);
                $data = array(
                    ':i' => '',
                    ':srn' => $this->stu_reg_no,
                    ':cor_id' => $this->cor_id,
                    ':grade' => $this->grade_id,
                    ':created' => date('Y-m-d h:m:s')
                );

                $stmt->execute($data);

                $_SESSION['message'] = $success;
                header('location:../../save-student-result.php');
            }

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();

        }
    }


}