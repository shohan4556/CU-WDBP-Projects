<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>

<?php
//build query
$query = "SELECT * FROM `students` ORDER BY first_name ASC";

//execution
$stmt = $db->query($query);
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);

//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `courses` ORDER BY title DESC";
//execution
$stmt = $db->query($query);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC); //


//manage posted data
if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

    $query = "DELETE FROM `map_students_courses` WHERE student_id =".$_POST['student_id'];
    $db->exec($query);


    $student_id = $_POST['student_id'];
    $course_ids = $_POST['course_ids'];
    foreach($course_ids as $course_id){
        $query = "INSERT INTO `map_students_courses` ( `student_id`, `course_id`) VALUES ( '".$_POST['student_id']."', '".$course_id."');";
        $db->exec($query);
        header('location:index.php');
    }
}

?>

<?php include_once('../elements/header.php'); ?>

<body>

<?php include_once('../elements/nav.php'); ?>

<div class="container">
    <div class="row">
        <div class=" col-md-offset-3 col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="course_code">Select Student :</label>
                    <select name="student_id" id="student_id" class="form-control">

                        <option value="">Choose a Student</option>
                        <?php
                        foreach($students as $student):

                        ?>
                        <option value="<?=$student['id']?>"><?=$student['first_name']." ".$student['last_name']?></option>
                        <?php
                        endforeach;
                        ?>

                    </select>
                </div>
                <div class="form-group">
                    <label for="course_title">Select Course</label>
                    <select name="course_ids[]" id="course_ids" class="form-control" multiple size="6">

                        <option value="">Choose a Course</option>
                        <?php
                        foreach($courses as $course):

                            ?>
                            <option value="<?=$course['id']?>"><?=$course['title']?></option>
                            <?php
                        endforeach;
                        ?>

                    </select>
                </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>

<//?//php include_once('../elements/footer.php'); ?>



