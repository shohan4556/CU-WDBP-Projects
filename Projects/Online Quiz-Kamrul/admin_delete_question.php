<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>Question</th>
        <th>Correct Answer</th>
        <th>Operation</th>
    </tr>
    <?php
    include_once ("db_configure.php");
    $q ="SELECT * FROM mcq_questions";
    $result = mysqli_query($conn,$q);
    while($row = mysqli_fetch_assoc($result)){
        echo "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['question']."</td>
        <td>".$row['correct_answer']."</td>
        <td><a href='delete_question.php?id=".$row['id']."'>Delete</a></td>
    </tr>
    ";
    }
    mysqli_close($conn);
    ?>
</table>