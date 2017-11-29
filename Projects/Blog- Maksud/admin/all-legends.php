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
    <div class="col-md-8">
        <div class="message">
            <?php
            if (isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
            ?>
        </div>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th>SR.</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Death Year</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "select * from `legends`";
            $res = mysqli_query($conn, $sql);
            $i=1;
            while($row = mysqli_fetch_assoc($res)){
            ?>
            <tr>
                <td><?=$i++?></td>
                <td><?=$row['legend_name']?></td>
                <td><?=$row['dateofbirth']?></td>
                <td><?=$row['died']?></td>
                <td>
                    <a class="btn btn-xs btn-primary" href="legend-edit-info.php?id=<?=$row['legend_id']?>">Edit</a>
                    <a class="btn btn-xs btn-danger" href="action/delete-legend.php?id=<?=$row['legend_id']?>">Delete</a>
                </td>
            </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>

</div>
<?php
include "scripts.php";
?>

</body>
</html>
<?php
}