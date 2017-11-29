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
                <h1 class="box-title">Update Student Result</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST["submit"])) {
                    $id = $_GET["editGrade"];

                    if (empty($_POST["grade"])){
                        $errors['gradeEmpty'] = "Please select a grade letter.";
                    }
                    if (!empty($_POST["grade"])) {

                        $grade = "SELECT grade FROM results WHERE id = '$id'";
                        $gradeCheck = Database::Prepare($grade);
                        $gradeCheck->execute();
                        $gradeFound = $gradeCheck->fetch();
                        if ($gradeFound["grade"] == $_POST["grade"] ) {
                            $errors['gradeMatch'] = "You inserted same grade again!";
                        }
                    }
                    if (empty($errors)){
                        $id = $_GET["editGrade"];
                        $result->updateResult($_POST, $id);
                    }
                }
            }
            ?>
            <?Php
            if (isset($_POST["back"])){
                echo "<script>window.location = 'view-result.php'</script>";
            }
            ?>
            <div class="box-body">
                <?php
                if (!isset($_GET["editGrade"])){
                    header("Location: course-stat.php");
                }
                else{
                $id = $_GET["editGrade"];
                $data = $result->getResultById($id);
                ?>
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label for="">Student Reg. No.</label>
                        <input type="text" name="department" class="form-control" readonly value="<?php echo
                        $data['reg_no']; ?>">
                    </div>
                    <div id="std_detail" class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="name" class="form-control" readonly value="<?php echo
                        $data['title']; ?>">
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" readonly value="<?php echo
                        $data['email']; ?>">
                        <br>
                        <label for="">Department</label>
                        <input type="text" name="department" class="form-control" readonly value="<?php echo
                        $data['code']; ?>">
                        <br>
                        <label for="">Course</label>
                        <input type="text" name="department" class="form-control" readonly value="<?php echo
                        $data['course_name']; ?>">

                    </div>
                    <div class="form-group">
                        <label for="">Select Grade Letter</label>
                        <select name="grade" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option value="">&larr; Select Grade &rarr;</option>
                            <?php foreach (Result::getAll_grades() as $grade){ ?>
                                <option
                                    <?php
                                    if ($data['grade'] == $grade['id']){
                                        echo "selected='selected'";
                                    } ?>
                                    value="<?php echo $grade['id']; ?>"><?php echo $grade['grade']; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['gradeEmpty'])){
                            echo Utility::error($errors["gradeEmpty"]);
                        } ?>
                        <?php if (!empty($errors['gradeMatch'])){
                            echo Utility::error($errors["gradeMatch"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure?')" name="submit" class="btn
                    btn-info">Save</button>
                    <button type="submit" name="back" class="btn btn-info">Back</button>
                </form>
                <?php } ?>
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

