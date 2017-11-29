<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Session\Session;
use App\Department\Department;
use App\Course\Course;
use App\Semester\Semester;
use App\EnrollCourse\EnrollCourse;
use App\Database\Database;
$department = new Department();
$course = new Course();
$semester = new Semester();
$enrollCourse = new EnrollCourse();
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
                <h1 class="box-title">Enrolled Course List</h1>
            </div>

            <div class="box-body">
                <div class="col-sm-offset-5">
                </div>
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
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Reg. No.</th>
                            <th>Name</th>
                            <th>Course Name</th>
                            <th>Department</th>
                            <th>Date</th>
                            <th>Edit</th>
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
            var enrollId = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{enrollId:enrollId},
                success:function (data) {
                    $('.show_courses').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>
