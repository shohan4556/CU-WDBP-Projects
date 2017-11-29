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
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Student</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="enroll-course.php">Enroll Student in Course</a></li>
                <li class="active">Register Student</li>
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
			<form action="action/auth/register_student.php" method="post">
				<h2>Register Student</h2>
                <input type="hidden" value="<?php
                function unique_id($l = 8) {
                    return substr(md5(uniqid(mt_rand(), true)), 0, $l);
                }
                echo unique_id();
                ?>" name="stu_password">
				<label>Name</label>
				<input type="text" name="stu_name" required><br>
				<label>Email</label>
				<input type="email" name="stu_email" required><br>
				<label>Contact No.</label>
				<input type="number" name="stu_mobile" ><br>
				<label>Date</label>
				<input type="date" name="stu_reg_date" ><br>
				<label>Address</label>
				<input name="stu_address"><br>
				<label>Department</label>
				<select name="stu_department">
					<option selected="selected">Select Department</option>
<?php foreach ($department as $dep) { ?>
					<option value="<?php echo $dep['id']; ?>"><?php echo $dep['dep_name']; ?></option>
<?php } ?>
				</select><br>
	
				
				<input type="submit" value="Register">	
				
			</form>
		
		</div>
	</div>
<?php require_once('footer.php');?>