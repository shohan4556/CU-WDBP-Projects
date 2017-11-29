<?php
namespace App\AllocateClass;
use App\Database\Database;
class AllocateClass{
    private $deptId;
    private $courseId;
    private $roomId;
    private $dayId;
    private $start;
    private $end;


    public static function getAll_rooms(){
        $sql = "SELECT * FROM rooms ORDER BY id ASC ";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }
    public static function getAll_days(){
        $sql = "SELECT * FROM days ORDER BY id ASC";
        $stmt = Database::Prepare($sql);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        return $data;
    }
    public function allocateRoom($data){

        $start = strtotime($data["start"]);
        $ending = strtotime($data["end"]);

        if ($start == strtotime("12:00 AM") ){
            $newStar = strtotime("11:59 PM");
        }
        else{
            $newStar = $start;
        }
        if ($ending == strtotime("12:00 AM")){
            $newEnding = strtotime("11:59 PM");
        }
        else{
            $newEnding = $ending;
        }
        $this->deptId = $data["deptId"];
        $this->courseId = $data["courseId"];
        $this->roomId = $data["roomId"];
        $this->dayId = $data["dayId"];
        $this->start = date("H:i",  $newStar);
        $this->end = date("H:i", $newEnding);



        $sql = "INSERT INTO allocate_rooms (dept_id, course_id, room_id, day_id, start, end) VALUES (:dept_id, :course_id, 
:room_id, :day_id, :start, :end )";
        $stmt = Database::Prepare($sql);
        $data = [
            ':dept_id'=>$this->deptId,
            ':course_id' =>$this->courseId,
            ':room_id' =>$this->roomId,
            ':day_id' =>$this->dayId,
            ':start' =>$this->start,
            ':end' =>$this->end
        ];
        $status =  $stmt->execute($data);
        if ($status){
            $_SESSION["SuccessMsg"] = "Class schedule saved Successfully.";

        }else{
            $_SESSION["ErrorMsg"] = "Class schedule save failed.";
        }
    }
    public static function unAllocate (){
        $sql = "UPDATE allocate_rooms SET value='2'";
        $stmt = Database::Prepare($sql);
        $status =  $stmt->execute();
        if ($status){
            $_SESSION["SuccessMsg"] = "unallocate all rooms successfully.";
            header("Location: unallocate.php");
        }else{
            $_SESSION["ErrorMsg"] = "failed to unallocate.";
        }
    }
}