<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            use App\Session\Session;
            if (session::get("userRole") == "1"){
            ?>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Department</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="department.php"><i class="fa fa-circle-o"></i> Create Department</a></li>
                    <li class="active"><a href="view_department.php"><i class="fa fa-circle-o"></i> Department list</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Course</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="course.php"><i class="fa fa-circle-o"></i> Create Course</a></li>
                    <li><a href="course-stat.php"><i class="fa fa-circle-o"></i> Course Statics</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>Teacher</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="teacher.php"><i class="fa fa-circle-o"></i> Save Teacher Info</a></li>
                    <li><a href="teacher-list.php"><i class="fa fa-circle-o"></i> Teacher List</a></li>
                    <li><a href="courseAssign.php"><i class="fa fa-circle-o"></i> Course Assign</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Student</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="student.php"><i class="fa fa-circle-o"></i> Save Student Info</a></li>
                    <li><a href="student-list.php"><i class="fa fa-circle-o"></i> Students List</a></li>
                    <li><a href="enroll-course.php"><i class="fa fa-circle-o"></i> Enroll In a Course </a></li>
                    <li><a href="enroll-course-list.php"><i class="fa fa-circle-o"></i> Enrolled Courses </a></li>
                    <li><a href="result.php"><i class="fa fa-circle-o"></i> Create Result </a></li>
                    <li><a href="view-result.php"><i class="fa fa-circle-o"></i> <span> View Student
                                Results</span></a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Class Schedule</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="allocateRoom.php"><i class="fa fa-circle-o"></i> Allocate Classrooms</a></li>
                    <li><a href="view-schedule.php"><i class="fa fa-circle-o"></i> All Class Schedule</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Start New Semester</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="unassign.php"><i class="fa fa-circle-o"></i> Unassign All Courses</a></li>
                    <li><a href="unallocate.php"><i class="fa fa-circle-o"></i> Unallocate All Classrooms</a></li>
                </ul>
            </li>
            <?php } ?>
            <li><a href="view-result-for-student.php"><i class="fa fa-book"></i> <span> View Result</span></a></li>
        </ul>
    </section>
</aside>


