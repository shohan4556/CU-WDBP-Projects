<?php require_once('header.php');

include("vendor/autoload.php");
use App\view\view;

$obj = new view();
$department = $obj->viewDepartment();
$rooms = $obj->viewRooms();
$days = $obj->viewDays();
?>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#dep_id").change(function () {
                var dep_id = $(this).val();

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
        });
    </script>


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
            </div>
        </div>

        <div class="breadcrumb-line bg-teal">
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

	<div class="content save-teacher">
		<div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
			<form action="action/save/allocate.php" method="post">
				
				<h2>Allocate Classrooms</h2>

                <label>Department</label>
                <select name="dep_id" id="dep_id">
                    <option selected="selected">--Select Department--</option>

                    <?php foreach ($department as $data) { ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['dep_name']; ?></option>
                    <?php } ?>
                </select><br>

                <label>Course Name</label>
                <select name="cor_id" id="course">
                    <option selected="selected">--Select Course--</option>
                </select><br>
				
				<label>Room No.</label>
				<select name="room_id">
					<option value="">--Select Room--</option>
                    <?php foreach ($rooms as $room) { ?>
                        <option value="<?php echo $room['id']; ?>"> <?php echo $room['room_no']; ?></option>
                    <?php } ?>
				</select><br>
				
				<label>Day</label>
				<select name="day_id">
					<option value="">--Select Day--</option>
                    <?php foreach ($days as $day) { ?>
                        <option value="<?php echo $day['id']; ?>"> <?php echo $day['day_name']; ?></option>
                    <?php } ?>
				</select><br>
				
				<label>From</label>
				<input type="time" name="time_from"><br>
				
				<label>To</label>
				<input type="time" name="time_to"><br>
				<input type="submit" value="Allocate">	
				
			</form>
		
		</div>
	</div>
<?php require_once('footer.php');?>