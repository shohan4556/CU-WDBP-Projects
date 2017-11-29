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
                <h1 class="box-title">View Class Schedule and Room Allocation Information</h1>
            </div>

            <div class="box-body">
                <div class="col-sm-offset-5">
                </div>
                <div class="col-sm-offset-4 col-sm-4 col-sm-offset-4 text-center">
                    <label for="">Select Department</label>
                    <select name="" id="deptId" class="form-control text-center">
                        <option value="">Show All Schedule</option>
                        <?php foreach (Department::getAllDepartment() as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="table-responsive col-sm-offset-1 col-sm-10 col-sm-offset-1">
                    <br>
                    <table id="table_info" class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th width="15%">Course Code</th>
                            <th width="35%">Name</th>
                            <th width="50%">Schedule Info</th>

                        </tr>
                        </thead>
                        <tbody class="showSchedule">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#deptId').change(function () {
            var scheduleId = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{scheduleId:scheduleId},
                success:function (data) {
                    $('.showSchedule').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>
