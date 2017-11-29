<?php require_once('header.php');

require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$semester = $obj->viewSemester();
$department = $obj->viewDepartment();
?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Courses</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="view-all-courses.php">View All Course</a></li>
                <li class="active">Save Course</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">


    <script type="text/javascript">

        function checkcode()
        {
            var code=document.getElementById( "cor_code" ).value;

            if(code) {
                $.ajax({
                    type: 'post',
                    url: 'action/check/course.php',
                    data: {
                        cor_code: code,
                    },
                    success: function (response) {
                        $('#cor_code_status').html(response);
                    }
                });
            }
        }

        function checkname()
        {
            var corname=document.getElementById( "cor_name" ).value;

            if(corname)
            {
                $.ajax({
                    type: 'post',
                    url: 'action/check/course.php',
                    data: {
                        cor_name:corname,
                    },
                    success: function (response) {
                        $( '#cor_name_status' ).html(response);
                    }
                });
            }
        }
    </script>



	<div class="content save-course">
		<div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
			<form action="action/save/save_cor.php" method="post">

				<h2>Save Course</h2>

                <span id="cor_code_status"></span><br>
				<label>Code</label>
				<input type="text" id="cor_code" onkeyup="checkcode()" name="cor_code" required>


                <span id="cor_name_status"></span><br>
				<label>Name</label>
				<input type="text" id="cor_name" onkeyup="checkname()" name="cor_name" required>


				<label>Credit</label>
				<input type="text" name="cor_credit" required><br>
				<label>Description</label>
				<input type="text" name="cor_desc" required><br>
				<label>Department</label>

				<select name="cor_dep" required>
					<option>Select Your Department</option>
                    <?php foreach ($department as $dep){ ?>
					<option value="<?php echo $dep['id']; ?>"> <?php echo $dep['dep_name']; ?></option>
                    <?php } ?>
				</select><br>


				<label>Semester</label>
				<select name="cor_sem">
                    <option>Select Your Semester</option>
                    <?php foreach ($semester as $sem) { ?>
                        <option value="<?php echo $sem['id']; ?>">
                            <?php echo $sem['semester_name']; ?>
                        </option>
                    <?php } ?>
                </select><br>
                <input type="submit" name="save" value="Save">

			</form>

		</div>
	</div>
<?php require_once('footer.php');?>