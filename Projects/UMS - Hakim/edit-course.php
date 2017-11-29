<?php require_once('header.php');

include("vendor/autoload.php");
use App\view\view;

$obj = new view();
$data = $obj->viewSingleCourse($_GET['id']);
$department = $obj->viewDepartment();
$semester = $obj->viewSemester();
?>

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

	<div class="content save-department">
		<div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
			<form action="action/update/course.php" method="post">
                <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
				<h2>Update Course</h2>
				<label>Code</label>
				<input type="text" name="cor_code" value="<?php echo $data['cor_code']; ?>" required><br>
				<label>Name</label>
				<input type="text" name="cor_name" value="<?php echo $data['cor_name']; ?>" required><br>
				<label>Department</label>
                <select name="cor_department" required>
                    <option>--Select Department--</option>
                    <?php foreach ($department as $depart) { ?>
                    <option value="<?php echo $depart['id']; ?>" <?php if ($depart['id'] == $data['cor_department']){ echo 'selected="selected"'; } ?> > <?php echo $depart['dep_name']; ?></option>
                    <?php } ?>
                </select>
                <br>

                <label>Semester</label>
                <select name="cor_semester" required>
                    <option>--Select Semester--</option>
                    <?php foreach ($semester as $sem) { ?>
                    <option value="<?php echo $sem['id']; ?>" <?php if ($sem['id'] == $data['cor_semester']){ echo 'selected="selected"'; } ?> > <?php echo $sem['semester_name']; ?></option>
                    <?php } ?>
                </select>
                <br>
				<input type="submit" name="update" value="Update">

			</form>
		
		</div>
	</div>

<?php require_once('footer.php');?>