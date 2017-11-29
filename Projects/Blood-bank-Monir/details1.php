<link rel="stylesheet" type="text/css" href="style.css">

<?php include("config.php"); ?>
<?php 

include("header.php");
include("menu.php");

session_start();
echo "<h3>Donor List</h3>";
$username = $_SESSION['name'];

$sql = "SELECT * FROM user WHERE `bloodgroup` = 'A-'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)>0) {
    while($row = mysqli_fetch_assoc($result)) {
    		echo '<ul>
    			<li><a href="">'.$row['name'].'</a>&nbsp;&nbsp;'.$row['bloodgroup'].'&nbsp;&nbsp;'.'</li>
    		</ul>';
 }
}
 else {
    header('location: signup.php');
}


 ?>