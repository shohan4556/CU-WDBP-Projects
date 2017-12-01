<?php
require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <?php
    include "style.php";
    ?>

</head>

<body>
<?php
include "navbar.php";
?>
<div class="container">
    <div class="row">
        <div class="delete-msg row">
            <?php
            if (isset($_SESSION['user_dlt_msg'])){
                echo $_SESSION['user_dlt_msg'];
                unset($_SESSION['user_dlt_msg']);
            }
            ?>
        </div>
        <div id="all-users">
            
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $sql = "select * from `user`";
                $res = mysqli_query($conn, $sql);
                $count = mysqli_num_rows($res);
                if ($count > 0){
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($res)) {
                        ?>
                        <tr>
                            <td style="width: 1%"><?=$i++?></td>
                            <td><?=$row['name']?></td>
                            <td><?=$row['username']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['phone']?></td>
                            <td>
                                <a class="btn btn-xs btn-danger" href="user-delete.php?user_id=<?=$row['user_id']?>">Delete</a>
                            </td>
                    
                        </tr>
                        <?php
                    } }else{
                    echo '<tr><td class="text-center text-warning" colspan="6">No user found!</td></tr>';
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include "footer.php";
?>
</body>

</html>
