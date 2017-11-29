<?php
namespace App\Teacher;
use App\Database\Database;
class Teacher{
    private $name;
    private $address;
    private $email;
    private $contNo;
    private $desigId;
    private $dept_id;
    private $credit;
    private $remaining_credit;
    private $teacherId;
    private $id;


    public function teacherInsert($data){
        $this->name = $data["name"];
        $this->address = $data["address"];
        $this->email = $data["email"];
        $this->contNo = $data["contNo"];
        $this->desigId = $data["desigId"];
        $this->dept_id =  $data["dept_id"];
        $this->credit =  $data["credit"];
        $this->remaining_credit =  $data["credit"];

        $sql = "INSERT INTO teachers (name, address, email, contact, desig_id, dept_id, total_credit, remaining_credit) VALUES (:name, :address, 
:email, :contact, :desig_id, :dept_id, :total_credit, :remaining_credit)";
        $stmt = Database::Prepare($sql);
        $data = [
            ':name'=>$this->name,
            ':address' =>$this->address,
            ':email' =>$this->email,
            ':contact' =>$this->contNo,
            ':desig_id' =>$this->desigId,
            ':dept_id' =>$this->dept_id,
            ':total_credit' =>$this->credit,
            ':remaining_credit' =>$this->remaining_credit
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Teacher's information saved Successfully.";
        }else{
            $_SESSION["ErrorMsg"] = "Teacher's information save failed.";
        }
    }

    public static function getDesignations(){
        $sql = "SELECT * FROM designations ORDER BY did ASC";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $totalRows =  $stmt->rowCount();
        $data =  $stmt->fetchAll();
        return $data;
    }

    public static function getAll_teacher(){
        $sql = "SELECT * FROM teachers ORDER BY id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $totalRows =  $stmt->rowCount();
        $data =  $stmt->fetchAll();
        if ($totalRows < 1){
            $_SESSION["ErrorMsg"] = "You don't save any teachers's information yet.";
        }
        return $data;
    }
    public static function getAllTecher_info(){
        $output = '';
        $sql = "SELECT teachers.id, teachers.name, teachers.address,teachers.email, teachers.contact, teachers.total_credit, teachers.remaining_credit, designations.title, departments.code FROM teachers LEFT JOIN designations ON teachers.desig_id=designations.did LEFT JOIN departments ON teachers.dept_id=departments.id WHERE teachers.status='1' ORDER BY teachers.id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();

        $i = 0;
        foreach ($data as $val){
            $i++;
            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>' .$val["name"].'</td>';
            $output .= '<td>' .$val["contact"].'</td>';
            $output .= '<td>' .$val["title"].'</td>';
            $output .= '<td>' .$val["code"].'</td>';
            $output .= '<td>' .$val["total_credit"].'</td>';
            $output .= '<td>' .$val["remaining_credit"].'</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="view-teacher.php?viewId='.$val["id"].'">View</a>';
            $output .= '</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="edit-teacher.php?edit_id='.$val["id"].'">Edit</a>';
            $output .= '</td>';
            $output .='<td>';
            $output .= '<a onclick="return confirm(\'Are u sure ?\')" class="btn btn-default" href="?trash_id='.$val["id"].'">Trash</a>';
            $output .= '</td>';
            $output .= '</tr>';

        }
        return $output;
    }
    public function getTeacherInfo_byId($id=""){
        $this->teacherId =$id;
        $sql = "SELECT teachers.name, teachers.address,teachers.email, teachers.contact, teachers.total_credit, teachers
.remaining_credit,designations.did, designations.title,departments.id, departments.code FROM teachers LEFT JOIN 
designations ON 
teachers.desig_id=designations.did LEFT JOIN departments ON teachers.dept_id=departments.id WHERE teachers.id = '$this->teacherId' ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }

    public function teacherUpdate($data, $id=""){
        $this->name = $data["name"];
        $this->address = $data["address"];
        $this->email = $data["email"];
        $this->contNo = $data["contNo"];
        $this->desigId = $data["desigId"];
        $this->dept_id = $data["dept_id"];
        $this->id = $id;

        $sql = "UPDATE teachers SET name=:name, address=:address, email=:email, contact=:contact, desig_id=:desig_id, dept_id=:dept_id WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':name'=>$this->name,
            ':address' =>$this->address,
            ':email' =>$this->email,
            ':contact' =>$this->contNo,
            ':desig_id' =>$this->desigId,
            ':dept_id' =>$this->dept_id,
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Teachers's information Updated Successfully.";
            //echo "<script>window.location = 'student-list.php';</script>";
        }else{
            $_SESSION["ErrorMsg"] = "Teacher's information update failed.";
        }
    }

    public function moveTo_trash($id){
        $this->id = $id;
        $sql = "UPDATE teachers SET status='0' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Teacher moved to trash.";
            header("Location: teacher-list.php");
        }else{
            $_SESSION["ErrorMsg"] = "Teacher move failed.";
        }
    }
    public function undo_trash($id){
        $this->id = $id;
        $sql = "UPDATE teachers SET status='1' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $data = [
            ':id' =>$this->id
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Teacher moved.";
            header("Location: teacher-list.php");
        }else{
            $_SESSION["ErrorMsg"] = "Teacher move failed.";
        }
    }
    public static function getTrashTeacher_info(){
        $output = '';
        $sql = "SELECT teachers.id, teachers.name, teachers.address,teachers.email, teachers.contact, teachers.total_credit, teachers.remaining_credit, designations.title, departments.code FROM teachers LEFT JOIN designations ON teachers.desig_id=designations.did LEFT JOIN departments ON teachers.dept_id=departments.id WHERE teachers.status='0' ORDER BY teachers.id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();

        $i = 0;
        foreach ($data as $val){
            if ($val["remaining_credit"] <= 0){
                $remaining = 0;
            }else{
                $remaining = $val["remaining_credit"];
            }
            $i++;
            $output .= '<tr>';
            $output .= '<td>'. $i .'</td>';
            $output .= '<td>' .$val["name"].'</td>';
            $output .= '<td>' .$val["contact"].'</td>';
            $output .= '<td>' .$val["title"].'</td>';
            $output .= '<td>' .$val["code"].'</td>';
            $output .= '<td>' .$val["total_credit"].'</td>';
            $output .= '<td>' .$remaining.'</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="view-teacher.php?viewId='.$val["id"].'">View</a>';
            $output .= '</td>';
            $output .='<td>';
            $output .= '<a class="btn btn-default" href="edit-teacher.php?edit_id='.$val["id"].'">Edit</a>';
            $output .= '</td>';
            $output .='<td>';
            $output .= '<a onclick="return confirm(\'Are u sure ?\')" class="btn btn-default" href="?undo_id=' .$val["id"].'">Undo</a>';
            $output .= '</td>';
            $output .= '</tr>';

        }
        return $output;
    }

}