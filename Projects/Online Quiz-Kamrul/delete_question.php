<?php
    include_once ("db_configure.php");
    $id = $_GET['id'];
    $q = "DELETE FROM mcq_questions WHERE id=$id";
    mysqli_query($conn, $q);
    mysqli_close($conn);
    header("location:admin_delete_question.php");
?>

<tr>
    <th>Id</th>
    <th>Question</th>
    <th>First Option</th>
    <th>Second Option</th>
    <th>Third Option</th>
    <th>Operation</th>
</tr>

echo "
<tr>
    <td>".$value."</td>
    <td>".$row['question']."</td>
    <td>".$row['first_option']."</td>
    <td>".$row['second_option']."</td>
    <td>".$row['third_option']."</td>
    <td>".$row['correct_answer']."</td>
</tr>
";
