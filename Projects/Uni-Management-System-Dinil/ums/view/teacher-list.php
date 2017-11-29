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
                        <li class="active" role="presentation"><a href="teacher-list.php">Active Teachers</a></li>
                        <li role="presentation"><a href="teacher-trash-list.php">Trash</a></li>
                    </ul>
                </div>
                <br>
                <div class="col-sm-offset-3 col-sm-5 col-sm-offset-3 text-center">
                    <label for="">Select Department</label>
                    <select name="depId" id="depId" class="form-control text-center">
                        <option value="">Show All Teachers</option>
                        <?php foreach (Department::getAllDepartment() as $value) { ?>
                            <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="table-responsive col-md-12">
                    <?php
                    if (isset($_GET["trash_id"])){
                        $trash_id = $_GET["trash_id"];
                        $teacher->moveTo_trash($trash_id);
                    }
                    ?>
                    <table class="table table-striped table-bordered">
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
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('#depId').change(function () {
            var dpt_teacher = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{dpt_teacher:dpt_teacher},
                success:function (data) {
                    $('.showTeachers').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>
