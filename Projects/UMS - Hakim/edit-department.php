<?php require_once('header.php');

include("vendor/autoload.php");
use App\view\view;

$obj = new view();
$data = $obj->viewSingleDepartment($_GET['id']);
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
			<form action="action/update/department.php" method="post">
                <input type="hidden" value="<?php echo $data['id']; ?>" name="id">
				<h2>Update Department</h2>
				<label>Code</label>
				<input type="text" name="dep_code" value="<?php echo $data['dep_code']; ?>" required><br>
				<label>Name</label>
				<input type="text" name="dep_name" value="<?php echo $data['dep_name']; ?>" required><br>
				<input type="submit" name="update" value="Update">

			</form>
		
		</div>
	</div>

<?php require_once('footer.php');?>