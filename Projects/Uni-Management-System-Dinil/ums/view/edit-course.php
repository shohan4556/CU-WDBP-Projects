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
                        $Existence = trim($_POST["code"]);
                        $id = $_GET["edit_id"];

                        $Query = "SELECT course_code FROM courses WHERE id <> '$id'";
                        $Check = Database::Prepare($Query);
                        $Check->execute();
                        $Found = $Check->fetchAll();
                        foreach ($Found as $code){
                            if ($code["course_code"] == $Existence) {
                                $errors['codeMatch'] = "This course Code Already Exist!.";
                            }
                        }
                    }
                    if (!empty($_POST["name"])) {
                        $Existence = trim($_POST["name"]);
                        $id = $_GET["edit_id"];

                        $Query = "SELECT course_name FROM courses WHERE id <> '$id'";
                        $Check = Database::Prepare($Query);
                        $Check->execute();
                        $Found = $Check->fetchAll();
                        foreach ($Found as $name){
                            if ($name["course_name"] == $Existence) {
                                $errors['nameMatch'] = "This course name Already Exist!.";
                            }
                        }
                    }
                    if (empty($_POST["body"])) {
                        $errors['bodyEmpty'] = "Course description must not be empty!";
                    }
                    if (!is_numeric($_POST["semi_id"])) {
                        $errors['semiEmpty'] = "Please Select a semester!";
                    }
                    if (empty($errors)){
                        $id = $_GET["edit_id"];
                        $course->courseUpdate($_POST,$id);
                    }

                }
            }
            ?>
            <div class="box-body">
                <?php
                if (!isset($_GET["edit_id"])){
                    header("Location: course-stat.php");
                }
                else{
                $id = $_GET["edit_id"];
                $data = $course->getCoursesByid($id);

                ?>
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" name="code" class="form-control" value="<?php echo $data['course_code']; ?>">
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
                        <input type="text" name="name" class="form-control" value="<?php echo $data['course_name']; ?>" placeholder="Course Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                        <?php if (!empty($errors['nameMatch'])){
                            echo Utility::error($errors["nameMatch"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="body" class="form-control" rows="1"><?php echo $data['body']; ?></textarea>
                        <?php if (!empty($errors['bodyEmpty'])){
                            echo Utility::error($errors["bodyEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label for="">Semesters</label>
                        <select name="semi_id" class="form-control">
                            <option>&larr; Select Semester &rarr;</option>
                            <?php
                            foreach ($semester::getAllSemester() as $key => $value){
                                ?>
                                <option
                                    <?php
                                    if ($data['semi_id'] == $value['id']){
                                        echo "selected='selected'";
                                    } ?>
                                    value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></option>
                            <?php } ?>
                        </select>
                        <?php if (!empty($errors['semiEmpty'])){
                            echo Utility::error($errors["semiEmpty"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you confirm? Please check your data again')"
                            name="submit" class="btn
                    btn-info">Save</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php"?>
