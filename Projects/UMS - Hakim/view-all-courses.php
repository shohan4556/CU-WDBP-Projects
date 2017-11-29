<?php require_once('header.php'); ?>

    <!-- Main content -->
<?php
require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$courses = $obj->viewCourse();
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
                <li><a href="save-course.php">Save Course</a></li>
                <li class="active">View All Courses</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

    <div class="content view-all-department">
        <div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
            <form>

                <h2>View all Courses</h2>
                <div class="table-responsive">
                <table>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($courses as $data) { ?>
                        <tr>
                            <td><?php echo $data['cor_code']; ?></td>
                            <td><?php echo $data['cor_name']; ?></td>
                            <td><?php echo $data['cor_department']; ?></td>
                            <td><?php echo $data['cor_semester']; ?></td>
                            <td>
                                <a href="edit-course.php?id=<?php echo $data['id']; ?>">Update</a> -
                                <a type="button" href="action/delete/course.php?id=<?php echo $data['id']; ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
                </div>

            </form>

        </div>
    </div>

<?php require_once('footer.php'); ?>