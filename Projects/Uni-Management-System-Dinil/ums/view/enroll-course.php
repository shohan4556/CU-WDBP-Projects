<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Utility\Utility;
use App\Session\Session;
use App\Student\Student;
use App\EnrollCourse\EnrollCourse;
$student = new Student();
$enroll = new EnrollCourse();
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
                <h1 class="box-title">Enroll In a Course</h1>
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

                        $Query = "SELECT * FROM entrol_course WHERE reg_no = '$regNo'";
                        $Check = Database::Prepare($Query);
                        $Check->execute();
                        $Found = $Check->fetchAll();
                        foreach ($Found as $course){
                            if ($course["reg_no"] == $regNo && $course["course_id"] ==$_POST["courseId"]) {
                                $errors['courseMatch'] = "This course already taken!";
                            }
                        }
                    }
                    if (empty($_POST["date"])){
                        $errors['dateEmpty'] = "Please select date.";
                    }
                    if (!empty($_POST["date"])) {
                        $date = $_POST["date"];
                        $date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
                        if (!preg_match($date_regex, $date)) {
                            $errors['dateFormat'] = "Your date entry does not match the YYYY-MM-DD required format ";
                        }
                    }
                    if (empty($errors)){
                        $enroll->enrollCourse($_POST);
                    }
                }
            }
            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = 'enroll-course.php'</script>";
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
                        <select id="courseId" name="courseId" class="form-control selectpicker"
                                data-show-subtext="true" data-live-search="true">
                            <option value="">&larr; Select Course &rarr;</option>
                        </select>
                        <?php if (!empty($errors['courseEmpty'])){
                            echo Utility::error($errors["courseEmpty"]);
                        } ?><?php if (!empty($errors['courseMatch'])){
                            echo Utility::error($errors["courseMatch"]);
                        } ?>
                        <div id="courseCode">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="date" id="date" value="<?php echo date('Y-m-d'); ?>"
                               class="form-control">
                        <?php if (!empty($errors['dateEmpty'])){
                            echo Utility::error($errors["dateEmpty"]);
                        } ?>
                        <?php if (!empty($errors['dateFormat'])){
                            echo Utility::error($errors["dateFormat"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure?')" name="submit" class="btn
                    btn-info">Enroll</button>
                    <button type="submit" name="refresh" class="btn btn-info">Refresh</button>
                </form>
            </div>
        </div>
    </section>
</div>
<!--<script src="plugins/jquery-ui/jquery-ui.js"></script> -->
<script>
    $('#date').datepicker({ dateFormat:'yy-mm-dd' });
</script>
<script>
    $(document).ready(function () {
        $('#regNo').change(function () {
            var stdId = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{stdId:stdId},
                dataType:"text",
                success:function (data) {
                    $('#std_detail').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>

