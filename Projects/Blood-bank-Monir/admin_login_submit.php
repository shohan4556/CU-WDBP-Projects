<link rel="stylesheet" type="text/css" href="style.css">

<?php include("config.php"); ?>
<?php 

session_start();

if(isset($_POST['submit'])){
$username = $_POST['name'];
$password = md5($_POST['password']);

$sql = "SELECT * FROM admin WHERE `name` = '".$username."' AND `password` = '".$password."'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result)==1) {
    while($row = mysqli_fetch_assoc($result)) {
    		$_SESSION['name'] = $row['name'];
    		$_SESSION[''] = $row['name'];
    		header('location:admin_view.php');
    }
} else {
    header('location: signup.php');
}
}

 ?>