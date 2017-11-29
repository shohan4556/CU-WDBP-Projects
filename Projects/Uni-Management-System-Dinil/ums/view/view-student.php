<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Session\Session;
use App\Department\Department;
use App\Student\Student;
$department = new Department();
$student = new Student();
?>
<?php
$errors = array();
$code = "";
$name = "";
?>
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Student Detail Information</h1>
            </div>
            <br>
            <div class="box-body">
                <div class="table-responsive col-md-12">
                    <table id="tableId" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th width="10%">Reg. No.</th>
                            <th width="15%">Name</th>
                            <th width="15%">Email</th>
                            <th width="13%">Contact No.</th>
                            <th width="25%">Address</th>
                            <th width="10%">Reg. Date</th>
                            <th width="7%">Department</th>
                            <th width="5%">Edit</th>
                        </tr>
                        </thead>
                        <?php
                        if (!isset($_GET["viewId"])){
                            header("Location: student-list.php");
                        }
                        else{
                        $id = $_GET["viewId"];
                        $data = $student->getStudentsById($id);
                        ?>
                        <tbody class="showStudents">
                        <tr>
                            <td><?php echo $data["reg_no"]; ?></td>
                            <td><?php echo $data["title"]; ?></td>
                            <td><?php echo $data["email"]; ?></td>
                            <td><?php echo $data["contact"]; ?></td>
                            <td><?php echo $data["address"]; ?></td>
                            <td><?php echo $data["date"]; ?></td>
                            <td><?php echo $data["code"]; ?></td>
                            <td><a href="edit-student.php?editId=<?php echo $id; ?>" class="btn
                            btn-default">Edit</a></td>
                        </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>

        </div>
    </section>
</div>

<?php include "footer.php"?>
