<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>
<?php
//build the query

$query = "UPDATE `courses` SET `title` = '".$_POST['title']."', `code` = '".$_POST['code']."' WHERE `id` =".$_POST['id'];

// execute query

$result = $db->exec($query);
if($result){
    header("location:index.php");
    echo "Data has been saved sucessfully.";
}else{
    echo "There is an error. Please try again later.";
}