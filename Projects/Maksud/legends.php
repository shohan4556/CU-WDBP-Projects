<?php
require "db.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Legends of BD</title>
    <?php
    include "styles.php";
    ?>

</head>
<body>
<?php
include "navbar.php";
?>

<div class="container">
    <h2 class="text-center">List of All Legends of Bangladesh</h2>
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
                    <a class="btn btn-xs btn-primary" href="view-details.php?id=<?=$row['legend_id']?>">View</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
<?php
include "scripts.php";
?>
</body>
</html>
