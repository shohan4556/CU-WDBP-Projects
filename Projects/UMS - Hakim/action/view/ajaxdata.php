<?php
$conn = new PDO('mysql:host=localhost;dbname=ums', 'root', '');

if (isset($_POST['dep_id'])) {
    $department_id = $_POST['dep_id'];
    $query = "SELECT * FROM teachers WHERE tea_department=" . $department_id;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}

if (isset($_POST['corid'])) {
    $depart_id = $_POST['corid'];
    $query = "SELECT assign_teacher.course_code, course.cor_name, course.id, semester.semester_name, teachers.tea_name FROM assign_teacher JOIN course ON course.id = assign_teacher.course_id JOIN semester ON semester.id = course.cor_semester JOIN teachers ON teachers.id = assign_teacher.teacher_id WHERE assign_teacher.department_id= $depart_id AND deleted_at = '0000-00-00 00:00:00'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($course);
}

if (isset($_POST['cor_id'])) {
    $depart_id = $_POST['cor_id'];
    $query = "SELECT teachers.tea_name, course.* FROM teachers RIGHT JOIN course ON course.assigned_to = teachers.id WHERE course.cor_department=" . $depart_id;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($course);
}

if (isset($_POST['tea_id'])) {
    $tea_id = $_POST['tea_id'];
    $query = "SELECT * FROM teachers WHERE id=" . $tea_id;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $teachers = $stmt->fetch(PDO::FETCH_ASSOC);


    $query1 = "SELECT SUM(course_credit) AS assign_credit FROM assign_teacher WHERE teacher_id = $tea_id AND deleted_at = '0000-00-00 00:00:00'";

    $stmt1 = $conn->prepare($query1);
    $stmt1->execute();
    $assign_credit = $stmt1->fetch()['assign_credit'];


    $data = [
      'teachers' => $teachers,
      'assign_credit' => $assign_credit,
    ];

    echo json_encode($data);
}

if (isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    $query = "SELECT * FROM course WHERE id=" . $course_id;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($data);
}

if (isset($_POST['depid'])) {
    $dep_id = $_POST['depid'];
    $query = "SELECT * FROM course WHERE cor_department=" . $dep_id;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}

if (isset($_POST['stu_reg_no'])) {
    $stu_reg_no = $_POST['stu_reg_no'];
    $query = "SELECT enroll_student.*, course.cor_name, course.id AS cor_id FROM enroll_student LEFT JOIN course ON enroll_student.course_id = course.id WHERE stu_reg_no='$stu_reg_no'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}

if (isset($_POST['stu_reg_res'])) {
    $stu_reg_no = $_POST['stu_reg_res'];
    $query = "SELECT results.*, course.cor_code, course.cor_name, semester.semester_name, grades.grade FROM results JOIN course ON course.id = results.course_id JOIN semester ON semester.id = course.cor_semester JOIN grades ON grades.id = results.grade_id WHERE stu_reg_no='$stu_reg_no'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($data);
}


if (isset($_POST['schedule_id'])) {
    $depart_id = $_POST['schedule_id'];
    $query = "SELECT allocate_classroom.*, course.cor_code, course.cor_name, days.day_name,rooms.room_no FROM allocate_classroom JOIN course ON course.id = allocate_classroom.course_id JOIN days ON days.id = allocate_classroom.day_id JOIN rooms ON rooms.id = allocate_classroom.room_id WHERE course.cor_department = $depart_id AND deleted_at = '0000-00-00 00:00:00'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($course);
}

if (isset($_POST['stu_reg'])) {
    $stu_id = "'" . $_POST['stu_reg'] ."'";
    $query = "SELECT * FROM students WHERE stu_reg_no=".$stu_id;
    $query = "SELECT students.*, department.dep_name FROM department RIGHT JOIN students ON students.stu_department = department.id WHERE stu_reg_no=".$stu_id;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    echo json_encode($course);
}
