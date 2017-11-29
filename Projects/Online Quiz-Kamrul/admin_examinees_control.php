<table border="1" width="100%">
    <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Operation</th>
    </tr>
    <?php
    include_once ("db_configure.php");
    $q ="SELECT * FROM user_registration";
    $result = mysqli_query($conn,$q);
    while($row = mysqli_fetch_assoc($result)){
        echo "
    <tr>
        <td>".$row['id']."</td>
        <td>".$row['first_name']."</td>
        <td>".$row['last_name']."</td>
        <td>".$row['username']."</td>
        <td>".$row['email']."</td>
        <td><a href='delete_user.php?id=".$row['id']."'>Delete</a></td>
    </tr>
    ";
    }
    mysqli_close($conn);
    ?>
</table>