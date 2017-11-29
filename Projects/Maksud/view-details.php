<?php
require "db.php";
if (isset($_GET['id'])) {
    $legend_id = $_GET['id'];
    $sql = "select * from `legends` WHERE `legend_id`=" . $legend_id;
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);
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
        <div class="panel panel-primary" style="margin-top: 50px">
            <div class="panel-heading"><h2 class="text-center"><?=$row['legend_name']?></h2></div>
            <div class="panel-body text-center">
                <div class="legend-img">
                    <img src="uploads/<?=$row['image']?>">
                </div>
                <ul class="nav nav-pills nav-stacked">
                    <li>Date of Birth: <strong><?=$row['dateofbirth']?></strong></li>
                    <li>Death Year: <strong><?=$row['died']?></strong></li>
                </ul>
                <div class="legend-details bordered">
                    <?=$row['legend_details']?>
                </div>
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
