<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Session\Session;
use App\Department\Department;
use App\Teacher\Teacher;
$teacher = new Teacher();
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
                <h1 class="box-title">Teachers List</h1>
            </div>

            <div class="box-body">
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
                        <li role="presentation"><a href="teacher-list.php">Active Teachers</a></li>
                        <li
                            <?php if ($CurreentPage = 'teacher-trash-list'){ echo "class='active'"; } ?>

                            role="presentation"><a href="teacher-trash-list.php">Trash</a></li>
                    </ul>
                </div>
                <br>
                <div class="table-responsive col-md-12">
                    <?php
                    if (isset($_GET["undo_id"])){
                        $undo_id = $_GET["undo_id"];
                        $teacher->undo_trash($undo_id);
                    }
                    ?>
                    <table id="table_info" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Contact No.</th>
                            <th>Designation</th>
                            <th>Department</th>
                            <th>Total Credit</th>
                            <th>Remaining</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Trash</th>
                        </tr>
                        </thead>
                        <tbody class="showTeachers">
                        <?php echo Teacher::getTrashTeacher_info(); ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function(){
        $('#table_info').DataTable();
    });
</script>
<?php include "footer.php"?>
