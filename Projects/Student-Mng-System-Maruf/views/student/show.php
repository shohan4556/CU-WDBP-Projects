<?php include_once('../../lib/connection.php'); ?>
<?php include_once('../../lib/settings.php'); ?>


<?php


//build query
//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `students` WHERE id =".$_GET['id'];
//execution
$stmt = $db->query($query);
$student = $stmt->fetch(PDO::FETCH_ASSOC); //


$query = "SELECT course_id FROM map_students_courses WHERE student_id=".$_GET['id'];
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


<?php include_once('../elements/header.php'); ?>

<body>

<?php include_once('../elements/nav.php'); ?>

<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <dl>

                <dt>ID</dt>
                <dd><?=$student['id']?></dd>

                <dt>Full Name</dt>
                <dd><?php echo $student['first_name'].' '.$student['last_name'];?></dd>

                <dt>Batch ID</dt>
                <dd><?=$student['seip']?></dd>

                <dt>Courses</dt>
                <dd><?=$courses?></dd>

            </dl>
        </div>
    </div>
</div>


</?//php include_once('../elements/footer.php'); ?>
