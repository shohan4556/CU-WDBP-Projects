<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>
<?php

//build query
//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `courses` WHERE id =".$_GET['id'];
//execution
$stmt = $db->query($query);
$course = $stmt->fetch(PDO::FETCH_ASSOC); //

?>

<?php include_once('../elements/header.php'); ?>

<body>

<?php include_once('../elements/nav.php'); ?>
<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <dl>

                <dt>ID</dt>
                <dd><?=$course['id']?></dd>

                <dt>Title</dt>
                <dd><?php $course['title'];?></dd>

                <dt>Code</dt>
                <dd><?=$course['code']?></dd>



            </dl>
        </div>
    </div>
</div>


</?//php include_once('../elements/footer.php'); ?>