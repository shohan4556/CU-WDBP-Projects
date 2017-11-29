<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Department\Department;
use App\Database\Database;
use App\Session\Session;
use App\Course\Course;
use App\AllocateClass\AllocateClass;
use App\Utility\Utility;
$allocate = new AllocateClass();
?>
<?php
$errors = array();
$start= "";
$end = "";
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Allocate Classrooms</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    $start = $_POST["start"];
                    $end = $_POST["end"];

                    $roomId = $_POST["roomId"];
                    $dayId = $_POST["dayId"];
                    $startLen = strlen($_POST["start"] );
                    $endLen = strlen($_POST["end"] );
                    if (!is_numeric($_POST["deptId"])) {
                        $errors['deptEmpty'] = "Please select a department!";
                    }
                    if (!is_numeric($_POST["courseId"])) {
                        $errors['courseEmpty'] = "Please select a course!";
                    }
                    if (!is_numeric($_POST["roomId"])) {
                        $errors['roomEmpty'] = "Please select a room!";
                    }
                    if (!is_numeric($_POST["dayId"])) {
                        $errors['dayEmpty'] = "Please select a day!";
                    }

                    if (empty($_POST["start"])) {
                        $errors['startEmpty'] = "Please set class start time!";
                    }
                    if (empty($_POST["end"])) {
                        $errors['endEmpty'] = "Please set class ending time!";
                    }
                    if(!empty($_POST["start"])){
                        if ($startLen > 8){
                            $errors['startFormat'] = "Your time format is not correct! Please insert like 12:00:PM";
                        }
                    }
                    if(!empty($_POST["end"])){
                        if ($endLen > 8){
                            $errors['endFormat'] = "Your time format is not correct! Please insert like 12:00:AM";
                        }
                    }
                    if (!empty($_POST["courseId"])){
                        $dptId = $_POST["deptId"];
                        $courseId = $_POST["courseId"];

                        $sql = "SELECT * FROM allocate_rooms WHERE course_id = '$courseId' AND day_id = '$dayId' ";
                        $stmt = Database::Prepare($sql);
                        $stmt->execute();
                        $courseFound =  $stmt->fetchAll();
                        foreach ($courseFound as $course){
                            if ($course["course_id"] = $courseId) {

                                $errors['courseMatch'] = "This course already  scheduled today! Please select another course.";
                            }
                        }
                    }

                    if (!empty($_POST["start"]) && !empty($_POST["end"])){
                        $postStart = strtotime($_POST["start"]);
                        $postEnd = strtotime($_POST["end"]);
                        if ($postStart == strtotime("12:00 AM") || $postStart < strtotime("05:00 AM") ||
                            $postEnd == strtotime("12:00 AM") || $postEnd < strtotime("05:00 AM") || $postStart > $postEnd){
                            $errors['wrongTime'] = "Maybe in your schedule time included 12:00AM - 05:59AM. It's not right time for class schedule.Please Check again.";
                        }

                        $sql = "SELECT * FROM allocate_rooms WHERE room_id = '$roomId' AND day_id = '$dayId' AND value = 1";
                        $stmt = Database::Prepare($sql);
                        $stmt->execute();
                        $data =  $stmt->fetchAll();
                        foreach ($data as $value){
                            $databaseStart = strtotime($value["start"]);
                            $databaseEnd = strtotime($value["end"]);

                            if ($postStart >= $databaseStart && $postStart <= $databaseEnd ||
                                $postEnd >= $databaseStart && $postEnd <= $databaseEnd ||
                                $postStart <= $databaseStart && $postEnd >= $databaseEnd){


                                $newStart = $databaseStart;
                                $newEnd = $databaseEnd;
                                $startTime = date("g:i a", $newStart);
                                $endTime = date("g:i a", $newEnd);
                                $errors['roomBlocked'] = "This room blocked for " . $startTime . " to " . $endTime;
                            }
                        }
                    }

                    if (empty($errors)){
                        $allocate->allocateRoom($_POST);
                    }
                }
            }
            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = ''</script>";
            }
            ?>
            <div class="box-body">
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label for="">Department</label>
                        <select name="deptId" id="deptId" class="form-control selectpicker" data-show-subtext="true"
                                data-live-search="true">
                            <option value="">&larr; Select Department &rarr;</option>
                            <?php
                            foreach (Department::getAllDepartment() as $val) { ?>
                                <option value="<?php echo $val['id']; ?>"><?php echo $val['title']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['deptEmpty'])){
                            echo Utility::error($errors["deptEmpty"]);
                        } ?>
                    </div>


                    <div class="form-group">
                        <label for="">Course Name</label>
                        <select name="courseId" id="courseId" class="form-control">
                            <option value="">&larr; Select Course Name &rarr;</option>
                        </select>
                        <?php if (!empty($errors['courseEmpty'])){
                            echo Utility::error($errors["courseEmpty"]);
                        } ?>
                        <?php if (!empty($errors['courseMatch'])){
                            echo Utility::error($errors["courseMatch"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Room No</label>
                        <select name="roomId" class="form-control selectpicker" data-show-subtext="true"
                                data-live-search="true">
                            <option value="">&larr; Select Room &rarr;</option>
                            <?php
                            foreach (AllocateClass::getAll_rooms() as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['room_no']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['roomEmpty'])){
                            echo Utility::error($errors["roomEmpty"]);
                        } ?>
                        <?php if (!empty($errors['roomBlocked'])){
                            echo Utility::error($errors["roomBlocked"]);
                        } ?>
                        <?php if (!empty($errors['wrongTime'])){
                            echo Utility::error($errors["wrongTime"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Day</label>
                        <select name="dayId" class="form-control selectpicker" data-show-subtext="true"
                                data-live-search="true">
                            <option value="">&larr; Select Day &rarr;</option>
                            <?php
                            foreach (AllocateClass::getAll_days() as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['dayEmpty'])){
                            echo Utility::error($errors["dayEmpty"]);
                        } ?>
                    </div>
                    <div id="totalCredit" class="form-group">
                        <label>From</label><br>
                        <input type="time" id="t1"  data-format="hh:mm A" name="start" value="<?php echo $start; ?>"
                               class="form-control">
                        <?php if (!empty($errors['startEmpty'])){
                            echo Utility::error($errors["startEmpty"]);
                        } ?>
                        <?php if (!empty($errors['startFormat'])){
                            echo Utility::error($errors["startFormat"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>To</label><br>
                        <input  type="time" id="t1"  data-format="hh:mm A" name="end" value="<?php echo $end; ?>" class="form-control">
                        <?php if (!empty($errors['endEmpty'])){
                            echo Utility::error($errors["endEmpty"]);
                        } ?>
                        <?php if (!empty($errors['endFormat'])){
                            echo Utility::error($errors["endFormat"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure?')" name="submit" class="btn
                    btn-info">Allocate</button>
                    <button type="submit" name="refresh" class="btn btn-info">View Schedule</button>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#deptId').change(function () {
            var deptfor_crs = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{deptfor_crs:deptfor_crs},
                dataType:"text",
                success:function (data) {
                    $('#courseId').html(data);
                }
            });
        });
    });
</script>
<script>
    $(function(){
        $('#t1').clockface();
    });
</script>
<?php include "footer.php"?>

