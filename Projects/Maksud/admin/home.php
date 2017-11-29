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
    <div class="col-md-6">
        <h2 class="well">Welcome</h2>
    </div>
    
</div>
<?php
include "scripts.php";
?>

</body>
</html>
<?php
}