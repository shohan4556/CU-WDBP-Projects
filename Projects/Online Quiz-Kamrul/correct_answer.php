<?php
include_once ("db_configure.php");
$q = "SELECT * FROM mcq_questions";
$result = mysqli_query($conn, $q);
$value = 0;
while($row = mysqli_fetch_assoc($result)) {
    $value++;

    echo "
        <table width=\"100%\">
            <tr>
                <h3>" . $value . "." . $row['question'] . "</h3>
                <tr>" . "(a)" . $row['first_option'] . "</tr> <br>
                <tr>" . "(b)" . $row['second_option'] . "</tr> <br>
                <tr>" . "(c)" . $row['third_option'] . "</tr> <br>
                <tr>" . "Correct Ans : " . $row['correct_answer'] . "</tr>
            </tr>
        </table>
        ";
}
mysqli_close($conn);
?>