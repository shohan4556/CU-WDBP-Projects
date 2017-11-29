<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>


<?php include_once('../elements/header.php'); ?>

<body>

<?php include_once('../elements/nav.php'); ?>


<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <form action="views/course/store.php" method="post">
                <div class="form-group">
                    <label for="title">Title :</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Course Title">
                </div>
                <div class="form-group">
                    <label for="code">Code</label>
                    <input type="text" class="form-control" id="code" name="code" placeholder="Enter Course Code">
                </div>

                <button type="submit" class="btn btn-info">Submit</button>
            </form>
        </div>
    </div>
</div>


</?//php include_once('../elements/footer.php'); ?>
