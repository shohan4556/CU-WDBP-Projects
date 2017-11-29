<?php include_once('../../lib/connection.php');?>
<?php include_once('../../lib/settings.php'); ?>

<?php

//build the query

$query = "INSERT INTO `courses` ( `title`, `code`)
VALUES ( '".$_POST['title']."', '".$_POST['code']."')";
//echo $query;

// execute query

$result = $db->exec($query);
if($result){
    header("location:index.php");
    echo "Data has been saved sucessfully.";
}else{
    echo "There is an error. Please try again later.";
}
