<?php
namespace App\Result;
use App\Database\Database;
class Result{
    private $regId;
    private $courseId;
    private $grade;
    private $id;

    public static function getAll_grades(){
        $sql = "SELECT * FROM grades ORDER BY id ASC";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }
    public function getResultById($id=""){
        $this->id = $id;
        $sql = "SELECT students.reg_no, students.title,students.email, departments.code, courses.course_name,results.grade FROM results LEFT JOIN students ON results.reg_id=students.id LEFT JOIN courses ON results.course_id=courses.id LEFT JOIN departments ON students.dept_id=departments.id WHERE results.id='$this->id'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }

    public function saveResult($data){
        $this->regId = $data["regNo"];
        $this->courseId = $data["courseId"];
        $this->grade = $data["grade"];


        $sql = "INSERT INTO results (reg_id, course_id, grade ) VALUES (:reg_id, :course_id, :grade )";
        $stmt = Database::Prepare($sql);
        $data = [
            ':reg_id'=>$this->regId,
            ':course_id' =>$this->courseId,
            ':grade' =>$this->grade
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Result Saved Successfully.";

        }else{
            $_SESSION["ErrorMsg"] = "Result Save Failed!";
        }
    }

    public function updateResult($data, $id=""){
        $this->grade = $data["grade"];
        $this->id = $id;

        $sql = "UPDATE results SET grade=:grade WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':grade' =>$this->grade,
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Result updated Successfully.";
        }else{
            $_SESSION["ErrorMsg"] = "Result update failed.";
        }
    }
}