<?php

include_once('lib/connection.php');
include_once('lib/settings.php');

 session_start();
if($_SESSION["admin"]==false)
header("location: login.php");    


?>

<?php include_once('views/elements/header.php'); ?>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php">Dashboard</a>
        </div>
        <!--&lt;!&ndash; Collect the nav links, forms, and other content for toggling &ndash;&gt;-->
        <!--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">-->
            <!--<ul class="nav navbar-nav navbar-right">-->
                <!--<li><a href="index.php">View all students</a></li>-->
                <!--<li><a href="course/index.php">View all Courses</a></li>-->
                <!--<li><a href="course/create.html">Insert Courses</a></li>-->
                <!--<li><a href="assign/create.php">Assign Courses</a></li>-->

            <!--</ul>-->
        <!--</div>&lt;!&ndash; /.navbar-collapse &ndash;&gt;-->
    </div><!-- /.container-fluid -->
</nav>
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Manage Students</div>
            <div class="panel-body">
                Total 2000 students found.
                <nav>
                    <li><a href="views/student/index.php">View</a> all students.</li>
                    <li><a href="views/student/create.php">Click here</a> to add a new student.</li>
                    <li><a href="views/student/assign.php">Click here</a> to assign a student to a course.</li>
                </nav>

                </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Manage Courses</h3>
            </div>
            <div class="panel-body">
                Total 100 courses are available.
                <nav>
                    <li><a href="views/course/index.php">View</a> all courses.</li>
                    <li><a href="views/course/create.php">Click here</a> to add a new course.</li>
                </nav>
            </div>
        </div>
    </div>
</div>


