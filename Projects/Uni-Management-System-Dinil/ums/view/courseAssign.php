<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Session\Session;
use App\Department\Department;
use App\Utility\Utility;
use App\Course\Course;
$course = new Course();
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Course Assign to Teacher</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    $teacherName = $_POST["teacher"];
                    if (empty($_POST["department"])) {
                        $errors['departmentEmpty'] = "Please select a department.";
                    }
                    if (empty($_POST["teacher"]) || empty($_POST["teacherName"])) {
                        $errors['teacherEmpty'] = "Please select a teacher.";
                    }
                    if (empty($_POST["totalCredit"])) {
                        $errors['totalCredit'] = "Credit to be taken field must not be empty!";
                    }
                    if (empty($_POST["code"]) || empty($_POST["courseCode"])) {
                        $errors['codeEmpty'] = "Please select a course code.";
                    }
                    if (!empty($_POST["courseCode"])) {
                        $codeExistence = trim($_POST["courseCode"]);

                        $codeQuery = "SELECT * FROM assign_course WHERE course_code = '$codeExistence' AND stat=1 LIMIT 1";
                        $codeCheck = Database::Prepare($codeQuery);
                        $codeCheck->execute();
                        $codeFound = $codeCheck->fetch();
                        if ($codeFound != false) {
                            $errors['codeMatch'] = "This Course Already Assigned to " . $codeFound['teacher_name']. ".";
                        }
                    }
                    if (empty($_POST["courseName"])) {
                        $errors['courseNameEmpty'] = "Course name must not be empty!";
                    }
                    if (empty($_POST["courseCredit"])) {
                        $errors['courseCredit'] = "Course Credit must not be empty!";
                    }
                    if (empty($errors)){
                        if (isset($_POST["remainingCredit"])) {
                            if ($_POST["remainingCredit"] < $_POST["courseCredit"]){
                                $_SESSION['assignTeacher'] = $_POST;
                                header('location: confirm.php');
                                die();
                            }
                        }
                        $course->courseAssign($_POST);
                    }
                }
            }
            elseif (isset($_GET['con'])) {
                if (isset($_SESSION['assignTeacher'])) {
                    if ($_GET['con'] == 1) {
                        $course->courseAssign($_SESSION['assignTeacher']);
                    }
                    unset($_SESSION['assignTeacher']);
                }
            }

            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = 'courseAssign.php'</script>";
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
                        <select name="department" id="department" class="form-control text-center">
                            <option value="">&larr; Select Department &rarr;</option>
                            <?php
                            foreach (Department::getAllDepartment() as $value) { ?>
                                <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>

                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['departmentEmpty'])){
                            echo Utility::error($errors["departmentEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Teacher</label>
                        <select name="teacher" id="teacher" class="form-control">
                            <option value="">&larr; Select Teacher &rarr;</option>
                        </select>
                        <?php if (!empty($errors['teacherEmpty'])){
                            echo Utility::error($errors["teacherEmpty"]);
                        } ?>

                    </div>
                    <div id="totalCredit" class="form-group">
                        <label>Credit to be taken</label>
                        <input type="number" name="totalCredit"  value="" class="form-control" readonly
                               placeholder="...">
                        <?php if (!empty($errors['totalCredit'])){
                            echo Utility::error($errors["totalCredit"]);
                        } ?>

                        <label>Remaining Credit</label>
                        <input type="number" name="remainingCredit" class="form-control" readonly placeholder="...">
                        <?php if (!empty($errors['remainingCredit'])){
                            echo Utility::error($errors["remainingCredit"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Course Code</label>
                        <select name="code" id="code"  class="form-control">
                            <option value="">&larr; Select Course Code &rarr;</option>
                        </select>
                        <?php if (!empty($errors['codeEmpty'])){
                            echo Utility::error($errors["codeEmpty"]);
                        } ?>
                        <?php if (!empty($errors['codeMatch'])){
                            echo Utility::error($errors["codeMatch"]);
                        } ?>
                    </div>
                    <div id="course_detail" class="form-group">
                        <label>Course Name</label>
                        <input type="text" name="courseName" readonly class="form-control" placeholder="Course Name...">
                        <?php if (!empty($errors['courseNameEmpty'])){
                            echo Utility::error($errors["courseNameEmpty"]);
                        } ?>

                        <label>Course Credit</label>
                        <input type="number" name="courseCredit" readonly class="form-control" placeholder="Course Credit...">
                        <?php if (!empty($errors['courseCredit'])){
                            echo Utility::error($errors["courseCredit"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are sure? Please check your data again.')"
                            name="submit" class="btn
                    btn-info">Assign</button>
                    <button type="submit" name="refresh" class="btn btn-info">Refresh</button>
                </form>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#department').change(function () {
            var department_id = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{department_id:department_id},
                dataType:"text",
                success:function (data) {
                    $('#teacher').html(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#department').change(function () {
            var deptfor_crs = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{deptfor_crs:deptfor_crs},
                dataType:"text",
                success:function (data) {
                    $('#code').html(data);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#teacher').change(function () {
            var teacher_id = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{teacher_id:teacher_id},
                dataType:"text",
                success:function (data) {
                    $('#totalCredit').html(data);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {
        $('#code').change(function () {
            var course_id = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{course_id:course_id},
                dataType:"text",
                success:function (data) {
                    $('#course_detail').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>

