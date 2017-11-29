<?php include_once('../../lib/connection.php'); ?>
<?php include_once('../../lib/settings.php'); ?>

<?php


//build the query

$query = "UPDATE `students` SET `first_name` = '".$_POST['first_name']."', `last_name` = '".$_POST['last_name']."', `seip` = '".$_POST['seip']."' WHERE `id` =".$_POST['id'];

// execute query

$result = $db->exec($query);
if($result){
    header("location:index.php");
    echo "Data has been saved sucessfully.";
}else{
    echo "There is an error. Please try again later.";
}