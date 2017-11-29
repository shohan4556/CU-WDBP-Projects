<?php

$dbname = 'mysql:host=localhost;dbname=ums';
$dbuser = 'root';
$dbpass = '';

$pdo = new PDO($dbname, $dbuser, $dbpass);

if (isset($_POST['dep_name'])) {
    $name = $_POST['dep_name'];

    $query = " SELECT * FROM course WHERE dep_name='$name' ";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $data = $stmt->fetchAll();

    echo '<table>
<tr>
	<th>Code</th>
	<th>Name/Title</th>
	<th>Semester</th>
	<th>Assigned To</th>
</tr>';
    foreach ($data as $course) {
        echo "<tr>";
        echo "<td>" . $course['cor_name'] . "</td>";
        echo "<td>" . $course['cor_code'] . "</td>";
        echo "<td>" . $course['cor_semester'] . "</td>";
        echo "<td>" . $course['cor_assigned'] . "</td>";
        echo "</tr>";


    }
    exit();
}

?>