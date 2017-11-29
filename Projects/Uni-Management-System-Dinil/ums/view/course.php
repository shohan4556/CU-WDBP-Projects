<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Session\Session;
use App\Utility\Utility;
use App\Semester\Semester;
use App\Department\Department;
use App\Course\Course;
$department = new Department();
$semester = new Semester();
$course = new Course();
?>
<?php
$errors = array();
$code = "";
$name = "";
$credit = "";
$body = "";
?>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Save Course Information</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $code = $_POST["code"];
                $name = $_POST["name"];
                $credit = $_POST["credit"];
                $body = $_POST["body"];
                $length = strlen($_POST["code"]);
                if (isset($_POST["submit"])) {
                    if (empty($_POST["code"])) {
                        $errors['codeEmpty'] = "Course Code must not be empty!";
                    }
                    if ($length < 5) {
                        $errors['codeLength'] = "Course code must be at least 5 characters long!";
                    }
                    if (empty($_POST["name"])) {
                        $errors['nameEmpty'] = "Course Name must not be empty!";
                    }
                    if (!empty($_POST["code"])) {
                        $codeExistance = trim($_POST["code"]);

                        $codeQuery = "SELECT * FROM courses WHERE course_code = '$codeExistance' LIMIT 1";
                        $codeCheck = Database::Prepare($codeQuery);
                        $codeCheck->execute();
                        $codeFound = $codeCheck->fetch();
                        if ($codeFound != false) {
                            $errors['codeMatch'] = "This code already exist! Please input another Code.";
                        }
                    }
                    if (!empty($_POST["name"])) {
                        $nameExistance = trim($_POST["name"]);

                        $nameQuery = "SELECT * FROM courses WHERE course_name = '$nameExistance' LIMIT 1";
                        $nameCheck = Database::Prepare($nameQuery);
                        $nameCheck->execute();
                        $nameFound = $nameCheck->fetch();
                        if ($nameFound != false) {
                            $errors['nameMatch'] = "This Course Name Already Exist! Please Create New Department.";
                        }
                    }
                    if (!is_numeric($_POST["credit"])) {
                        $errors['creditEmpty'] = "Please insert course credit!";
                    }
                    if ($credit < 0.5 || $credit > 5.0){
                        $errors['creditLength'] = "Course credit cannot be less than 0.5 and more than 5.0!";
                    }
                    if (empty($_POST["body"])) {
                        $errors['bodyEmpty'] = "Course description must not be empty!";
                    }
                    if (!is_numeric($_POST["dept_id"])) {
                        $errors['deptEmpty'] = "Please select a department!";
                    }
                    if (!is_numeric($_POST["semi_id"])) {
                        $errors['semiEmpty'] = "Please Select a semester!";
                    }
                    if (empty($errors)){
                        $course->courseInsert($_POST);
                    }

                }
            }
            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = 'course.php'</script>";
            }
            ?>
            <div class="box-body">
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" name="code" class="form-control" value="<?php echo $code; ?>" placeholder="Course Code...">
                        <ul class="input-requirements">
                            <li>Course code must be at least 5 characters long.</li>
                        </ul>
                        <?php if (!empty($errors['codeEmpty'])){
                            echo Utility::error($errors["codeEmpty"]);
                        } ?>
                        <?php if (!empty($errors['codeLength'])){
                            echo Utility::error($errors["codeLength"]);
                        } ?>
                        <?php if (!empty($errors['codeMatch'])){
                            echo Utility::error($errors["codeMatch"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>Course Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Course Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                        <?php if (!empty($errors['nameMatch'])){
                            echo Utility::error($errors["nameMatch"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>Course Credit</label>
                        <input type="number" name="credit" class="form-control" value="<?php echo $credit; ?>" placeholder="Course Credit...">
                        <ul class="input-requirements">
                            <li>Course credit cannot be less than 0.5 and more than 5.0</li>
                        </ul>
                        <?php if (!empty($errors['creditEmpty'])){
                            echo Utility::error($errors["creditEmpty"]);
                        } ?>
                        <?php if (!empty($errors['creditLength'])){
                            echo Utility::error($errors["creditLength"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="body" class="form-control" rows="1"><?php echo $body; ?></textarea>
                        <?php if (!empty($errors['bodyEmpty'])){
                            echo Utility::error($errors["bodyEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Departments</label>
                        <select name="dept_id" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option>&larr; Select Department &rarr;</option>
                            <?php
                            foreach (Department::getAllDepartment() as $key => $value){
                                ?>
                                <option value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></option>
                            <?php  } ?>
                        </select>
                        <?php if (!empty($errors['deptEmpty'])){
                            echo Utility::error($errors["deptEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Semesters</label>
                        <select name="semi_id" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">
                            <option>&larr; Select Semester &rarr;</option>
                            <?php
                            foreach ($semester::getAllSemester() as $key => $value){
                                ?>
                                <option value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['semiEmpty'])){
                            echo Utility::error($errors["semiEmpty"]);
                        } ?>
                    </div>

                    <button type="submit" onclick="return confirm('Are you confirm? Please check your data again')"
                            name="submit" class="btn
                    btn-info">Save</button>
                    <button type="submit" name="refresh" class="btn btn-info">Refresh</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php"?>
