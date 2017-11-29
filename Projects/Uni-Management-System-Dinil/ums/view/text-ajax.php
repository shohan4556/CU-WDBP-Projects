<?php
include "../vendor/autoload.php";
use App\Database\Database;
use App\Department\Department;
$department = new Department();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/jQuery/jquery.min.js"></script>
</head>
 <body>
 <?php
 function fill_course(){
     $output = '';
     $sql = "SELECT * FROM courses";
     $stmt = Database::Prepare($sql);
     $stmt->execute();
     $data =  $stmt->fetchAll();
     foreach ($data as $val){
         $output .= '<div class="col-md-3">';
         $output .= '<div style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">' .$val["course_name"].'';
         $output .= '</div>';
         $output .= '</div>';
     }
     return $output;
 }
 ?>
 <br><br>
<div class="container">
    <h3>
        <select name="brand" id="brand">
            <option value="">Show All Departments</option>
            <?php foreach (Department::getAllDepartment() as $value) { ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['title']; ?></option>
            <?php } ?>
        </select>
        <br><br>
        <div class="row" id="show_product">
            <?php echo fill_course(); ?>
        </div>

    </h3>
</div>
 </body>
 </html>
<script>
    $(document).ready(function () {
        $('#brand').change(function () {
            var brand_id = $(this).val();
            $.ajax({
                url:"loading.php",
                method:"POST",
                data:{brand_id:brand_id},
                success:function (data) {
                    $('#show_product').html(data);
                }
            });
        });
    });
</script>



