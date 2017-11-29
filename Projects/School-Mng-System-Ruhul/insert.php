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
                  <h2>Add new Student </h2><br><br><br>
                     
                  </div>
                  <div class="col-md-8">
                      <form action="store.php" method="POST">
                      
                      <div class="form-group">
                        <label for="name">Name</label>
                          <input required type="text" class="form-control" name="name" id="name" placeholder="student Name">
                      </div>
                      
                      <div class="form-group">
                        <label for="name">Roll</label>
                          <input type="text" class="form-control" name="roll" id="Roll" placeholder="Roll">
                      </div>
                      
                      <div class="form-group">
                        <label for="name">Age</label>
                          <input type="text" class="form-control" name="age" id="age" placeholder="Age">
                      </div>
                      
                      
                      <div class="form-group">
                        <label for="name">Email</label>
                          <input required type="text" class="form-control" name="email" id="age" placeholder="Email">
                      </div>
                      
                       <button type="submit" class="btn btn-default">Sign in</button>
                    </form>
                      
                  </div>
                  </div>
                </div>
            
    </section>   
</body>
</html>