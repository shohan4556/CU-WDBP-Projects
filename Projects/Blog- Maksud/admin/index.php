<?php
require "db.php";
if (isset($_SESSION['login_admin_id'])){
    header("location: ./home.php");
}else {
    ?>
    <!DOCTYPE html >
<html >
<head >
    <title > Admin Login </title >
    <?php
    include "styles.php";
    ?>
    </head>
    <body>

    <div class="container">
        <div class="row text-center">
            <div id="admin-login">
                <h1>Admin Login</h1>
                <div class="">
                    <?php
                    if (isset($_SESSION['login_msg'])) {
                        echo $_SESSION['login_msg'];
                        unset($_SESSION['login_msg']);
                    }
                    ?>
                </div>
                <form action="action/login.php" method="post" role="form" style="max-width: 400px; margin: auto">
                    <div class="form-group">
                        <input type="text" id="username" name="username" class="form-control" placeholder="username" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="password" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" id="login" name="login" class="btn btn-xs btn-block btn-primary" value="Login">
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
