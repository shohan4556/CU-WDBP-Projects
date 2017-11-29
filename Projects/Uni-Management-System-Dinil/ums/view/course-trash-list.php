<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Session\Session;
use App\Department\Department;
use App\Course\Course;
use App\Semester\Semester;
$department = new Department();
$course = new Course();
$semester = new Semester();
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
                <h1 class="box-title">Course Statics</h1>
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
                        <li role="presentation"><a href="course-stat.php">Running Courses</a></li>
                        <li <?php if ($CurreentPage == 'course-trash-list'){echo 'class="active"';} ?>
                            role="presentation"><a href="course-trash-list.php">Trash</a></li>
                    </ul>
                </div>
                <br>
                <div class="table-responsive col-md-12">
                    <?php
                    if (isset($_GET["undo"])) {
                        $trashId = $_GET["undo"];
                        $course->undo_trash($trashId);
                    }
                    ?>
                    <table id="table_info" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Assigned to</th>
                            <th>Edit</th>
                            <th>Undo</th>
                        </tr>
                        </thead>
                        <tbody class="show_courses">
                        <?php echo $course->coursesTrashList(); ?>
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
