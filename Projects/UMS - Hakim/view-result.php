<?php require_once('header.php');

require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$studentid = $obj->viewStudent();
?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="index.php">Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <script type="text/javascript">
            $(document).ready(function () {
                $("#stu_id").change(function () {
                    var stu = $(this).val();
                    $.ajax
                    ({
                        url: 'action/view/ajaxdata.php',
                        type: 'POST',
                        data: {stu_reg: stu},
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);

                            var stu_name = response['stu_name'];
                            var stu_email = response['stu_email'];
                            var stu_dep_id = response['stu_department'];
                            var stu_reg_no = response['stu_reg_no'];
                            var stu_dep_name = response['dep_name'];

                            $("#stu_name").val(stu_name);
                            $("#stu_email").val(stu_email);
                            $("#stu_dep_id").val(stu_dep_id);
                            $("#stu_dep_name").val(stu_dep_name);


                            $.ajax
                            ({
                                url: 'action/view/ajaxdata.php',
                                type: 'POST',
                                data: {stu_reg_res: stu_reg_no},
                                dataType: 'json',
                                success: function (response) {
                                    console.log(response);
                                    var len = response.length;
                                    $("#result_info").empty();
                                    $("#emptyval").empty();

                                    $("#result_info").append("<tr><th>Course Code</th><th>Name</th><th>Semester</th><th>Grade</th></tr>");

                                    for (var i = 0; i < len; i++) {
                                        var id = response[i]['id'];
                                        var cor_code = response[i]['cor_code'];
                                        var cor_name = response[i]['cor_name'];
                                        var semester = response[i]['semester_name'];
                                        var grade = response[i]['grade'];

                                        $("#result_info").append("<tr><td> " + cor_code + " </td><td> " + cor_name + " </td><td>" + semester + " </td><td>" + grade + " </td></tr>");
                                    }
                                }
                            });

                        }
                    });
                });

            });
        </script>

    <div class="content save-teacher">
        <div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
            <form action="action/save/dash.php" method="post">

                <h2>View student result</h2>

                <label>Student ID</label>
                <select name="stu_reg_no" id="stu_id">
                    <option selected="selected">--Select Student ID--</option>

                    <?php foreach ($studentid as $student) { ?>
                        <option value="<?php echo $student['stu_reg_no']; ?>"><?php echo $student['stu_reg_no']; ?></option>
                    <?php } ?>
                </select><br>


                <label>Name</label>
                <input name="stu_name" class="center" id="stu_name" placeholder="<view>" readonly><br>

                <label>Email</label>
                <input name="stu_email" id="stu_email" class="center" placeholder="<view>" readonly><br>

                <label>Department</label>
                <input name="stu_dep_id" id="stu_dep_name" class="center" placeholder="<view>" readonly><br><br>





                    <table id="result_info">
                        <tr>
                            <th>Course Code</th>
                            <th>Name</th>
                            <th>Semester</th>
                            <th>Grade</th>
                        </tr>
                        <tr>
                            <td>CSE-221</td>
                            <td>Title</td>
                            <td>first</td>
                            <td>A+</td>
                        </tr>

                        <tr>
                            <td colspan="4">
                                All information will show here...
                            </td>
                        </tr>
                    </table>

                <input type="submit" name="save" value="Make PDF"><br>
            </form>

        </div>
    </div>
<?php require_once('footer.php');?>