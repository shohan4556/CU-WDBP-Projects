<?php
require "db.php";
if (!isset($_SESSION['login_admin_id'])){
    header("location: ./");
}else{
?><!DOCTYPE html>
<html lang="en">
<head>
    <title>DashBoard</title>
    <?php
    include "styles.php";
    ?>
</head>
<body>
<?php
include "navbar.php";
?>

<div class="container">
    <div class="col-md-3">
        <?php
        include "sidebar.php";
        ?>
    </div>
    <div class="col-md-6">
        <div class="message">
            <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <div id="add-legend">
            <form action="action/add-legend.php" method="post" role="form" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="date" name="died" id="died" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image">
                </div>
                <div class="form-group">
                    <textarea name="details" id="details" class="form-control" rows="5" placeholder="Details" required></textarea>
                </div>
                
                <div class="form-group">
                    <input type="submit" name="submit" value="submit" class="btn btn-primary" >
                </div>
            </form>
        </div>
    </div>

</div>
<?php
include "scripts.php";
?>

</body>
</html>
<?php
}