<?php
namespace App\EnrollCourse;
use App\Database\Database;
class EnrollCourse{
    private $date;
    private $regNo;
    private $courseId;
    private $id;

    public function enrollCourse($data){
        $this->regNo = $data["regNo"];
        $this->courseId = $data["courseId"];
        $this->date = $data["date"];


        $sql = "INSERT INTO entrol_course (reg_no, course_id, date ) VALUES (:reg_no, :course_id, :date )";
        $stmt = Database::Prepare($sql);
        $data = [
            ':reg_no'=>$this->regNo,
            ':course_id' =>$this->courseId,
            ':date' =>$this->date
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Course enrolled Successfully.";

        }else{
            $_SESSION["ErrorMsg"] = "Course enrolled failed!";
        }
    }



    public function enroll_course_list(){
        $output = '';
        $sql = "SELECT students.reg_no, students.title, courses.course_name, departments.code,entrol_course.date,entrol_course.id 
FROM entrol_course LEFT JOIN students ON entrol_course.reg_no=students.id LEFT JOIN courses ON entrol_course
.course_id=courses.id LEFT JOIN departments ON students.dept_id=departments.id ORDER BY entrol_course.id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();

        $i = 0;
        foreach ($data as $val){
            $i++;
            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>' .$val["reg_no"].'</td>';
            $output .= '<td>' .$val["title"].'</td>';
            $output .= '<td>' .$val["course_name"].'</td>';
            $output .= '<td>' .$val["code"].'</td>';
            $output .= '<td>' .$val["date"].'</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="edit-enroll-course.php?edit_id='.$val["id"].'">Edit</a>';
            $output .= '</td>';
            $output .= '</tr>';

        }
        return $output;
    }
    public function enrolledCourseBy_id($id){
        $editId = $this->id = $id;
        $sql = "SELECT students.reg_no, students.title,students.email, courses.course_name, departments.id, departments.code,entrol_course.course_id,entrol_course.date FROM entrol_course LEFT JOIN students ON entrol_course.reg_no=students.id LEFT JOIN courses ON entrol_course .course_id=courses.id LEFT JOIN departments ON students.dept_id=departments.id WHERE entrol_course.id ='$editId' ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }
    public function Update_enrolledCourse($data, $id=""){
        $this->courseId = $data["courseId"];
        $this->id = $id;

        $sql = "UPDATE entrol_course SET course_id=:course_id WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':course_id' =>$this->courseId,
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Course Enrolled Successfully.";
        }else{
            $_SESSION["ErrorMsg"] = "Course Enroll failed.";
        }
    }
}