<?php include_once('../../lib/connection.php'); ?>
<?php include_once('../../lib/settings.php'); ?>

<?php


//build query
//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `students` WHERE id =".$_GET['id'];
//execution
$stmt = $db->query($query);
$student = $stmt->fetch(PDO::FETCH_ASSOC); //


?>
<?php include_once('../elements/header.php'); ?>

<body>

<?php include_once('../elements/nav.php'); ?>

<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <form action="views/student/update.php" method="post">



                    <input value="<?=$student['id']?>" type="hidden" class="form-control" id="sid" name="id" placeholder="Enter Your First Name">


                <div class="form-group">
                    <label for="first_name">First Name :</label>
                    <input value="<?=$student['first_name']?>" type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Your First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input value="<?=$student['last_name']?>" type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Your Last Name">
                </div>
                <div class="form-group">
                    <label for="seip_id">Batch ID</label>
                    <input value="<?=$student['seip']?>" type="text" class="form-control" id="seip" name="seip" placeholder="Enter Your Batch ID">
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>


</?//php include_once('../elements/footer.php'); ?>
