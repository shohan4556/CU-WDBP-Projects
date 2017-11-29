<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Utility\Utility;
use App\Session\Session;
use App\Student\Student;
use App\EnrollCourse\EnrollCourse;
use App\Course\Course;
$student = new Student();
$enroll = new EnrollCourse();
$course = new Course();
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
                <h1 class="box-title">Update Enrolled Course</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];

                if (isset($_POST["submit"])) {
                    if (!is_numeric($_POST["courseId"])){
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
                        $id = $_GET["edit_id"];
                        $enroll->Update_enrolledCourse($_POST, $id);
                    }
                }
            }
            ?>
            <div class="box-body">
                <?php
                if (!isset($_GET["edit_id"])){
                    header("Location: enroll-course-list.php");
                }
                else{
                $id = $_GET["edit_id"];
                $data = $enroll->enrolledCourseBy_id($id);

                ?>
                    <?Php
                    if (isset($_POST["back"])){
                        echo "<script>window.location = 'enroll-course-list.php'</script>";
                    }
                    ?>
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label for="">Student Reg. No.</label>
                        <input type="text"  class="form-control" readonly value="<?php echo $data['reg_no'];  ?>">

                        <?php $stdId = $student->getStudentByReg($data["reg_no"]) ?>
                        <input type="hidden" name="regNo"  class="form-control" readonly value="<?php echo $stdId['id'];
                        ?>">

                    </div>
                    <div id="std_detail" class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="name" class="form-control" readonly value="<?php echo $data['title'];  ?>">
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" readonly value="<?php echo $data['email'];  ?>">
                        <br>
                        <label for="">Department</label>
                        <input type="text" name="department" class="form-control" readonly value="<?php echo $data['code'];  ?>">
                        <br>
                        <label for="">Courses</label>
                        <select id="courseId" name="courseId" class="form-control selectpicker"
                                data-show-subtext="true" data-live-search="true">
                            <option value="">&larr; Select Course &rarr;</option>
                            <?php
                            $id = $data["id"];
                            $sql = "SELECT * FROM courses WHERE dept_id ='$id'";
                            $stmt = Database::Prepare($sql);
                            $stmt->execute();
                            $courseBydpt =  $stmt->fetchAll();
                            foreach ($courseBydpt as $courseName){ ?>
                            <option
                                <?php
                                if ($data['course_id'] == $courseName['id']){
                                    echo "selected='selected'";
                                } ?>
                                    value="<?php echo $courseName['id'];  ?>"><?php echo $courseName['course_name'];
                            ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['courseEmpty'])){
                            echo Utility::error($errors["courseEmpty"]);
                        } ?><?php if (!empty($errors['courseMatch'])){
                            echo Utility::error($errors["courseMatch"]);
                        } ?>

                    </div>
                    <div class="form-group">
                        <label>Date</label>
                        <input type="text" name="date" id="date" value="<?php echo $data['date']; ?>"
                               class="form-control">
                        <?php if (!empty($errors['dateEmpty'])){
                            echo Utility::error($errors["dateEmpty"]);
                        } ?>
                        <?php if (!empty($errors['dateFormat'])){
                            echo Utility::error($errors["dateFormat"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure?')" name="submit" class="btn btn-info">Update</button>
                    <button name="back" class="btn btn-info">Back</button>
                </form>
                <?php } ?>
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

