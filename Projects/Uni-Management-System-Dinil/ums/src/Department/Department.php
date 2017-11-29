<?php
namespace App\Department;
use App\Database\Database;
class Department{
    private $code;
    private $title;
    private $id;
    public function departmentInsert($data){
        $this->code = $data["code"];
        $this->title = $data["name"];

        $sql = "INSERT INTO departments(code, title) VALUES (:code, :title)";
        $stmt = Database::Prepare($sql);
        $data = [
            ':code'=>$this->code,
            ':title' =>$this->title
        ];
        $status =  $stmt->execute($data);
        if ($status){
            //echo "<script>window.location = 'department.php';</script>";
            $_SESSION["SuccessMsg"] = "Department is Successfully created.";
        }else{
            $_SESSION["ErrorMsg"] = "Department create failed.";
        }
    }
    public static function getAllDepartment(){
        $sql = "SELECT * FROM departments WHERE status='1' ORDER BY id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $totalRows =  $stmt->rowCount();
        $data =  $stmt->fetchAll();
        if ($totalRows < 1){
            $_SESSION["ErrorMsg"] = "You don't create any department yet.";
        }
        return $data;
    }
    public static function getAllDepartment_with_select(){
        $output = "";
        $sql = "SELECT * FROM departments WHERE status='1' ORDER BY id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        foreach ($data as $key => $value){
            $output = '<option value="'.$data["id"].'">'.$data["title"].'</option>';
        }
        return $output;

    }
    public static function getAll_trashDepartment(){
        $sql = "SELECT * FROM departments WHERE status='0' ORDER BY id DESC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $totalRows =  $stmt->rowCount();
        $data =  $stmt->fetchAll();
        return $data;
    }
    public static function getDepartment_by_id($id){
        $sql = "SELECT * FROM departments WHERE id='$id'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetch();
        return $data;
    }
    public function departmentUpdate($data, $id=""){
        $this->code = $data["code"];
        $this->title = $data["name"];
        $this->id = $id;

        $sql = "UPDATE departments SET code=:code, title=:title WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $stmt->bindParam(':code', $this->code);
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':id', $this->id);
        $status = $stmt->execute();
        if ($status){
            $_SESSION["SuccessMsg"] = "Department is Successfully Updated.";
            echo "<script>window.location = 'view_department.php';</script>";
        }else{
            $_SESSION["ErrorMsg"] = "Department update failed.";
        }
    }
    public function moveTo_trash($id=""){
        $this->id = $id;

        $sql = "UPDATE departments SET status='0' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $status = $stmt->execute();
        if ($status){
            $_SESSION["SuccessMsg"] = "Department moved to trash.";
            echo "<script>window.location = 'view_department.php';</script>";
        }else{
            $_SESSION["ErrorMsg"] = "Department move failed.";
        }
    }
    public function moveTo_active($id=""){
        $this->id = $id;

        $sql = "UPDATE departments SET status='1' WHERE id=:id";
        $stmt = Database::Prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $status = $stmt->execute();
        if ($status){
            $_SESSION["SuccessMsg"] = "Department moved to active list.";
            echo "<script>window.location = 'trash-list.php';</script>";
        }else{
            $_SESSION["ErrorMsg"] = "Department move failed.";
        }
    }


}
?>