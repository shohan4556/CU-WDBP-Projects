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
            <form action="views/course/update.php" method="post">



                    <input value="<?=$course['id']?>" type="hidden" class="form-control" id="sid" name="id" placeholder="Enter Your First Name">


                <div class="form-group">
                    <label for="title">Title :</label>
                    <input value="<?=$course['title']?>" type="text" class="form-control" id="title" name="title" placeholder="Enter Course Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Code</label>
                    <input value="<?=$course['code']?>" type="text" class="form-control" id="code" name="code" placeholder="Enter Course Code">
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>


</?//php include_once('../elements/footer.php'); ?>