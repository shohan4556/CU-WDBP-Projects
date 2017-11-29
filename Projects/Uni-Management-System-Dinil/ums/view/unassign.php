<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php

use App\Session\Session;
use App\Course\Course;

?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container text-center">
            <?php
            echo Session::SuccessMsg();
            echo Session::ErrorMsg();
            ?>
            <h2>Unassign All Courses </h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Unassign Courses</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Unassign All Courses !! </b></h4>
                        </div>
                        <div class="modal-body">
                            <p style="color: #ac2925">Do you really want to unassign all course!!.</p>
                        </div>
                        <?php
                        if (isset($_GET["action"]) && $_GET["action"] == "unassign"){
                            Course::unAssign();
                        }
                        ?>
                        <div class="modal-footer">
                            <a href="?action=unassign" type="button" class="btn
                            btn-default">Yes</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php"?>
