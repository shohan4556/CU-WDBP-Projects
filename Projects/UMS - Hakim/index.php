<?php require_once('header.php');

require_once('vendor/autoload.php');
use App\count\count;

$obj = new count();
$total_stu = $obj->TotalStudent();
$enroll_stu = $obj->EnrollStudent();
?>


    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Dashboard</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
<div>
<h1 style="font-size: 200px">
<?php
echo $total_stu['total_stu'];
echo $enroll_stu['enroll_stu'];
?></h1>
    </div>





<?php require_once('footer.php');?>