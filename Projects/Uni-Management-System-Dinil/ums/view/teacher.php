<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Session\Session;
use App\Utility\Utility;
use App\Department\Department;
use App\Teacher\Teacher;
$teacher = new Teacher();
$department = new Department();
?>
<?php
$errors = array();
$name = "";
$address = "";
$email = "";
$contNo = "";
$credit = "";
$emailFound="";
$contNoFound ="";
?>

<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Save Teacher's Information</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $address = $_POST["address"];
                $email = $_POST["email"];
                $contNo = $_POST["contNo"];
                $contLength = strlen($contNo);
                $credit = $_POST["credit"];
                if (isset($_POST["submit"])) {
                    if (empty($_POST["name"])) {
                        $errors['nameEmpty'] = "Please insert a teacher's name!";
                    }
                    if (empty($_POST["address"])) {
                        $errors['addressEmpty'] = "Address field must not be empty!";
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

                        $emailQuery = "SELECT * FROM teachers WHERE email = '$emailExistence' LIMIT 1";
                        $emailCheck = Database::Prepare($emailQuery);
                        $emailCheck->execute();
                        $emailFound = $emailCheck->fetch();
                        if ($emailFound != false) {
                            $errors['emailMatch'] = "This email Already Exist!.";
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
                        $contactExistence = trim($_POST["contNo"]);

                        $contact = "SELECT * FROM teachers WHERE contact = '$contactExistence' LIMIT 1";
                        $contactCheck = Database::Prepare($contact);
                        $contactCheck->execute();
                        $contNoFound = $contactCheck->fetch();
                        if ($contNoFound != false) {
                            $errors['contNoMatch'] = "Contact No. Already Exist!.";
                        }
                    }
                    if (!is_numeric($_POST["desigId"])) {
                        $errors['desigEmpty'] = "Please Select teachers's designation!";
                    }
                    if (!is_numeric($_POST["dept_id"])) {
                        $errors['deptEmpty'] = "Please select a department!";
                    }
                    if (!is_numeric($_POST["credit"])) {
                        $errors['creditEmpty'] = "Please insert teacher's credit!";
                    }
                    if ($credit < 0){
                        $errors['creditLength'] = "Credit must be a non-negative value!";
                    }
                    if (empty($errors)){
                        $teacher->teacherInsert($_POST);
                    }

                }
            }
            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = 'teacher.php'</script>";
            }
            ?>
            <div class="box-body">
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label>Teacher Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"
                               placeholder="Teacher Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Address..." rows="2"><?php echo $address;
                        ?></textarea>
                        <?php if (!empty($errors['addressEmpty'])){
                            echo Utility::error($errors["addressEmpty"]);
                        } ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" value="<?php echo $email; ?>"  class="form-control"
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
                        <input name="contNo" type="tel" value="<?php echo $contNo; ?>"  class="form-control"
                               placeholder="Contact No...">
                        <?php if (!empty($errors['contactEmpty'])){
                            echo Utility::error($errors["contactEmpty"]);
                        } ?>
                        <?php if (!empty($errors['contactLength'])){
                            echo Utility::error($errors["contactLength"]);
                        } ?>
                        <?php if (!empty($errors['contNoMatch'])){
                            echo Utility::error($errors["contNoMatch"]);
                        } ?>
                    </div>

                    <div class="form-group">
                        <label for="">Designation</label>
                        <select name="desigId" class="form-control">
                            <option>&larr; Select Designation &rarr;</option>
                            <?php
                            foreach (Teacher::getDesignations() as $key => $value){
                                ?>
                                <option value="<?php echo $value["did"]; ?>"><?php echo $value["title"]; ?></option>
                            <?php  } ?>
                        </select>
                        <?php if (!empty($errors['desigEmpty'])){
                            echo Utility::error($errors["desigEmpty"]);
                        } ?>
                    </div>                
                    <div class="form-group">
                        <label for="">Department</label>
                        <select name="dept_id" class="form-control">
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
                        <label>Credit to be taken</label>
                        <input type="number" name="credit" value="<?php echo $credit; ?>"  class="form-control"
                               placeholder="...">
                        <ul class="input-requirements">
                            <li>Credit must be a non-negative value.</li>
                        </ul>
                        <?php if (!empty($errors['creditEmpty'])){
                            echo Utility::error($errors["creditEmpty"]);
                        } ?>
                        <?php if (!empty($errors['creditLength'])){
                            echo Utility::error($errors["creditLength"]);
                        } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info"><b>Save</button>
                    <button type="submit" name="refresh" class="btn btn-info">Refresh</button>
                </form>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php"?>

