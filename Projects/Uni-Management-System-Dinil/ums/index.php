<?php ob_start(); ?>
<?php include "vendor/autoload.php"; ?>
<?php
use App\Database\Database;
use App\Utility\Utility;
use App\Session\Session;
session::checkLogin();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UMS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="view/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="view/dist/css/AdminLTE.min.css">


    <link rel="stylesheet" href="view/dist/css/form.css">
    <link rel="stylesheet" href="view/dist/css/main_form.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <img style="height: 130px" src="view/dist/img/ums.png">
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Please sign in for dashboard.</p>
        <?php
        $errors = array();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["submit"])) {
            if (empty($_POST["username"])) {
                $errors['usernameEmpty'] = "Username must not be empty!";
            }
            if (empty($_POST["password"])) {
                $errors['passwordEmpty'] = "Password must not be empty!";
            }
            if (empty($errors)) {
                $userName = $_POST["username"];
                $pass = $_POST["password"];

                $query = "SELECT * FROM users WHERE username ='$userName' OR email='$userName'   AND password='$pass'";
                $stmt = Database::Prepare($query);
                $stmt->execute();
                $data = $stmt->fetch();
                if ($data) {
                    Session::set("login", true);
                    Session::set("userid", $data["id"]);
                    Session::set("username", $data["username"]);
                    Session::set("userRole", $data["is_admin"]);
                    header("Location: view/home.php");
                } else {
                    $errors['passwordMatch'] = "Password or Username don't match!";
                }
            }
        }
        }
        ?>
        <?php if (!empty($errors['passwordMatch'])){
            echo Utility::error($errors["passwordMatch"]);
        } ?>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="User name or email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                <?php if (!empty($errors['usernameEmpty'])){
                    echo Utility::error($errors["usernameEmpty"]);
                } ?>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                <?php if (!empty($errors['passwordEmpty'])){
                    echo Utility::error($errors["passwordEmpty"]);
                } ?>
            </div>
            <div class="row">
                <div class="col-xs-8">
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>


        <!-- /.social-auth-links -->

        <a href="#">I forgot my password</a><br>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="view/plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="view/bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
<?php ob_end_flush(); ?>
