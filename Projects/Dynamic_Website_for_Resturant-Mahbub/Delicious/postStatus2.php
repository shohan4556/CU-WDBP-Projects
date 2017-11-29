<?php
session_start();
include("database/config.php");



if(isset($_POST['submit'])){
$item1 = $_POST['item1'];
$item2 = $_POST['item2'];
$item3 = $_POST['item3'];
$quantity1 = $_POST['quantity1'];
$quantity2 = $_POST['quantity2'];
$quantity3 = $_POST['quantity3'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$street = $_POST['street'];
$area = $_POST['area'];
$city = $_POST['city'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$c_num = $_POST['c_num'];



$sql1 = "INSERT INTO `order`(`item1`,`quantity1`,`item2`,`quantity2`,`item3`,`quantity3`,`fname`,`lname`,`email`,`street`,`area`,`city`,`zip`,`country`,`c_num`)
VALUES('$item1','$quantity1','$item2','$quantity2','$item3','$quantity3','$fname','$lname','$email','$street','$area','$city','$zip','$country','$c_num')";

$result1 = mysqli_query($myconn,$sql1);

if($result1 === TRUE){
	header("Location: onlineOrder.php");
	$_SESSION['postMsg'] = '<p><center>Your Order is submitted</center></p>';
	
}
else{
	$_SESSION['postMsg'] = '<p><center>Your Order is not aubmitted</center></p>';
	header("Location: onlineOrder.php");
}
}

?>