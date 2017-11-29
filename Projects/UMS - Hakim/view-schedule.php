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

	<div class="content view-schedule">

        <script type="text/javascript">

            $(document).ready(function () {
                $("#dep_id").change(function () {
                    var dep_id = $(this).val();
                    $.ajax
                    ({
                        url: 'action/view/ajaxdata.php',
                        type: 'POST',
                        data: {schedule_id: dep_id},
                        dataType: 'json',
                        success: function (response) {
                            console.log(response);
                            var len = response.length;
                            $("#course_info").empty();
                            $("#emptyval").empty();

                            $("#course_info").append("<tr> <th>Code</th> <th>Name</th> <th>Schedule Info</th> </tr>");

                            for (var i = 0; i < len; i++) {
                                var id = response[i]['id'];
                                var cor_code = response[i]['cor_code'];
                                var cor_name = response[i]['cor_name'];
                                var allocate = response[i]['room_no'];
                                var tfrom = response[i]['time_from'];
                                var tto = response[i]['time_to'];
                                var day = response[i]['day_name'];

                                $("#course_info").append("<tr><td> " + cor_code + " </td><td> " + cor_name + " </td><td> <b>R.No: " + allocate + "</b> , <b>" + day + "</b>, " + tfrom + " - " + tto + " </td></tr>");
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
                    <h2>View Schedule and Allocate Information</h2>
                    <label>Department</label>
                    <select id="dep_id">
                        <option>--Select Department--</option>
                        <?php foreach ($department as $dep) { ?>
                            <option value="<?php echo $dep['id']; ?>"> <?php echo $dep['dep_name']; ?></option>
                        <?php } ?>
                    </select><br>

                    <h3>Allocate Information</h3>
                    <table id="course_info">

                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Schedule Info</th>
                        </tr>

                        <tr>
                            <td colspan="3">
                                All information will show here...
                            </td>
                        </tr>

                    </table>
                </form>
            </div>

        </div>
	
	</div>

<?php require_once('footer.php'); ?>