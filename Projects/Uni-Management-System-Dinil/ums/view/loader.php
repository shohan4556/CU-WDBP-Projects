<?php
include "../vendor/autoload.php";
use App\Database\Database;
use App\Course\Course;
use App\Utility\Utility;
$course = new Course();
?>
<?php
$output = '';
if (isset($_POST["semester_id"])){
    if ($_POST["semester_id"] != ''){
        $sql= "SELECT courses.*,semesters.title, assign_course.teacher_name, assign_course.stat  FROM courses LEFT JOIN semesters on 
courses.semi_id = 
semesters.id LEFT JOIN assign_course on courses.course_code = assign_course.course_code WHERE dept_id = '".$_POST["semester_id"]."' AND courses.status=1 ORDER BY id DESC";
    }
    else{
        $sql = "SELECT courses.*,semesters.title, assign_course.teacher_name, assign_course.stat  FROM courses LEFT JOIN semesters on courses.semi_id = 
semesters.id LEFT JOIN assign_course on courses.course_code = assign_course.course_code WHERE courses.status=1 ORDER BY 
id DESC";
    }
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetchAll();
    $output .='<table id="table_info" class="table table-striped table-bordered">';

    $i = 0;
    foreach ($data as $val){
        $i++;
        $output .= '<tr>';
        $output .= '<td>'. $i .'</td>';
        $output .= '<td>' .$val["course_code"].'</td>';
        $output .= '<td>' .$val["course_name"].'</td>';
        $output .= '<td>' .$val["course_credit"].'</td>';
        $output .= '<td>' .$val["title"].'</td>';
        if ($val["teacher_name"] == '' || $val["stat"] == 2){
            $val["teacher_name"] = "Not Assigned Yet";
        }
        $output .= '<td>' .$val["teacher_name"].'</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="edit-course.php?edit_id='.$val["id"].'">Edit</a>';
        $output .= '</td>';
        $output .='<td>';
        $output .= '<a onclick="return confirm(\'Are u sure ?\')" class="btn btn-default" href="?trash='.$val["id"].'">Trash</a>';
        $output .= '</td>';
        $output .= '</tr>';
    }

    echo $output;
}

if (isset($_POST["depart_id"])){
    if ($_POST["depart_id"] != ''){
        $sql= "SELECT students.*,departments.code FROM students LEFT JOIN departments on students.dept_id = departments.id WHERE dept_id = '".$_POST["depart_id"]."' ORDER BY id DESC";
    }
    else{
        $sql = "SELECT students.*,departments.code FROM students LEFT JOIN departments on students.dept_id = departments.id WHERE 
students.status='1' ORDER BY students.id DESC";
    }
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetchAll();
    $output .='<table id="table_info" class="table table-striped table-bordered">';

    $i = 0;
    foreach ($data as $val){
        $i++;
        $output .= '<tr>';
        $output .= '<td>'. $i .'</td>';
        $output .= '<td>' .$val["reg_no"].'</td>';
        $output .= '<td>' .$val["title"].'</td>';
        $output .= '<td>' .$val["email"].'</td>';
        $output .= '<td>' .$val["contact"].'</td>';
        $output .= '<td>' .$val["date"].'</td>';
        $output .= '<td>' .$val["code"].'</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="view-student.php?viewId='.$val["id"].'">View</a>';
        $output .= '</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="edit-student.php?editId='.$val["id"].'">Edit</a>';
        $output .= '</td>';
        $output .='<td>';
        $output .= '<a onclick="return confirm(\'Are u sure ?\')" class="btn btn-default" href="?trashId='.$val["id"].'">Trash</a>';
        $output .= '</td>';
        $output .= '</tr>';
    }

    echo $output;
}



