<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>
<?php

//manage posted data
if(strtolower($_SERVER['REQUEST_METHOD']) == 'post') {

    $query = "DELETE FROM `map_students_courses` WHERE student_id =".$_POST['student_id'];
    $db->exec($query);

    $student_id = $_POST['student_id'];
    $course_ids = $_POST['course_ids'];
    foreach($course_ids as $course_id){
        $query = "INSERT INTO `map_students_courses` ( `student_id`, `course_id`) VALUES ( '".$_POST['student_id']."', '".$course_id."');";
        $db->exec($query);
    }

    header('location:../student/index.php');
}




//build query
$query = "SELECT * FROM `students` WHERE id =".$_GET['id'];

//execution
$stmt = $db->query($query);
$student = $stmt->fetch(PDO::FETCH_ASSOC);

//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "SELECT * FROM `courses` ORDER BY title DESC";
//execution
$stmt = $db->query($query);
$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT course_id FROM `map_students_courses` WHERE student_id=".$student['id'];
//execution
$stmt = $db->query($query);
$selected_course_ids = $stmt->fetchAll(PDO::FETCH_ASSOC);
$students_course_ids = [];
foreach($selected_course_ids as $selected_course_id){
    $students_course_ids[] = $selected_course_id['course_id'];
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
                    <label for="course_code">Change Course for Student :</label>
                    <span><?php echo $student['first_name']." ".$student['last_name'];?></span>
                    <input value="<?=$student['id']?>" type="hidden" class="form-control" id="sid" name="student_id" >

                </div>
                <div class="form-group">
                    <label for="course_title">Select Course</label>
                    <select name="course_ids[]" id="course_ids" class="form-control" multiple size="20">

                        <option value="">Choose a Course</option>
                        <?php
                        $selectedTxt = '';
                        foreach($courses as $course):
                                if(in_array( $course['id'], $students_course_ids)){
                                    $selectedTxt = 'selected="selected"';
                                }else{
                                    $selectedTxt = '';
                                }
                            ?>
                            <option value="<?=$course['id']?>" <?php echo $selectedTxt;?>><?=$course['title']?></option>
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


</?//php include_once('../elements/footer.php'); ?>


