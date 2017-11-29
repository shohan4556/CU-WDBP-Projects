<?php require_once('header.php'); ?>
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
                <li><a href="index.php">Home</a></li>
                <li class="active">Dashboard</li>
            </ul>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

	<div class="content unassign-courses">
		<div class="form-outer">
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset ($_SESSION['message']);
            }
            ?>
			<form action="action/delete/unallocate.php" method="post">
				
				<h2>Unallocate all Classrooms</h2>
				
											
				<input type="submit" name="unallocate" value="Unallocate Rooms">
				
			</form>
		
		</div>
	</div>
<?php require_once('footer.php');?>