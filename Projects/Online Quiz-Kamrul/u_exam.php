<?php
    include_once ("db_configure.php");
    $q = "SELECT * FROM mcq_questions";
    $result = mysqli_query($conn, $q);
    $value = 0;
    while($row = mysqli_fetch_assoc($result)){
        $value++;

        echo "
        <table width=\"100%\">
            <tr>
                <h3>".$value.".".$row['question']."</h3>
                <tr>"."(a)".$row['first_option']."</tr> <br>
                <tr>"."(b)".$row['second_option']."</tr> <br>
                <tr>"."(c)".$row['third_option']."</tr> <br>
            </tr>
        </table>
        ";
    }
    echo "
        <form>
                <a href='correct_answer.php'>Check Answers</a>
        </form>>
    ";
    mysqli_close($conn);
    ?>

