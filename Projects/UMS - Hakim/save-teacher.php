<?php require_once('header.php');

require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$designation = $obj->viewDesignation();
$department = $obj->viewDepartment();
?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Teacher</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="view-all-teacher.php">View All Teacher</a></li>
                <li class="active">Save Teacher</li>
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
        <form action="action/save/save_tea.php" method="post">

            <h2>Save Teacher</h2>
            <label>Name</label>
            <input type="text" name="tea_name" required><br>
            <label>Address</label>
            <input type="text" name="tea_address" required><br>
            <label>Email</label>
            <input type="email" name="tea_email" required><br>
            <label>Contact No.</label>
            <input type="number" name="tea_mobile" required><br>

            <label>Designation</label>
            <select name="tea_designation">
                <option>Select Your Designation</option>
                <?php foreach ($designation as $des) { ?>
                    <option value="<?php echo $des['id']; ?>"> <?php echo $des['designation_name']; ?></option>
                <?php } ?>
            </select><br>
            <label>Department</label>
            <select name="tea_department">
                <option>Select Your Department</option>
                <?php foreach ($department as $dep) { ?>
                    <option value="<?php echo $dep['id']; ?>"> <?php echo $dep['dep_name']; ?></option>
                <?php } ?>
            </select><br>

            <label>Credit to be taken</label>
            <input type="number" name="tea_credit_taken"><br>

            <input type="submit" name="save" value="Save">

        </form>

    </div>
</div>
<?php require_once('footer.php'); ?>