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
            <div id="edit-profile" style="max-width: 400px">
                <form action="post/edit-user-profile.php" method="post" role="form">
                    <div class="form-group">
                        <label for="email">Email (<?=$row['email']?>)</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone (<?=$row['phone']?>)</label>
                        <input type="tel" name="phone" id="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" value="Update Info">
                    </div>
                    
                </form>
                <div class="update-msg">
                    <?php
                    if (isset($_SESSION['update_msg'])){
                        echo $_SESSION['update_msg'];
                        unset($_SESSION['update_msg']);
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    include "footer.php";
    ?>
    </body>
    
    </html>
    <?php
}