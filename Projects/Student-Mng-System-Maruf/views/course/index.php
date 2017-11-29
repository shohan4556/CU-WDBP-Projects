<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>

<?php
//build query
//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `courses` ORDER BY id DESC";
//execution
$stmt = $db->query($query);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC); //

?>

<?php include_once('../elements/header.php'); ?>

<body>

<?php include_once('../elements/nav.php'); ?>

<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Code</th>

                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $counter = 1;
                    foreach($courses as $course):

                ?>
                    <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $course['id']?></td>
                        <td><?php echo $course['title']?></td>
                        <td><?php echo $course['code']?></td>

                        <td>
                            <a href="views/course/show.php?id=<?=$course['id']?>">Show</a> |
                            <a href="views/course/edit.php?id=<?=$course['id']?>">Edit</a> |
                            <a href="views/course/delete.php?id=<?=$course['id']?>">Delete</a>
                        </td>
                    </tr>
                <?php
                    endforeach;
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include_once('../elements/footer.php'); ?>

