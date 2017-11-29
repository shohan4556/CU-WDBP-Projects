<?php require_once('header.php'); ?>
    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Department
                </h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="view-all-department.php">View Department</a></li>
                <li class="active">Save Department</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->
    <div class="content">
    <div class="content save-department">
        <div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>


            <script type="text/javascript">

                function checkcode() {
                    var code = document.getElementById("dep_code").value;

                    if (code) {
                        $.ajax({
                            type: 'post',
                            url: 'action/check/department.php',
                            data: {
                                dep_code: code,
                            },
                            success: function (response) {
                                $('#dep_code_status').html(response);
                            }
                        });
                    }
                }

                function checkname() {
                    var depname = document.getElementById("dep_name").value;

                    if (depname) {
                        $.ajax({
                            type: 'post',
                            url: 'action/check/department.php',
                            data: {
                                dep_name: depname,
                            },
                            success: function (response) {
                                $('#dep_name_status').html(response);
                            }
                        });
                    }
                }
            </script>


            <form action="action/save/save_dep.php" method="post">

                <h2>Save Department</h2>

                <span id="dep_code_status"></span><br>
                <label>Code</label>
                <input type="text" id="dep_code" onkeyup="checkcode()" name="dep_code" required>
                <br>
                <span id="dep_name_status"></span><br>
                <label>Name</label>
                <input type="text" id="dep_name" onkeyup="checkname()" name="dep_name" required>
                <br>
                <input type="submit" name="save" value="Save">

            </form>

        </div>
    </div>

<?php require_once('footer.php'); ?>