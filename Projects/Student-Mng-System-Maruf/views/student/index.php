<?php include_once('../../lib/connection.php'); ?>
<?php include_once('../../lib/settings.php'); ?>

<?php

//build query
//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `students` ORDER BY id DESC";
//execution
$stmt = $db->query($query);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC); //

$student_courses = 'PHP, HTML';
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Batch ID</th>
                        <th>Courses</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $counter = 1;
                    foreach($students as $student):




                        $query = "SELECT course_id FROM map_students_courses WHERE student_id=".$student['id'];
                        $stmt = $db->query($query);
                        $course_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        /*
                         * TODO
                         * Join Query
                         * IN
                         */

                        $course_titles = [];
                        foreach($course_ids as $course_id){
                            $query = "SELECT title FROM courses WHERE id=".$course_id['course_id'];
                            $stmt = $db->query($query);
                            $course_titles[] = $stmt->fetch(PDO::FETCH_ASSOC)['title'];
                        }

                        $courses = implode(',',$course_titles);




















                ?>
                    <tr>
                        <td><?php echo $counter++;?></td>
                        <td><?php echo $student['id']?></td>
                        <td><?php echo $student['first_name']?></td>
                        <td><?php echo $student['last_name']?></td>
                        <td><?php echo $student['seip']?></td>
                        <td><?php echo $courses;?></td>

                        <td>
                            <a href="views/student/show.php?id=<?=$student['id']?>">Show</a> |
                            <a href="views/student/edit.php?id=<?=$student['id']?>">Edit</a> |
                            <a href="views/student/delete.php?id=<?=$student['id']?>">Delete</a> |
                            <a href="views/student/reassign.php?id=<?=$student['id']?>">Edit Courses</a>
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