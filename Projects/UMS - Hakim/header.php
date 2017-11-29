<?php
session_start();
if (empty($_SESSION['user'])){
    $_SESSION['message'] = 'You are not logged In';
    header('location:login.php');
}


$activemenu = basename($_SERVER['PHP_SELF'],".php");


if ($activemenu == "index"){
    $activedashboard = 'active';
}

//department

if ($activemenu == "save-department" or $activemenu == "view-all-department" or $activemenu == "edit-department"){
    $activedep = 'active';
}
if ($activemenu == "save-department"){
    $activesavedep = 'active';
}
if ($activemenu == "view-all-department"){
    $activeviewdep = 'active';
}

//course

if ($activemenu == "save-course" or $activemenu == "course-statics" or $activemenu == "edit-course" or $activemenu == "course-assign-teacher"){
    $activecourse = 'active';
}
if ($activemenu == "save-course"){
    $activesavcourse = 'active';
}
if ($activemenu == "course-statics"){
    $activecoursestatics = 'active';
}
if ($activemenu == "course-assign-teacher"){
    $activecateacher = 'active';
}

//teacher

if ($activemenu == "save-teacher" or $activemenu == "view-all-teacher"){
    $activeteacher = 'active';
}
if ($activemenu == "save-teacher"){
    $activesaveteacher = 'active';
}
if ($activemenu == "view-all-teacher"){
    $activeviewteacher = 'active';
}


//student

if ($activemenu == "register-student" or $activemenu == "enroll-course" or $activemenu == "save-student-result" or $activemenu == "view-result"){
    $activestudent = 'active';
}
if ($activemenu == "register-student"){
    $activeregstudent = 'active';
}
if ($activemenu == "enroll-course"){
    $activeenroll = 'active';
}
if ($activemenu == "save-student-result"){
    $activesaveresult = 'active';
}
if ($activemenu == "view-result"){
    $activeviewresult = 'active';
}


//control panel

if ($activemenu == "allocate-class-room" or $activemenu == "view-schedule" or $activemenu == "unassign-all-course" or $activemenu == "unallocate-all-class-room"){
    $activecontrolpanel = 'active';
}
if ($activemenu == "allocate-class-room"){
    $activeallocate = 'active';
}
if ($activemenu == "view-schedule"){
    $activeschedule = 'active';
}
if ($activemenu == "unassign-all-course"){
    $activeunassign = 'active';
}
if ($activemenu == "unallocate-all-class-room"){
    $activeunallocate = 'active';
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>University Management System</title>

	<!-- Global stylesheets -->
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
	<link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
	<link href="css/custom.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<!-- /global stylesheets -->
	<!-- /theme JS files -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css"> -->
</head>

<body class="navbar-top">

	<!-- Main navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">
                <!-- <img src="assets/images/logo_light.png" alt=""> -->
            <span><b>University Management System</b></span>
            </a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>



		<div class="navbar-collapse collapse" id="navbar-mobile">

            <ul class="nav navbar-nav">
                <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
            </ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown dropdown-user">
					<ul class="dropdown-menu dropdown-menu-right">
						<li><a href="#"><i class="icon-user-plus"></i> My profile</a></li>
                        <li class="divider"></li>
						<li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
						<li><a href="action/auth/logout.php"><i class="icon-switch2"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<!-- /main navbar -->

		<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-fixed">
				<div class="sidebar-content">

					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<a href="#" class="media-left"><img src="<?php echo $_SESSION['user']['image']; ?>" class="img-circle img-sm" alt=""></a>
								

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->


					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Navigation</span> <i class="icon-menu" title="Main pages"></i></li>
								<li class="<?php echo $activedashboard; ?>"><a href="index.php"><i class="icon icon-home5"></i> <span>Dashboard</span></a></li>

                                <li class="<?php echo $activedep; ?>">
                                    <a href="#"><i class="icon-stack2"></i> <span>Department</span></a>
                                    <ul>
                                        <li class="<?php echo $activesavedep; ?>"><a href="save-department.php" id="layout1">Save Department</a></li>
                                        <li class="<?php echo $activeviewdep; ?>"><a href="view-all-department.php" id="layout2">View All Department</a></li>
                                    </ul>
                                </li>


                                <li class="<?php echo $activecourse; ?>">
									<a href="#"><i class="icon-stack2"></i> <span>Course</span></a>
									<ul>
                                        <li class="<?php echo $activesavcourse; ?>"><a href="save-course.php" id="layout3">Save Course</a></li>
                                        <li class="<?php echo $activecateacher; ?>"><a href="course-assign-teacher.php" id="layout4">Course Assign Teacher</a></li>
                                        <li class="<?php echo $activecoursestatics; ?>"><a href="course-statics.php" id="layout4">Course Statistics</a></li>
                                    </ul>
								</li>

                                <li class="<?php echo $activeteacher; ?>">
									<a href="#"><i class="icon-stack2"></i> <span>Teacher</span></a>
									<ul>
										<li class="<?php echo $activesaveteacher; ?>"><a href="save-teacher.php" id="layout1">Save Teacher</a></li>
										<li class="<?php echo $activeviewteacher; ?>"><a href="view-all-teacher.php" id="layout2">View All Teacher</a></li>
									</ul>
								</li>

								<li class="<?php echo $activestudent; ?>">
									<a href="#"><i class="icon-copy"></i> <span>Student</span></a>
									<ul>

										<li class="<?php echo $activeregstudent; ?>"><a href="register-student.php" id="layout4">Register Student</a></li>
										<li class="<?php echo $activeenroll; ?>"><a href="enroll-course.php" id="layout4">Enroll Course</a></li>
										<li class="<?php echo $activesaveresult; ?>"><a href="save-student-result.php" id="layout4">Save Student Result</a></li>
										<li class="<?php echo $activeviewresult; ?>"><a href="view-result.php" id="layout4">View Result</a></li>

									</ul>
								</li>

								<li class="<?php echo $activecontrolpanel; ?>">
									<a href="#"><i class="icon-spinner3 spinner"></i> <span>Control Panel</span></a>
									<ul>

										<li class="<?php echo $activeallocate; ?>"><a href="allocate-class-room.php" id="layout4">Allocate Classrooms</a></li>
										<li class="<?php echo $activeschedule; ?>"><a href="view-schedule.php" id="layout4">View Schedule</a></li>
										<li class="<?php echo $activeunassign; ?>"><a href="unassign-all-course.php" id="layout4">Unassign All Course</a></li>
										<li class="<?php echo $activeunallocate; ?>"><a href="unallocate-all-class-room.php" id="layout4">Unallocate All Classroom</a></li>
									</ul>
								</li>


							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>


            <div class="content-wrapper">