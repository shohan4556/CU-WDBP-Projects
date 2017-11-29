<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php

use App\Session\Session;
use App\AllocateClass\AllocateClass;

?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container text-center">
            <?php
            echo Session::SuccessMsg();
            echo Session::ErrorMsg();
            ?>
            <h2>Unallocate All Courses </h2>
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Unallocate Courses</button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><b>Unallocate All Classrooms !! </b></h4>
                        </div>
                        <div class="modal-body">
                            <p style="color: #ac2925">Do you really want to unallocate all classrooms!!.</p>
                        </div>
                        <?php
                        if (isset($_GET["action"]) && $_GET["action"] == "unallocate"){
                            AllocateClass::unAllocate();
                        }
                        ?>
                        <div class="modal-footer">
                            <a href="?action=unallocate" type="button" class="btn
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
