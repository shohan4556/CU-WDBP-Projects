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
                        <li class="active" role="presentation"><a href="course-stat.php">Active Courses</a></li>
                        <li role="presentation"><a href="course-trash-list.php">Trash</a></li>
                    </ul>
                </div>
                <br>
                <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4 text-center">
                    <label for="">Select Department</label>
                    <select name="semesters" id="semesters" class="form-control text-center">
                        <option value="">Show All Courses</option>
                        <?php foreach (Department::getAllDepartment() as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="table-responsive col-md-12">
                    <br>
                    <?php
                    if (isset($_GET["trash"])) {
                        $trashId = $_GET["trash"];
                        $course->moveTo_trash($trashId);
                    }
                    ?>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Assigned to</th>
                            <th>Edit</th>
                            <th>Trash</th>
                        </tr>
                        </thead>
                        <tbody class="show_courses">
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#semesters').change(function () {
            var semester_id = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{semester_id:semester_id},
                success:function (data) {
                    $('.show_courses').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>
