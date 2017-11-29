<?php require_once('header.php');

require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$department = $obj->viewDepartment();

?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Courses
                </h4>
            </div>
        </div>

        <div class="breadcrumb-line bg-teal">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="save-course.php">Save Course</a></li>
                <li class="active">Course Statistics</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">


    <script type="text/javascript">

        $(document).ready(function () {
            $("#dep_id").change(function () {
                var dep_id = $(this).val();
                $.ajax
                ({
                    url: 'action/view/ajaxdata.php',
                    type: 'POST',
                    data: {corid: dep_id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        var len = response.length;
                        $("#course_info").empty();
                        $("#emptyval").empty();

                        $("#course_info").append("<tr> <th>Code</th> <th>Name/Title</th> <th>Semester</th> <th>Assigned To</th> <th>Action</th> </tr>");

                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var cor_code = response[i]['course_code'];
                            var cor_name = response[i]['cor_name'];
                            var cor_semester = response[i]['semester_name'];
                            var assigned_to = response[i]['tea_name'];

                            $("#course_info").append("<tr><td> " + cor_code + " </td><td> " + cor_name + " </td><td> " + cor_semester + " </td><td> " + assigned_to + " </td> <td><a href='edit-course.php?id= "+ id +" '>Update</a> - <a href='action/delete/course.php?id="+ id +"'>Delete</a> </td></tr>");
                        }
                    }
                });
            });
        });

    </script>

    <div class="content course-statics">
        <div class="form-outer table-responsive">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
            <form>
                <h2>View Course Statics</h2>
                <label>Department</label>
                <select id="dep_id">
                    <option>--Select Department--</option>
                    <?php foreach ($department as $dep) { ?>
                        <option value="<?php echo $dep['id']; ?>"> <?php echo $dep['dep_name']; ?></option>
                    <?php } ?>
                </select><br>

                <h3>Course Information</h3>
                <table id="course_info">

                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Semester</th>
                        <th>Assigned To</th>
                        <th>Action</th>
                    </tr>

                    <tr>
                        <td colspan="5">
                            All information will show here...
                        </td>
                    </tr>

                </table>
            </form>
        </div>

    </div>

<?php require_once('footer.php'); ?>