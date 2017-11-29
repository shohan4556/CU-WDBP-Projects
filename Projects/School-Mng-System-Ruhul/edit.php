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
                   <a href="index.php" class="btn btn-info">Student list</a><br><br><br>
               </div>
               <div class="col-md-9">
                  <h2>Edit Student </h2><br><br><br>
                     
                  </div>
                  <div class="col-md-8">
                      <form action="update.php?id=<?php echo $id ?>" method="POST">
                      
                      <div class="form-group">
                        <label for="name">Name</label>
                          <input required type="text" class="form-control" name="name" id="name" placeholder="student Name" value="<?php echo $std['st_name'];?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="name">Roll</label>
                          <input type="text" class="form-control" name="roll" id="Roll" placeholder="Roll" value="<?php echo $std['st_roll'];?>">
                      </div>
                      
                      <div class="form-group">
                        <label for="name">Age</label>
                          <input type="text" class="form-control" name="age" id="age" placeholder="Age" value="<?php echo $std['st_age'];?>">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="name">Email</label>
                          <input required type="text" class="form-control" name="email" id="age" placeholder="Email" value="<?php echo $std['st_email'];?>">
                      </div>
                      
                       <button type="submit" class="btn btn-default">Sign in</button>
                    </form>
                      
                  </div>
                  </div>
                </div>
            
    </section>   
</body>
</html>