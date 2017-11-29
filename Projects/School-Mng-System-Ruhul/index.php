<?php
include_once 'dbcon.php';

?>


<?php


$sql="SELECT * FROM tbl_student";
$result = mysqli_query($conn, $sql);

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
                   <a href="insert.php" class="btn btn-info">New Student </a><br><br><br>
               </div>
               <div class="col-md-9">
                  <h2>Student List</h2><br><br><br>
                  <table class="table">
                      <thead>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Age</th>
                          <th>Roll</th>
                          <th>Email</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                         <?php while($row=mysqli_fetch_assoc($result)){ ?>
                          <tr>
                             <td><?php echo $row['st_id']?></td> 
                             <td><?php echo $row['st_name']?></td> 
                             <td><?php echo $row['st_roll']?></td> 
                             <td><?php echo $row['st_age']?></td>
                             <td><?php echo $row['st_email']?></td> 
                             <td>
                                 <a class="btn btn-info" href="show.php?id=<?php echo $row['st_id']; ?>">View</a>
                                 <a class="btn btn-warning" href="edit.php?id=<?php echo $row['st_id']; ?>">Edit</a>
                                 <a class="btn btn-danger" onclick="return confirm('Are you sure ?')" href="delete.php?id=<?php echo $row['st_id']; ?>">Delete</a>
                             </td> 
                             
                          </tr>
                            </tbody>
                          <?php }?>
                     </table>
                  </div>
                  </div>
                </div>
            
    </section>    
</body>
</html>