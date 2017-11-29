<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<?php
session_start();
if (!isset($_SESSION['assignTeacher'])){
    header("Location: courseAssign.php");
    die();
}
?>
<div class="container">
    <div class="modal show" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remaining credit is not enough.</h4>
                </div>
                <div class="modal-body">
                    <p>This teacher already exceeded his credit limit. Do you really want to assign this subject to him
                        ? If you assign new course then course credit will be added with teacher total credit.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><a href="courseAssign.php?con=1">yes</a></button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><a href="courseAssign.php?con=0">no</a></button>
                </div>
            </div>

        </div>
    </div>
</div>