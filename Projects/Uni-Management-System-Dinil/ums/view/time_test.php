<?php include "header.php"?>
<?php include "sidebar.php"?>
<?php
use App\Database\Database;
?>
<?php
$errors = array();
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box box-default">
            <div class="box-body">
                <?php
                    $sql = "SELECT * FROM allocate_rooms WHERE room_id = 5 AND day_id =1 ";
                    $stmt = Database::Prepare($sql);
                    $stmt->execute();
                    $data =  $stmt->fetch();
                    echo $data["start"] . "<br>";
                    echo $data["end"] . "<br>";
                    $strt = strtotime($data["start"]);
                    $end = strtotime($data["end"]);
                    $diff = $end - $strt;
                    echo date("H:i", $diff)
                ?>
            </div>
        </div>
    </section>
</div>
<?php include "footer.php"?>

