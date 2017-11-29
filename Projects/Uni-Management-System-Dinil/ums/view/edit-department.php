<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Session\Session;
use App\Utility\Utility;
use App\Department\Department;
$department = new Department();
?>
<?php
$errors = array();
$code = "";
$name = "";
?>


<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Save Department</h1>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $code = $_POST["code"];
                $name = $_POST["name"];
                $length = strlen($_POST["code"]);
                if (isset($_POST["submit"])) {
                    if (empty($_POST["code"])) {
                        $errors['codeEmpty'] = "Department Code must not be empty!";
                    }
                    if ($length < 2 || $length > 7) {
                        $errors['codeLength'] = "Department code must be two (2) to seven (7) characters long!";
                    }
                    if (empty($_POST["name"])) {
                        $errors['nameEmpty'] = "Department Name must not be empty!";
                    }
                    if (!empty($_POST["code"])) {
                        $Existence = trim($_POST["code"]);
                        $editId = $_GET["editId"];

                        $Query = "SELECT code FROM departments WHERE id <> '$editId'";
                        $Check = Database::Prepare($Query);
                        $Check->execute();
                        $Found = $Check->fetchAll();
                        foreach ($Found as $code){
                            if ($code["code"] == $Existence) {
                                $errors['codeMatch'] = "This department Code Already Exist!.";
                            }
                        }
                    }
                    if (!empty($_POST["name"])) {
                        $Existence = trim($_POST["name"]);
                        $editId = $_GET["editId"];

                        $Query = "SELECT title FROM departments WHERE id <> '$editId'";
                        $Check = Database::Prepare($Query);
                        $Check->execute();
                        $Found = $Check->fetchAll();
                        foreach ($Found as $name){
                            if ($name["title"] == $Existence) {
                                $errors['nameMatch'] = "This department name Already Exist!.";
                            }
                        }
                    }
                    if (empty($errors)){
                        $editId = $_GET["editId"];
                        $department->departmentUpdate($_POST, $editId);
                    }

                }
            }
            ?>
            <div class="box-body">
                <?php
                if (!isset($_GET["editId"])){
                    header("Location: view_department.php");
                }
                else {
                    $editId = $_GET["editId"];
                    $value = Department::getDepartment_by_id($editId);
                }
                ?>
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Utility::errorMsz($errors);
                    ?>
                    <div class="form-group">
                        <label>Department Code</label>
                        <input type="text" name="code" class="form-control" value="<?php echo $value['code']; ?>">
                        <ul class="input-requirements">
                            <li>Department code must be two (2) to seven (7) characters long.</li>
                        </ul>
                    </div>
                    <div class="form-group">
                        <label>Department Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $value['title']; ?>">
                    </div>
                    <button type="submit" name="submit" class="btn btn-info">Save</button>
                </form>
            </div>

        </div>
    </section>
</div>
<?php include "footer.php"?>
