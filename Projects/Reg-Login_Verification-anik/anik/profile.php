<?php
require "db.php";
if (isset($_SESSION['logged_user_id'])){
//    echo $_SESSION['logged_user_id'];
//    die();
    $sql = "select * from `user` WHERE `user_id`=".$_SESSION['logged_user_id'];
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
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
            <div id="profile-info">
                <p>Name: <strong><?=$row['name']?></strong></p>
                <p>Email: <strong><?=$row['email']?></strong></p>
                <p>Username: <strong><?=$row['username']?></strong></p>
                <p>Phone: <strong><?=$row['phone']?></strong></p>
            </div>
            <a class="btn btn-info" href="edit-profile.php">Edit</a>
        </div>
    </div>
    
    <?php
    include "footer.php";
    ?>
    </body>
    
    </html>
<?php
}