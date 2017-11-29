<?php
include_once 'dbcon.php';

?>


<?php


$id=$_GET['id'];

$sql="SELECT * FROM tbl_student WHERE st_id= $id";
$result = mysqli_query($conn, $sql);


//ata show.php variable r jonno ai code tuku
$std=mysqli_fetch_assoc($result);


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mysql_database</title>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="fonts/open-sans/"/>
    
</head>
<body>
    
    
    <section id="from_area" class="from_con">
        <div class="container">
            <div class="row">
               <div class="col-md-3">
                   <a href="index.php" class="btn btn-info">Student </a><br><br><br>
               </div>
               <div class="col-md-9">
                  <h2>Student Information</h2><br><br><br>
                     <table class="table">
                         <tr>
                             <th width="100" class="text-right">ID:</th>
                             <td><?php echo $std['st_id']; ?></td>
                         </tr>
                         <tr>
                             <th class="text-right">Name:</th>
                             <td> <?php echo $std['st_name']; ?></td>
                         </tr>
                         <tr>
                             <th class="text-right">Roll:</th>
                             <td><?php echo $std['st_roll']; ?></td>
                         </tr>
                         <tr>
                             <th class="text-right">Age:</th>
                             <td><?php echo $std['st_age']; ?></td>
                         </tr>
                         <tr>
                             <th class="text-right">Email:</th>
                             <td><?php echo $std['st_email']; ?></td>
                         </tr>
                     </table>
                  </div>
                  </div>
                </div>
            
    </section>    
</body>
</html>