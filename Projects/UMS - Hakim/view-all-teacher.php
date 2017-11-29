<?php require_once('header.php');

require_once('vendor/autoload.php');
use App\view\view;

$obj = new view();
$teachers = $obj->viewTeachers();
?>

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content">
            <div class="page-title">
                <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Teacher</h4>
            </div>
        </div>

        <div class="breadcrumb-line">
            <ul class="breadcrumb">
                <li><a href="index.php"><i class="icon-home2 position-left"></i> Home</a></li>
                <li><a href="save-teacher.php">Save Teacher</a></li>
                <li class="active">View All Teacher</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <div class="row">

            <?php foreach ($teachers as $teacher) { ?>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-body">
                    <div class="media">
                        <div class="media-left">
                            <a href="assets/images/placeholder.jpg" data-popup="lightbox">
                                <img src="assets/images/placeholder.jpg" style="width: 70px; height: 70px;" class="img-circle" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-heading"><?php echo $teacher['tea_name']; ?></h6>
                            <p class="text-muted"><?php echo $teacher['dep_name']; ?>, <?php echo $teacher['designation_name']; ?></p>

                            <ul class="icons-list">
                                <li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Google Drive"><i class="icon-google-drive"></i></a></li>
                                <li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Twitter"><i class="icon-twitter"></i></a></li>
                                <li><a href="#" data-popup="tooltip" title="" data-container="body" data-original-title="Github"><i class="icon-github"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
<?php require_once('footer.php'); ?>