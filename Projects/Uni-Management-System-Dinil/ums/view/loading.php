<?php
include "../vendor/autoload.php";
use App\Database\Database;
use App\Course\Course;
$course = new Course();
?>
<?php
$output = '';
if (isset($_POST["brand_id"])){
    if ($_POST["brand_id"] != ''){
        $sql= "SELECT * FROM courses WHERE dept_id = '".$_POST["brand_id"]."'";
    }
    else{
        $sql = "SELECT * FROM courses";
    }
    $stmt = Database::Prepare($sql);
    $stmt->execute();
    $data =  $stmt->fetchAll();
    foreach ($data as $val){
        $output .= '<div class="col-md-3">';
        $output .= '<div style="border: 1px solid #ccc; padding: 20px; margin-bottom: 20px;">' .$val["course_name"].'';
        $output .= '</div>';
        $output .= '</div>';
    }
    echo $output;
}
?>
