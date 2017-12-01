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
<div class="container">
    <div class="row">
        <div id="signinForm" style="width: 100%;max-width: 400px; display: inline-block">
            <h3>Admin Login</h3>
            <div class="row success-msg">
                <?php
                if (isset( $_SESSION['login_msg'])){
                    echo  $_SESSION['login_msg'];
                    unset( $_SESSION['login_msg']);
                }
                ?>
            </div>
            <form action="post/login.php" method="post" role="form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include "footer.php";
?>
</body>

</html>
