<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Department\Department;
use App\Utility\Utility;
use App\Session\Session;
use App\Student\Student;
$department = new Department();
$student = new Student();
?>
<?php
$errors = array();
$name = "";
$address = "";
$email = "";
$contNo = "";
$address = "";
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Register Student</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $contNo = $_POST["contNo"];
                $address = $_POST["address"];
                $contLength = strlen($contNo);
                if (isset($_POST["submit"])) {
                    if (empty($_POST["name"])) {
                        $errors['nameEmpty'] = "Please insert a Student's name!";
                    }
                    if (empty($_POST["email"])) {
                        $errors['emailEmpty'] = "Email must not be empty!";
                    }
                    if (!empty($_POST["email"])){
                        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                            $errors['emailValid'] = "Invalid email address!";
                        }
                    }
                    if (!empty($_POST["email"])) {
                        $emailExistence = trim($_POST["email"]);
                        $id = $_GET["editId"];

                        $emailQuery = "SELECT * FROM students WHERE id <> '$id'";
                        $emailCheck = Database::Prepare($emailQuery);
                        $emailCheck->execute();
                        $emailFound = $emailCheck->fetchAll();
                        foreach ($emailFound as $email){
                            if ($email["email"] == $emailExistence) {
                                $errors['emailMatch'] = "This email Already Exist!.";
                            }
                        }
                    }
                    if (empty($_POST["contNo"])) {
                        $errors['contactEmpty'] = "Please insert a contact No!";
                    }
                    if (!empty($_POST["contNo"])) {
                        if ($contLength > 11){
                            $errors['contactLength'] = "contact No. should be 11 digit length!";
                        }
                    }
                    if (!empty($_POST["contNo"])) {
                        $Existence = trim($_POST["contNo"]);
                        $id = $_GET["editId"];

                        $Query = "SELECT contact FROM students WHERE id <> '$id'";
                        $Check = Database::Prepare($Query);
                        $Check->execute();
                        $Found = $Check->fetchAll();
                        foreach ($Found as $contact){
                            if ($contact["contact"] == $Existence) {
                                $errors['contactMatch'] = "This contact Already Exist!.";
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
                    if (empty($_POST["address"])) {
                        $errors['addressEmpty'] = "Address field must not be empty!";
                    }
                    if (!is_numeric($_POST["dept_id"])) {
                        $errors['deptEmpty'] = "Please select a department!";
                    }
                    if (empty($errors)){
                        $id = $_GET["editId"];
                        $student->studentUpdate($_POST,$id);
                    }
                }
            }
            ?>
            <?Php
            if (isset($_POST["back"])){
                echo "<script>window.location = 'student-list.php'</script>";
            }
            ?>
            <div class="box-body">
                <?php
                if (!isset($_GET["editId"])){
                    header("Location: student-list.php");
                }
                else{
                $id = $_GET["editId"];
                $data = $student->getStudentsById($id);
                ?>
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $data['title']; ?>"
                               placeholder="Student Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>"
                               placeholder="Email...">
                        <?php if (!empty($errors['emailEmpty'])){
                            echo Utility::error($errors["emailEmpty"]);
                        } ?>
                        <?php if (!empty($errors['emailValid'])){
                            echo Utility::error($errors["emailValid"]);
                        } ?>
                        <?php if (!empty($errors['emailMatch'])){
                            echo Utility::error($errors["emailMatch"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <label>Contact No</label>
                        <input type="tel" name="contNo" class="form-control" value="<?php echo $data['contact']; ?>"
                               placeholder="Contact No...">
                        <?php if (!empty($errors['contactEmpty'])){
                            echo Utility::error($errors["contactEmpty"]);
                        } ?>
                        <?php if (!empty($errors['contactLength'])){
                            echo Utility::error($errors["contactLength"]);
                        } ?>
                        <?php if (!empty($errors['contactMatch'])){
                            echo Utility::error($errors["contactMatch"]);
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
                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control"><?php echo $data['address']; ?></textarea>
                        <?php if (!empty($errors['addressEmpty'])){
                            echo Utility::error($errors["addressEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <label for="">Department</label>
                        <select id="dept_id" name="dept_id" class="form-control">
                            <option value="">&larr; Select Department &rarr;</option>
                            <?php
                            $id="";
                            foreach (Department::getAllDepartment() as $key => $value){ ?>
                                <option
                                <?php
                                if ($data['dept_id'] == $value['id']){
                                    echo "selected='selected'";
                                } ?>
                                        value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></option>
                            <?php  } ?>
                        </select>
                        <?php if (!empty($errors['deptEmpty'])){
                            echo Utility::error($errors["deptEmpty"]);
                        } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info">Update</button>
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
<?php include "footer.php"?>

