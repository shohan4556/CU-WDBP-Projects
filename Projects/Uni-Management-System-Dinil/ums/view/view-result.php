<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
use App\Utility\Utility;
use App\Session\Session;
use App\Student\Student;
use App\Result\Result;
$result = new Result();
?>
<?php
$errors = array();
$name = "";
$email = "";
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">View Student Result</h1>
            </div>
            <div class="box-body">
                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                    <?php
                    echo Session::SuccessMsg();
                    echo Session::ErrorMsg();
                    ?>
                    <div class="form-group">
                        <label for="">Student Reg. No.</label>
                        <select id="regNo" name="regNo" class="form-control selectpicker" data-show-subtext="true"
                                data-live-search="true">
                            <option value="">&larr; Select Registration No. &rarr;</option>
                            <?php
                            $id="";
                            foreach (Student::getAll_active_students() as $key => $value){ ?>
                                <option value="<?php echo $value["id"]; ?>"><?php echo $value["reg_no"]; ?></option>
                            <?php  } ?>
                        </select>
                        <?php if (!empty($errors['regNo'])){
                            echo Utility::error($errors["regNo"]);
                        } ?>
                        <div id="courseCode">
                        </div>

                    </div>
                    <div id="std_detail" class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="name" class="form-control" readonly placeholder="Student Name...">
                        <?php if (!empty($errors['nameEmpty'])){
                            echo Utility::error($errors["nameEmpty"]);
                        } ?>
                        <br>
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" readonly placeholder="Email...">
                        <?php if (!empty($errors['emailEmpty'])){
                            echo Utility::error($errors["emailEmpty"]);
                        } ?>
                        <br>
                        <label for="">Department</label>
                        <input type="text" name="department" class="form-control" readonly placeholder="Student Name...">
                        <?php if (!empty($errors['deptEmpty'])){
                            echo Utility::error($errors["deptEmpty"]);
                        } ?>
                    </div>
                    <div class="form-group">
                        <table id="table_info" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Name</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody id="results">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $('#date').datepicker({ dateFormat:'yy-mm-dd' });
</script>
<script>
    $(document).ready(function () {
        $('#regNo').change(function () {
            var result = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{result:result},
                dataType:"text",
                success:function (data) {
                    $('#std_detail').html(data);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#regNo').change(function () {
            var grade = $(this).val();
            $.ajax({
                url:"loader.php",
                method:"POST",
                data:{grade:grade},
                dataType:"text",
                success:function (data) {
                    $('#results').html(data);
                }
            });
        });
    });
</script>
<?php include "footer.php"?>

