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
        <div id="regForm" style="width: 100%;max-width: 400px; display: inline-block">
            <div class="row success-msg">
                <?php
                if (isset($_SESSION['reg_msg'])){
                    echo $_SESSION['reg_msg'];
                    unset($_SESSION['reg_msg']);
                }
                ?>
            </div>
            <form action="post/user-signup.php" method="post" role="form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" id="phone" class="form-control" placeholder="phone" required>
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Register">
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
