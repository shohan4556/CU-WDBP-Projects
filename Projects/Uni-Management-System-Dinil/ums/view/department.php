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
                        $codeExistance = trim($_POST["code"]);

                        $codeQuery = "SELECT * FROM departments WHERE code = '$codeExistance' LIMIT 1";
                        $codeCheck = Database::Prepare($codeQuery);
                        $codeCheck->execute();
                        $codeFound = $codeCheck->fetch();
                        if ($codeFound != false) {
                            $errors['codeMatch'] = "This Code Already Exist! Please input another Code.";
                        }
                    }
                    if (!empty($_POST["name"])) {
                        $nameExistance = trim($_POST["name"]);

                        $nameQuery = "SELECT * FROM departments WHERE title = '$nameExistance' LIMIT 1";
                        $nameCheck = Database::Prepare($nameQuery);
                        $nameCheck->execute();
                        $nameFound = $nameCheck->fetch();
                        if ($nameFound != false) {
                            $errors['nameMatch'] = "This Department Name Already Exist! Please Create New Department.";
                        }
                    }
                    if (empty($errors)){
                        $department->departmentInsert($_POST);
                    }

                }
            }
            ?>
            <?Php
            if (isset($_POST["refresh"])){
                echo "<script>window.location = 'department.php'</script>";
            }
            ?>
            <div class="box-body">
                <form action="" method="post" class="form-horizental col-sm-offset-4 col-sm-4 col-sm-offset-4">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>

                    <div class="form-group">
                        <label>Department Code</label>
                        <input type="text" name="code" class="form-control" value="<?php echo $code; ?>"
                               placeholder="Code.....">
                        <ul class="input-requirements">
                            <li>Department code must be two (2) to seven (7) characters long.</li>
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
                        <label>Department Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"
                               placeholder="Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                        <?php if (!empty($errors['nameMatch'])){
                            echo Utility::error($errors["nameMatch"]);
                        } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-info">Save</button>
                    <button type="submit" name="refresh" class="btn btn-info">Refresh</button>
                </form>
            </div>

        </div>
    </section>
</div>
<?php include "footer.php"?>
