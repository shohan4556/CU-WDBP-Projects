<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Utility\Utility;
use App\Session\Session;
use App\Student\Student;
use App\Result\Result;
$result = new Result();
?>
<?php
$errors = array();
$name = "";
$email = "";
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Save Student Result</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];

                if (isset($_POST["submit"])) {
                    if (!is_numeric($_POST["regNo"])) {
                        $errors['regNo'] = "Please select a Reg. No.";
                    }
                    if (empty($_POST["name"])) {
                        $errors['nameEmpty'] = "Please select a Reg. No.Student name will be displayed.";
                    }
                    if (empty($_POST["email"])) {
                        $errors['emailEmpty'] = "Please select a Reg. No.Email will be displayed.";
                    }

                    if (empty($_POST["department"])) {
                        $errors['deptEmpty'] = "Please select a Reg. No.department will be displayed.";
                    }
                    if (empty($_POST["courseId"])){
                        $errors['courseEmpty'] = "Please select a course.";
                    }
                    if (!empty($_POST["courseId"])) {
                        $regNo = trim($_POST["regNo"]);

                        $course = "SELECT results.*, students.reg_no FROM results LEFT JOIN students ON results.reg_id = students.id WHERE reg_id = 
'$regNo' LIMIT 1";
                        $courseCheck = Database::Prepare($course);
                        $courseCheck->execute();
                        $courseFound = $courseCheck->fetch();
                        if ($courseFound["reg_id"] == $regNo && $courseFound["course_id"] == $_POST["courseId"]) {
                            $errors['courseMatch'] = "This course's result already saved for " . $courseFound["reg_no"];
                        }
                    }
                    if (empty($_POST["grade"])){
                        $errors['gradeEmpty'] = "Please select a grade letter.";
                    }
                    if (empty($errors)){
                        $result->saveResult($_POST);
                    }
                }
            }
            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = 'result.php'</script>";
            }
            ?>
            <div class="box-body">
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label for="">Student Reg. No.</label>
                        <select id="regNo" name="regNo" class="form-control selectpicker" data-show-subtext="true"
                                data-live-search="true">
                            <option value="">&larr; Select Registration No. &rarr;</option>
                            <?php
                            $id="";
                            foreach (Student::getAll_active_students() as $key => $value){ ?>
                                <option value="<?php echo $value["id"]; ?>"><?php echo $value["reg_no"]; ?></option>
                            <?php  } ?>
                        </select>
                        <?php if (!empty($errors['regNo'])){
                            echo Utility::error($errors["regNo"]);
                        } ?>
                        <div id="courseCode">
                        </div>

                    </div>
                    <div id="std_detail" class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="name" class="form-control" readonly placeholder="Student Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" readonly placeholder="Email...">
                        <?php if (!empty($errors['emailEmpty'])){
                            echo Utility::error($errors["emailEmpty"]);
                        } ?>
                        <br>
                        <label for="">Department</label>
                        <input type="text" name="department" class="form-control" readonly placeholder="Student Name...">
                        <?php if (!empty($errors['deptEmpty'])){
                            echo Utility::error($errors["deptEmpty"]);
                        } ?>
                        <br>
                        <label for="">Courses</label>
                        <select id="courseId" name="courseId" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="">&larr; Select Course &rarr;</option>
                        </select>
                        <?php if (!empty($errors['courseEmpty'])){
                            echo Utility::error($errors["courseEmpty"]);
                        } ?>
                        <?php if (!empty($errors['courseMatch'])){
                            echo Utility::error($errors["courseMatch"]);
                        } ?>

                    </div>
                    <div class="form-group">
                        <label for="">Select Grade Letter</label>
                        <select name="grade" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="">&larr; Select Grade &rarr;</option>
                            <?php foreach (Result::getAll_grades() as $grade){ ?>
                            <option value="<?php echo $grade['id']; ?>"><?php echo $grade['grade']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['gradeEmpty'])){
                            echo Utility::error($errors["gradeEmpty"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure?')" name="submit" class="btn
                    btn-info">Save</button>
                    <button type="submit" name="refresh" class="btn btn-info">Refresh</button>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    $('#date').datepicker({ dateFormat:'yy-mm-dd' });
</script>
<script>
    $(document).ready(function () {
        $('#regNo').change(function () {
            var studentId = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{studentId:studentId},
                dataType:"text",
                success:function (data) {
                    $('#std_detail').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>

