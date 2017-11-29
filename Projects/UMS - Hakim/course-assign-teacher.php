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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Teacher
                </h4>
            </div>
        </div>

        <div class="breadcrumb-line bg-teal">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="save-teacher.php">Save Teacher</a></li>
                <li class="active">Course Assign Teacher</li>
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
                    data: {dep_id: dep_id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        var len = response.length;
                        $("#teacher").empty();
                        $("#teacher").append("<option value=''> " + 'Select Teacher' + " </option>");

                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var tea_name = response[i]['tea_name'];

                            $("#teacher").append("<option value='" + id + "'> " + tea_name + " </option>");
                        }
                    }
                });

                $.ajax
                ({
                    url: 'action/view/ajaxdata.php',
                    type: 'POST',
                    data: {cor_id: dep_id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        var len = response.length;
                        $("#course").empty();
                        $("#course").append("<option value=''> " + 'Select Course' + " </option>");

                        for (var i = 0; i < len; i++) {
                            var id = response[i]['id'];
                            var cor_name = response[i]['cor_name'];

                            $("#course").append("<option value='" + id + "'> " + cor_name + " </option>");
                        }
                    }
                });

            });



            $("#teacher").change(function () {
                var tea_id = $(this).val();
                $.ajax
                ({
                    url: 'action/view/ajaxdata.php',
                    type: 'POST',
                    data: {tea_id: tea_id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        var credit = response['teachers']['tea_credit_taken'];
                        var assign_credit = response['assign_credit'];
                        console.log(assign_credit);

                        $("#credit_taken").val(credit);
                        $("#remain_credit").val(credit-assign_credit);

                    }
                });
            });

            $("#course").change(function () {
                var course_id = $(this).val();
                $.ajax
                ({
                    url: 'action/view/ajaxdata.php',
                    type: 'POST',
                    data: {course_id: course_id},
                    dataType: 'json',
                    success: function (response) {
                        console.log(response);
                        var cor_code = response["cor_code"];
                        var cor_credit = response["cor_credit"];

                        $("#cor_code").empty();
                        $("#cor_code").append("<input class='center' name='cor_code' ' value='" + cor_code + "' readonly >");

                        $("#cor_credit").empty();
                        $("#cor_credit").append("<input class='center' name='cor_credit' ' value='" + cor_credit + "' readonly >");


                    }
                });
            });

        });
    </script>
    <script>
        var cor_credit = document.getElementById("cor_credit")
            , remain = document.getElementById("remain_credit");

        function validate(){
            if(remain.value < cor_credit.value) {
                remain.setCustomValidity("Remain Credit is low");
            } else {
                remain.setCustomValidity('');
            }
        }

        cor_credit.onchange = validate;
        remain.onchange = validate;
    </script>


    <div class="content save-teacher">
        <div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
            <form action="action/save/assign_teacher.php" method="post">

                <h2>Course Assign to Teacher</h2>

                <label>Department</label>
                <select name="dep_id" id="dep_id">
                    <option selected="selected">--Select Department--</option>

                    <?php foreach ($department as $data) { ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['dep_name']; ?></option>
                    <?php } ?>
                </select><br>

                <label>Teachers</label>
                <select name="tea_id" id="teacher">
                    <option selected="selected">--Select Teacher--</option>
                </select><br>

                <label>Credit to be taken</label>
                <input name="credit_taken" class="center" id="credit_taken" placeholder="<view>" readonly><br>
                <label>Remaining Credit</label>
                <input name="remain_credit" id="remain_credit" class="center" placeholder="<view>" readonly><br>
                <label>Course Name</label>
                <select name="cor_id" id="course">
                    <option selected="selected">--Select Course--</option>
                </select><br>
                <label>Course Code</label>
                <b id="cor_code">
                    <input name="cor_code" class="center" placeholder="<view>" readonly>
                </b><br>

                <label>Course credit</label>
                <b id="cor_credit">
                    <input name="cor_credit" class="center" placeholder="<view>" readonly>
                </b><br>



                <input type="submit" name="assign" value="Assign">

            </form>

        </div>
    </div>
<?php require_once('footer.php'); ?>