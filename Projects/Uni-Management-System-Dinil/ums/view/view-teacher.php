<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Teacher\Teacher;
$teacher = new Teacher();
?>
<div class="content-wrapper">
    <section class="content">
        <?php
        if (!isset($_GET["viewId"])){
            header("Location: teacher-list.php");
        }
        else{
        $id = $_GET["viewId"];
        $data = $teacher->getTeacherInfo_byId($id);
        ?>
        <div class="box box-default">
            <div class="box-header with-border text-center">
                <h1 class="box-title">Detail information about <?php echo $data["name"]; ?></h1>
            </div>
            <div class="box-body">
                <div class="col-sm-offset-3 col-sm-6 col-sm-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <label>Name:</label>

                            <p><?php echo $data["name"]; ?></p>

                            <label>Address:</label>

                            <p><?php echo $data["address"]; ?></p>

                            <label>Email:</label>

                            <p><?php echo $data["email"]; ?></p>

                            <label>Contact:</label>

                            <p><?php echo $data["contact"]; ?></p>

                            <label>Designation:</label>

                            <p><?php echo $data["title"]; ?></p>

                            <label>Department:</label>

                            <p><?php echo $data["code"]; ?></p>

                            <label>Total Credit:</label>

                            <p><?php echo $data["total_credit"]; ?></p>

                            <label>Remaining Credit:</label>

                            <?php
                            if ($data["remaining_credit"] <= 0){
                                $remaining = 0;
                            }else{
                                $remaining = $data["remaining_credit"];
                            }
                            ?>
                            <p><?php echo $remaining; ?></p>
                        </div>
                    </div>
                    <a class="btn btn-info" href="edit-teacher.php?edit_id=<?php echo $id; ?>">Edit</a>
                </div>

            </div>
        </div>
        <?php } ?>
    </section>
</div>
<?php include "footer.php"?>
