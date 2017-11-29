<?php
namespace App\Semester;
use App\Database\Database;
class Semester{
    private $id;
    public static function getAllSemester(){
        $sql = "SELECT * FROM semesters ORDER BY id ASC";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $totalRows =  $stmt->rowCount();
        $data =  $stmt->fetchAll();
        if ($totalRows < 1){
            $_SESSION["ErrorMsg"] = "You don't create any semester yet.";
        }
        return $data;
    }
    public function getAllSemester_by_id($id){
        $new = $this->id = $id;
        $sql = "SELECT * FROM semesters WHERE id='$new'";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }


}