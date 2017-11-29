<?php
require "db.php";
if (!isset($_SESSION['login_admin_id'])){
    header("location: ./");
}else{

if (isset($_GET['id'])){
    $legend_id = $_GET['id'];
    $sql = "select * from `legends` WHERE `legend_id`=".$legend_id;
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);

?>
    <!DOCTYPE html>
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
        <div class="update-form">
            <form action="action/update-legend.php" method="post" role="form">
                <input type="hidden" name="legend_id" value="<?=$row['legend_id']?>">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?=$row['legend_name']?>" class="form-control" placeholder="<?=$row['legend_name']?>" required>
                </div>
                <div class="form-group">
                    <label for="dateofbirth">Date of Birth (<?=$row['dateofbirth']?>)</label>
                    <input type="date" name="dateofbirth" id="dateofbirth" value="<?=$row['dateofbirth']?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="died">Death Year (<?=$row['died']?>)</label>
                    <input type="date" name="died" id="died" value="<?=$row['died']?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" class="form-control" rows="5"placeholder="Details" required><?=$row['legend_details']?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="submit" class="btn btn-primary">
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
}