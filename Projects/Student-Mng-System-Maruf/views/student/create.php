<?php include_once('../../lib/connection.php'); ?>
<?php include_once('../../lib/settings.php'); ?>



<?php include_once('../elements/header.php'); ?>

<body>


<?php include_once('../elements/nav.php'); ?>

<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <form action="views/student/store.php" method="post">
                <div class="form-group">
                    <label for="first_name">First Name :</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Your First Name">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Your Last Name">
                </div>
                <div class="form-group">
                    <label for="seip">Batch ID</label>
                    <input type="text" class="form-control" id="seip" name="seip" placeholder="Enter Your Batch ID">
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>


<//?//php include_once('../elements/footer.php'); ?>
