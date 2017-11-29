<?php
namespace App\Course;
use App\Database\Database;

class Course{
    private $course_code;
    private $courseId;
    private $course_name;
    private $course_credit;
    private $body;
    private $dept_id;
    private $semester_id;
    private $teacherId;
    private $teacher_name;
    private $totalCredit;
    private $remainingCredit;
    private $formRemaining;


    public function courseInsert($data){

        $this->course_code = $data["code"];
        $this->course_name = $data["name"];
        $this->course_credit = $data["credit"];
        $this->body = $data["body"];
        $this->dept_id = $data["dept_id"];
        $this->semester_id =  $data["semi_id"];

        $sql = "INSERT INTO courses (course_code, course_name, course_credit, body, dept_id, semi_id) VALUES (:course_code, :course_name, :course_credit, :body, :dept_id, :semi_id)";
        $stmt = Database::Prepare($sql);
        $data = [
            ':course_code'=>$this->course_code,
            ':course_name' =>$this->course_name,
            ':course_credit' =>$this->course_credit,
            ':body' =>$this->body,
            ':dept_id' =>$this->dept_id,
            ':semi_id' =>$this->semester_id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            //echo "<script>window.location = 'department.php';</script>";
            $_SESSION["SuccessMsg"] = "Course Successfully created.";
        }else{
            $_SESSION["ErrorMsg"] = "Course create failed.";
        }
    }

    public function courseAssign($data){
        $this->dept_id   = $data["department"];
        $this->teacherId = $data["teacher"];
        $this->teacher_name = $data["teacherName"];
        $this->totalCredit  = $data["totalCredit"];
        $this->formRemaining = $data["remainingCredit"];
        $this->remainingCredit = $data["remainingCredit"]- $data["courseCredit"];
        $this->courseId = $data["code"];
        $this->course_code  = $data["courseCode"];
        $this->course_name  = $data["courseName"];
        $this->course_credit   = $data["courseCredit"];

        $sql = "INSERT INTO assign_course (dept_name, teacher_name, totlal_credit, remaining_credit, course_code, course_name, course_credit) VALUES (:dept_name, :teacher_name, :totlal_credit, :remaining_credit, :course_code, :course_name, :course_credit)";
        $stmt = Database::Prepare($sql);
        $data = [
            ':dept_name'=>$this->dept_id,
            ':teacher_name' =>$this->teacher_name,
            ':totlal_credit' =>$this->totalCredit,
            ':remaining_credit' =>$this->remainingCredit,
            ':course_code' =>$this->course_code,
            ':course_name' =>$this->course_name,
            ':course_credit' =>$this->course_credit
        ];
        $status1 =  $stmt->execute($data);



        $sql_teacher = "UPDATE teachers SET remaining_credit=:remaining_credit WHERE id=:teacher_id";
        $stmt = Database::Prepare($sql_teacher);
        $stmt->bindParam(':remaining_credit', $this->remainingCredit);
        $stmt->bindParam(':teacher_id', $this->teacherId);
        $status3 = $stmt->execute();


        if ($status1 == true && $status3 == true){
            $_SESSION["SuccessMsg"] = "Course Assigned Successfully.";
        }
        else{
            $_SESSION["ErrorMsg"] = "Course Assign failed.";
        }
    }


    public static function getAll_courses(){
        $sql = "SELECT * FROM courses ORDER BY id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }
    public function getCoursesByid($id=""){
        $this->courseId = $id;
        $sql = "SELECT * FROM courses WHERE id='$this->courseId'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }

    public function getCoursesBy_deptId($id=""){
        $this->dept_id = $id;
        $sql = "SELECT * FROM courses WHERE dept_id ='$this->dept_id'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }


    public function coursesTrashList(){
        $output = '';
        $sql = "SELECT courses.*,semesters.title FROM courses LEFT JOIN semesters on courses.semi_id = semesters.id WHERE courses.status=0 ORDER BY 
id DESC";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();

        $i = 0;
        foreach ($data as $val){
            $i++;
            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>' .$val["course_code"].'</td>';
            $output .= '<td>' .$val["course_name"].'</td>';
            $output .= '<td>' .$val["course_credit"].'</td>';
            $output .= '<td>' .$val["title"].'</td>';
            $output .= '<td>' .$val["assign"].'</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="edit-course.php?edit_id='.$val["id"].'">Edit</a>';
            $output .= '</td>';
            $output .='<td>';
            $output .= '<a onclick="return confirm(\'Are u sure ?\')" class="btn btn-default" href="?undo='.$val["id"]
                .'">Undo</a>';
            $output .= '</td>';
            $output .= '</tr>';

        }
        return $output;
    }

    public function courseUpdate($data, $id=""){
        $this->course_code = $data["code"];
        $this->course_name = $data["name"];
        $this->body = $data["body"];
        $this->semester_id = $data["semi_id"];
        $this->courseId = $id;

        $sql = "UPDATE courses SET course_code=:course_code, course_name=:course_name, body=:body, semi_id=:semi_id WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $stmt->bindParam(':course_code', $this->course_code);
        $stmt->bindParam(':course_name', $this->course_name);
        $stmt->bindParam(':body', $this->body);
        $stmt->bindParam(':semi_id', $this->semester_id);
        $stmt->bindParam(':id', $this->courseId);
        $status = $stmt->execute();
        if ($status){
            $_SESSION["SuccessMsg"] = "Course is Successfully Updated.";
        }else{
            $_SESSION["ErrorMsg"] = "Course update failed.";
        }
    }


    public function moveTo_trash($id){
        $this->courseId = $id;
        $sql = "UPDATE courses SET status='0' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':id' =>$this->courseId
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Course moved to trash.";
            header("Location: course-stat.php");
        }else{
            $_SESSION["ErrorMsg"] = "Course move failed.";
        }
    }

    public function undo_trash($id){
        $this->courseId = $id;
        $sql = "UPDATE courses SET status='1' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':id' =>$this->courseId
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Course moved to running courses list.";
            header("Location: course-trash-list.php");
        }else{
            $_SESSION["ErrorMsg"] = "Course move failed.";
        }
    }
    public static function unAssign(){
        $sql = "UPDATE assign_course SET stat='2'";
        $stmt = Database::Prepare($sql);
        $status =  $stmt->execute();
        if ($status){
            $_SESSION["SuccessMsg"] = "Unassign all courses successfully.";
            header("Location: unassign.php");
        }else{
            $_SESSION["ErrorMsg"] = "failed to unassign.";
        }
    }

}

?>