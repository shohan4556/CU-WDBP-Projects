<?php include_once('../../lib/connection.php'); ?>
<?php include_once('../../lib/settings.php'); ?>

<?php


//build query
//$query = "SELECT * FROM `students` ORDER BY id DESC LIMIT 0,5";
$query = "DELETE FROM `students` WHERE `students`.`id` = ".$_GET['id'];

// execute query

$result = $db->exec($query);
if($result){
    header("location:index.php");
    echo "Data has been deleted sucessfully.";
}else{
    echo "There is an error. Please try again later.";
}
