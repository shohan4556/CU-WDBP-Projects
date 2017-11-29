<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Session\Session;
use App\Department\Department;
use App\Student\Student;
$department = new Department();
$student = new Student();
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
                <h1 class="box-title">Students Trash List</h1>
            </div>
            <div class="col-sm-offset-5">
                <?php
                echo Session::SuccessMsg();
                echo Session::ErrorMsg();
                ?>
            </div>
            <div>
                <ul class="nav nav-tabs">
                    <?php
                    $path = $_SERVER["SCRIPT_FILENAME"];
                    $CurreentPage = basename($path, '.php');
                    ?>
                    <li role="presentation"><a href="student-list.php">Active Students</a></li>
                    <li <?php if ($CurreentPage == "students-trash-list"){ echo "class='active'"; } ?>
                            role="presentation"><a href="students-trash-list.php">Trash</a></li>
                </ul>
            </div>
            <br>
            <div class="box-body">
                <div class="table-responsive col-md-12">
                    <?php
                    if (isset($_GET["trashId"])) {
                        $trashId = $_GET["trashId"];
                        $student->moveTo_active($trashId);
                    }
                    ?>
                    <table id="tableId" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Reg. No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Reg. Date</th>
                            <th>Department</th>
                            <th>View</th>
                            <th>Undo</th>
                        </tr>
                        </thead>
                        <tbody class="showStudents">
                        <?php echo $student->getAll_inactive_Student(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('#tableId').DataTable();
    });
</script>
<?php include "footer.php"?>