if (isset($_POST["department_id"])){
    $sql= "SELECT * FROM teachers WHERE dept_id = '".$_POST["department_id"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetchAll();
    $output = '<option value="">&larr; Select Teacher &larr;</option>';
    foreach ($data as $value){
        $output .= '<option value="'.$value["id"].'">'.$value["name"].'</option>';
    }
    echo $output;
}

if (isset($_POST["deptfor_crs"])){
    $sql= "SELECT * FROM courses WHERE dept_id = '".$_POST["deptfor_crs"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetchAll();
    $output = '<option value="">&larr; Select Course Code &larr;</option>';
    foreach ($data as $value){
        $output .= '<option value="'.$value["id"].'">'.$value["course_name"].'</option>';
    }
    echo $output;
}


if (isset($_POST["teacher_id"])){
    $sql= "SELECT * FROM teachers WHERE id = '".$_POST["teacher_id"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetch();
    if ($data["remaining_credit"] <= 0){
       echo $style = "<span style='color: #ac2925'>";
       echo $style .= "</span>";
    }
    $output .='<label>Credit to be taken</label>';
    $output .= '<input type="text" class="form-control" name="totalCredit" readonly="readonly" value="'.$data["total_credit"].'">';
    $output .='<label>Remaining Credit</label>';
    $output .= '<input type="text" class="form-control" name="remainingCredit" readonly="readonly" value="'.$data["remaining_credit"].'">';
    $output .= '<input type="hidden" name="teacherName" value="' .$data["name"].'">';


    echo $output;
}
// for course details.............


if (isset($_POST["course_id"])){
    $sql= "SELECT * FROM courses WHERE id = '".$_POST["course_id"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetch();
    $output .='<label>Course Name</label>';
    $output .= '<input type="text" class="form-control" name="courseName"  readonly="readonly" value="'.$data["course_name"].'">';
    $output .='<label>Course Credit</label>';
    $output .= '<input type="number" class="form-control" name="courseCredit" readonly="readonly" value="'.$data["course_credit"].'">';
    $output .= '<input type="hidden" name="courseCode" value="'.$data["course_code"].'">';
    echo $output;
}
?>


<?php
if (isset($_POST["dept_id"])){
    $deptId = $_POST["dept_id"];
    $sql= "SELECT reg_no FROM students WHERE dept_id='$deptId'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $totalRows =  $stmt->rowCount();

    $ID = $totalRows +1;
    $newId ="";
    if ($ID < 9){
        $newId = str_pad("00", 3, $ID);
    }
    if ($ID > 9){
        $newId = str_pad("0", 3, $ID);
    }
    if ($ID > 99){
        $newId = $ID;
    }



    $sql= "SELECT code FROM departments WHERE id = '".$_POST["dept_id"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetch();
    $output .= '<input type="hidden" name="regNo" value="'.$data["code"]."-".date("Y"). "-" .$newId . '">';
    echo $output;
}


if (isset($_POST["stdId"])){
    $sql= "SELECT students.title, students.email , departments.id, departments.code FROM students LEFT JOIN departments on students.dept_id = 
departments.id WHERE students.id = '".$_POST["stdId"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetch();
    $output .='<label>Student Name</label>';
    $output .= '<input type="text" class="form-control" name="name"  readonly="readonly" value="'.$data["title"].'"><br>';
    $output .='<label>Student Email</label>';
    $output .= '<input type="email" class="form-control" name="email" readonly="readonly" value="'.$data["email"].'"><br>';
    $output .='<label>Department</label>';
    $output .= '<input type="text" class="form-control" name="department" readonly="readonly" value="'.$data["code"]
        .'"><br>';
    $query = "SELECT * FROM courses WHERE dept_id = '".$data["id"]."'";
    $stmt = Database::Prepare($query);
    $stmt->execute();
    $data =  $stmt->fetchAll();

    $output .='<label for="">Courses</label>';
    $output .='<select id="courseId" name="courseId" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">';
    $output .='<option value="">&larr; Select Course &rarr;</option>';
    foreach ($data as $value){
        $output .= '<option value="'.$value["id"].'">'.$value["course_name"].'</option>';
    }
    $output .='</select>';
    echo $output;
}


if (isset($_POST["studentId"])){
    $sql= "SELECT students.title, students.email , departments.id, departments.code FROM students LEFT JOIN departments on students.dept_id = 
departments.id WHERE students.id = '".$_POST["studentId"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetch();
    $output .='<label>Student Name</label>';
    $output .= '<input type="text" class="form-control" name="name"  readonly="readonly" value="'.$data["title"].'"><br>';
    $output .='<label>Course Credit</label>';
    $output .= '<input type="email" class="form-control" name="email" readonly="readonly" value="'.$data["email"].'"><br>';
    $output .='<label>Department</label>';
    $output .= '<input type="text" class="form-control" name="department" readonly="readonly" value="'.$data["code"]
        .'"><br>';
    $query = "SELECT entrol_course.course_id, courses.course_name FROM entrol_course LEFT JOIN courses 
ON entrol_course.course_id=courses.id WHERE entrol_course.reg_no = '" .$_POST["studentId"]."'";
    $stmt = Database::Prepare($query);
    $stmt->execute();
    $data =  $stmt->fetchAll();

    $output .='<label for="">Courses</label>';
    $output .='<select id="courseId" name="courseId" class="form-control selectpicker" data-show-subtext="true" data-live-search="true">';
    $output .='<option value="">&larr; Select Course &rarr;</option>';
    foreach ($data as $value){
        $output .= '<option value="'.$value["course_id"].'">'.$value["course_name"].'</option>';
    }
    $output .='</select>';
    echo $output;
}
if (isset($_POST["result"])){
    $sql= "SELECT students.title, students.email , departments.id, departments.code FROM students LEFT JOIN departments on students.dept_id = 
departments.id WHERE students.id = '".$_POST["result"]."'";
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetch();
    $output .='<label>Student Name</label>';
    $output .= '<input type="text" class="form-control" name="name"  readonly="readonly" value="'.$data["title"].'"><br>';
    $output .='<label>Student Email</label>';
    $output .= '<input type="email" class="form-control" name="email" readonly="readonly" value="'.$data["email"].'"><br>';
    $output .='<label>Department</label>';
    $output .= '<input type="text" class="form-control" name="department" readonly="readonly" value="'.$data["code"]
        .'"><br>';
    echo $output;
}

if (isset($_POST["grade"])){
    $query = "SELECT courses.course_name, courses.course_code, grades.grade,results.id FROM results INNER JOIN courses 
ON results.course_id=courses.id INNER JOIN grades ON results.grade=grades.id WHERE results.reg_id = '" .$_POST["grade"]."'";
    $stmt = Database::Prepare($query);
    $stmt->execute();
    $data =  $stmt->fetchall();
    foreach ($data as $results) {
        $output .='<tr>';
        $output .= '<td>' . $results['course_name'] . '</td>';
        $output .= '<td>' . $results['course_code'] . '</td>';
        $output .= '<td>' . $results['grade'] . '</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="edit-result.php?editGrade='.$results["id"].'">Edit</a>';
        $output .= '</td>';
        $output .='</tr>';
    }

    echo $output;
}

if (isset($_POST["gradeStd"])){
    $query = "SELECT courses.course_name, courses.course_code, grades.grade,results.id FROM results INNER JOIN courses 
ON results.course_id=courses.id INNER JOIN grades ON results.grade=grades.id WHERE results.reg_id = '" .$_POST["gradeStd"]."'";
    $stmt = Database::Prepare($query);
    $stmt->execute();
    $data =  $stmt->fetchall();
    foreach ($data as $results) {
        $output .='<tr>';
        $output .= '<td>' . $results['course_name'] . '</td>';
        $output .= '<td>' . $results['course_code'] . '</td>';
        $output .= '<td>' . $results['grade'] . '</td>';
        $output .='</tr>';
    }

    echo $output;
}



if (isset($_POST["enrollId"])){
    if ($_POST["enrollId"] != ''){
        $sql = "SELECT students.reg_no, students.title, courses.course_name, departments.code,entrol_course.date,entrol_course.id FROM entrol_course LEFT JOIN students ON entrol_course.reg_no=students.id LEFT JOIN courses ON entrol_course.course_id=courses.id LEFT JOIN departments ON students.dept_id=departments.id WHERE students.dept_id = '".$_POST["enrollId"]."' ORDER BY entrol_course.id DESC ";
    }
    else{
        $sql = "SELECT students.reg_no, students.title, courses.course_name, departments.code,entrol_course.date,entrol_course.id FROM entrol_course LEFT JOIN students ON entrol_course.reg_no=students.id LEFT JOIN courses ON entrol_course.course_id=courses.id LEFT JOIN departments ON students.dept_id=departments.id ORDER BY entrol_course.id DESC ";
    }


    $output = '';

    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetchAll();

    $i = 0;
    foreach ($data as $val){
        $i++;
        $output .= '<tr>';
        $output .= '<td>'. $i .'</td>';
        $output .= '<td>' .$val["reg_no"].'</td>';
        $output .= '<td>' .$val["title"].'</td>';
        $output .= '<td>' .$val["course_name"].'</td>';
        $output .= '<td>' .$val["code"].'</td>';
        $output .= '<td>' .$val["date"].'</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="edit-enroll-course.php?edit_id='.$val["id"].'">Edit</a>';
        $output .= '</td>';
        $output .= '</tr>';

    }
    echo $output;
}

if (isset($_POST["dpt_teacher"])) {
    if ($_POST["dpt_teacher"] != '') {
        $sql = "SELECT teachers.id, teachers.name, teachers.address,teachers.email, teachers.contact, teachers.total_credit, teachers.remaining_credit, designations.title, departments.code FROM teachers LEFT JOIN designations ON teachers.desig_id=designations.did LEFT JOIN departments ON teachers.dept_id=departments.id WHERE departments.id = '" . $_POST["dpt_teacher"] . "' ORDER BY teachers.id DESC ";
    } else {
        $sql = "SELECT teachers.id, teachers.name, teachers.address,teachers.email, teachers.contact, teachers.total_credit, teachers.remaining_credit, designations.title, departments.code FROM teachers LEFT JOIN designations ON teachers.desig_id=designations.did LEFT JOIN departments ON teachers.dept_id=departments.id ORDER BY teachers.id DESC ";
    }


    $output = '';
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();

    $i = 0;
    foreach ($data as $val){
        if ($val["remaining_credit"] <= 0){
            $remaining = 0;
        }else{
            $remaining = $val["remaining_credit"];
        }
        $i++;
        $output .= '<tr>';
        $output .= '<td>'. $i .'</td>';
        $output .= '<td>' .$val["name"].'</td>';
        $output .= '<td>' .$val["contact"].'</td>';
        $output .= '<td>' .$val["title"].'</td>';
        $output .= '<td>' .$val["code"].'</td>';
        $output .= '<td>' .$val["total_credit"].'</td>';
        $output .= '<td>' .$remaining.'</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="view-teacher.php?viewId='.$val["id"].'">View</a>';
        $output .= '</td>';
        $output .='<td>';
        $output .= '<a class="btn btn-default" href="edit-teacher.php?edit_id='.$val["id"].'">Edit</a>';
        $output .= '</td>';
        $output .='<td>';
        $output .= '<a onclick="return confirm(\'Are u sure ?\')" class="btn btn-default" href="?trash_id='.$val["id"].'">trash</a>';
        $output .= '</td>';
        $output .= '</tr>';

    }
    echo $output;
}


if (isset($_POST["scheduleId"])){

    if ($_POST["scheduleId"] != ''){
        $sql = 'SELECT * FROM courses WHERE dept_id = "'.$_POST["scheduleId"].'"  ';
    }else{
        $sql = 'SELECT * FROM courses ';
    }

    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $courseDetail =  $stmt->fetchAll();
    foreach ($courseDetail as $data){
        $output .='<tr>';
        $output .= '<td>' . $data["course_code"] . '</td>';
        $output .= '<td>' .  $data["course_name"] . '</td>';
        $output .= '<td>';

            $sql = 'SELECT rooms.room_no, days.title, allocate_rooms.start, allocate_rooms.end FROM allocate_rooms LEFT JOIN rooms ON allocate_rooms.room_id=rooms.id LEFT JOIN days ON allocate_rooms.day_id=days.id WHERE allocate_rooms.course_id = "'.$data["id"] .'" AND value=1';
            $stmt = Database::Prepare($sql);
            $stmt->execute();
            $totalRows =  $stmt->rowCount();
            $schedules =  $stmt->fetchAll();
            if ($totalRows < 1){
                $output .='Not Scheduled Yet';
            }else {
                foreach ($schedules as $schedule) {
                    $output .= "Room No : " . $schedule["room_no"] . ", " . $schedule["title"] . " , " .
                        date("g:i a", strtotime($schedule["start"])) . " - " . date("g:i a", strtotime($schedule["end"])) . "<br>";
                }
            }

        $output .= '</td>';
        $output .='</tr>';
     }
     echo $output;
}


?>
