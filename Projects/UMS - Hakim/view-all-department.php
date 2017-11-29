<?php require_once('header.php'); ?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Department</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="save-department.php">Save Department</a></li>
                <li class="active">View All Department</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
    <!-- Main content -->
<?php
require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$department = $obj->viewDepartment();
?>
    <div class="content view-all-department">
        <div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
            <form>

                <h2>View all Department</h2>
                <div class="table-responsive">
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($department as $data) { ?>
                        <tr>
                            <td><?php echo $data['dep_code']; ?></td>
                            <td><?php echo $data['dep_name']; ?></td>
                            <td>
                                <a href="edit-department.php?id=<?php echo $data['id']; ?>">Update</a> -
                                <a href="action/delete/department.php?id=<?php echo $data['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                </div>

            </form>

        </div>
    </div>


<?php require_once('footer.php'); ?>