<?php
namespace App\Student;
use App\Database\Database;
class Student{
    private $name;
    private $email;
    private $contact;
    private $date;
    private $address;
    private $deptId;
    private $regNo;
    private $studentId;
    private $id;

    public function studentInsert($data){
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->contact = $data["contNo"];
        $this->date = $data["date"];
        $this->address = $data["address"];
        $this->deptId = $data["dept_id"];
        $this->regNo = $data["regNo"];

        $sql = "INSERT INTO students (title, email, contact, date, address, dept_id, reg_no) VALUES (:title, :email, 
:contact, :date, :address, :dept_id, :reg_no )";
        $stmt = Database::Prepare($sql);
        $data = [
            ':title'=>$this->name,
            ':email' =>$this->email,
            ':contact' =>$this->contact,
            ':date' =>$this->date,
            ':address' =>$this->address,
            ':dept_id' =>$this->deptId,
            ':reg_no' =>$this->regNo
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Student's information saved Successfully.";

        }else{
            $_SESSION["ErrorMsg"] = "Student's information save failed.";
        }
    }
    public function studentUpdate($data, $id=""){
        $this->name = $data["name"];
        $this->email = $data["email"];
        $this->contact = $data["contNo"];
        $this->date = $data["date"];
        $this->address = $data["address"];
        $this->deptId = $data["dept_id"];
        $this->id = $id;

        $sql = "UPDATE students SET title=:title, email=:email, contact=:contact, date=:date, address=:address, dept_id=:dept_id WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':title'=>$this->name,
            ':email' =>$this->email,
            ':contact' =>$this->contact,
            ':date' =>$this->date,
            ':address' =>$this->address,
            ':dept_id' =>$this->deptId,
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Student's information Updated Successfully.";
            echo "<script>window.location = 'student-list.php';</script>";
        }else{
            $_SESSION["ErrorMsg"] = "Student's information update failed.";
        }
    }
    public function moveTo_trash($id){
        $this->id = $id;
        $sql = "UPDATE students SET status='0' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Student moved to trash.";
            header("Location: student-list.php");
        }else{
            $_SESSION["ErrorMsg"] = "Student move failed.";
        }
    }
    public function moveTo_active($id){
        $this->id = $id;
        $sql = "UPDATE students SET status='1' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Student moved to active list.";
            header("Location: students-trash-list.php");
        }else{
            $_SESSION["ErrorMsg"] = "Student move failed.";
        }
    }

    public function getAllStudent(){
        $output = '';
        $sql = "SELECT students.*,departments.code FROM students LEFT JOIN departments on students.dept_id = departments.id WHERE 
students.status='1' ORDER BY students.id DESC";
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
            $output .= '<td>' .$val["email"].'</td>';
            $output .= '<td>' .$val["contact"].'</td>';
            $output .= '<td>' .$val["date"].'</td>';
            $output .= '<td>' .$val["code"].'</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="view-student.php?viewId='.$val["id"].'">View</a>';
            $output .='</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="edit-student.php?editId='.$val["id"].'">Edit</a>';
            $output .= '</td>';
            $output .='<td>';
            $output .= '<a onclick="return confirm(\'Are u sure to mve?\')" class="btn btn-default" href="?trashId='.$val["id"].'">Trash</a>';
            $output .= '</td>';
            $output .= '</tr>';

        }
        return $output;
    }
    public static function getAll_active_students(){
        $sql = "SELECT * FROM students WHERE status='1' ORDER BY id DESC";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }
    public function getAll_inactive_Student(){
        $output = '';
        $sql = "SELECT students.*,departments.code FROM students LEFT JOIN departments on students.dept_id = departments.id WHERE 
students.status='0' ORDER BY students.id DESC";
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
            $output .= '<td>' .$val["email"].'</td>';
            $output .= '<td>' .$val["contact"].'</td>';
            $output .= '<td>' .$val["date"].'</td>';
            $output .= '<td>' .$val["code"].'</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="view-student.php?viewId='.$val["id"].'">View</a>';
            $output .='</td>';

            $output .='<td>';
            $output .= '<a onclick="return confirm(\'Are u sure to mve?\')" class="btn btn-default" href="?trashId='
                .$val["id"].'">Undo</a>';
            $output .= '</td>';
            $output .= '</tr>';

        }
        return $output;
    }

    public function getStudentsById($id){
        $this->studentId = $id;
        $sql = "SELECT students.*,departments.code FROM students LEFT JOIN departments on students.dept_id = departments.id WHERE 
students.id='$this->studentId'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }
    public function getStudentByReg($reg){
        $this->regNo = $reg;
        $sql = "SELECT * FROM students WHERE reg_no = '$this->regNo'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }

}