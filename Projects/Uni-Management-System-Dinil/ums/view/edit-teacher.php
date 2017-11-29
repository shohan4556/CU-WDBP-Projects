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
$contNo = "";
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
                $contNo = $_POST["contNo"];
                $contLength = strlen($contNo);
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
                        $id = $_GET["edit_id"];

                        $emailQuery = "SELECT email FROM teachers WHERE id <> '$id'";
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
                        $contactExistence = trim($_POST["contNo"]);
                        $id = $_GET["edit_id"];

                        $contact = "SELECT contact FROM teachers WHERE id <> '$id'";
                        $contactCheck = Database::Prepare($contact);
                        $contactCheck->execute();
                        $contNoFound = $contactCheck->fetchAll();

                        foreach ($contNoFound as $cont){
                            if ($cont["contact"] == $contactExistence) {
                                $errors['contNoMatch'] = "Contact No. Already Exist!.";
                            }
                        }

                    }
                    if (!is_numeric($_POST["desigId"])) {
                        $errors['desigEmpty'] = "Please Select teachers's designation!";
                    }
                    if (!is_numeric($_POST["dept_id"])) {
                        $errors['deptEmpty'] = "Please select a department!";
                    }
                    if (empty($errors)){
                        $id = $_GET["edit_id"];
                        $teacher->teacherUpdate($_POST, $id);
                    }

                }
            }
            ?>
            <?Php
            if (isset($_POST["back"])){
                echo "<script>window.location = 'teacher-list.php'</script>";
            }
            ?>
            <div class="box-body">
                <?php
                if (!isset($_GET["edit_id"])){
                    header("Location: teacher-list.php");
                }
                else{
                $id = $_GET["edit_id"];
                $data = $teacher->getTeacherInfo_byId($id);
                ?>
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label>Teacher Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>"
                               placeholder="Teacher Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" class="form-control" placeholder="Address..." rows="2"><?php echo
                            $data['address'];
                            ?></textarea>
                        <?php if (!empty($errors['addressEmpty'])){
                            echo Utility::error($errors["addressEmpty"]);
                        } ?>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="email" value="<?php echo $data['email']; ?>"  class="form-control"
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
                        <input name="contNo" type="tel" value="<?php echo $data['contact']; ?>"  class="form-control"
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
                                <option
                                    <?php
                                    if ($data['did'] == $value['did']){
                                        echo "selected='selected'";
                                    } ?>
                                        value="<?php echo $value["did"]; ?>"><?php echo $value["title"]; ?></option>
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
                                <option
                                    <?php
                                    if ($data['id'] == $value['id']){
                                        echo "selected='selected'";
                                    } ?>
                                        value="<?php echo $value["id"]; ?>"><?php echo $value["title"]; ?></option>
                            <?php  } ?>
                        </select>
                        <?php if (!empty($errors['deptEmpty'])){
                            echo Utility::error($errors["deptEmpty"]);
                        } ?>
                    </div>
                    <button type="submit" onclick="return confirm('Are you confirm? Please check your data again')"
                            name="submit" class="btn btn-info"><b>Update</button>
                    <button type="submit" name="back" class="btn btn-info">Back</button>
                </form>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php"?>

