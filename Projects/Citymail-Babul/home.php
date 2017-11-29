<?php
session_start();
error_reporting(1);

if($_SESSION['semail']==""){
  header('Location:index.php');
}

if ($_SESSION['homemsg']!="") {
  echo '<script type="text/javascript">';
    echo 'alert("'.$_SESSION['homemsg'].'");';
  echo '</script>';
  }
$_SESSION['homemsg'] = "";
?>

<!DOCTYPE html>
<html>
<title>City Mail Server</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='https://fonts.googleapis.com/css?family=RobotoDraft' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	html,body,h1,h2,h3,h4,h5 {font-family: "RobotoDraft", "Roboto", sans-serif}
	.w3-bar-block .w3-bar-item {padding: 16px}
</style>

<body>

<!-- Side Navigation -->
<nav class="w3-sidebar w3-bar-block w3-collapse w3-white w3-animate-left w3-card" style="z-index:3;width:320px;" id="mySidebar">
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom w3-large"><img src="images/logo.jpg" style="width:60%;"></a>
  <a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
  class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>
  
  <a href="javascript:void(0)" class="w3-bar-item w3-button w3-dark-grey w3-button w3-hover-black w3-left-align" onclick="document.getElementById('id01').style.display='block'">New Message <i class="w3-padding fa fa-pencil"></i></a>

<?php
include_once('config.php');

$email=$_SESSION['semail'];

$sql="SELECT * FROM usermail INNER JOIN users ON usermail.rec_id = users.email and usermail.rec_id='$email'";

$dd=mysqli_query($con,$sql);

$num_msg = mysqli_num_rows($dd);
  

?>
  <a id="myBtn" onclick="myFunc('Demo1')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-inbox w3-margin-right"></i>Inbox (<?php echo $num_msg; ?>)<i class="fa fa-caret-down w3-margin-left"></i></a>

  <div id="Demo1" class="w3-hide w3-animate-left">

    <?php
      while($r=mysqli_fetch_array($dd)){
      $id = $r['mail_id'];
      echo '<a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail("'.$r['mail_id'].'");w3_close();" id="firstTab">';
         echo '<div class="w3-container">';
          echo '<img class="w3-round w3-margin-right" src="'.$r['imagepath'].'" style="width:15%;"><span class="w3-opacity w3-large">'.$r['sen_id'].'</span>';
            echo "<h6>Subject:".$r['sub']."</h6>";
          echo "</div>";
        echo "</a>";
      }
    ?>
    

     <!-- <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('Jane');w3_close();">
      <div class="w3-container">
        <img class="w3-round w3-margin-right" src="userImages/Babul.JPG" style="width:15%;"><span class="w3-opacity w3-large">Jane Doe</span>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
      </div>
    </a>

    <a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail('John');w3_close();">
      <div class="w3-container">
        <img class="w3-round w3-margin-right" src="userImages/Babul.JPG" style="width:15%;"><span class="w3-opacity w3-large">John Doe</span>
        <p>Welcome!</p>
      </div>
    </a> -->

  </div>

<?php
  $email=$_SESSION['semail'];

  $sql="SELECT * FROM usermail INNER JOIN users ON usermail.rec_id = users.email and usermail.sen_id='$email'";
  $dd2=mysqli_query($con,$sql);

  $num_sen = mysqli_num_rows($dd2);
  
?>
  <a id="myBtn" onclick="myFunc('Demo2')" href="javascript:void(0)" class="w3-bar-item w3-button"><i class="fa fa-paper-plane w3-margin-right"></i>Sent(<?php echo $num_sen; ?>)</a>
  
  <div id="Demo2" class="w3-hide w3-animate-left">

    <?php
      while($r2=mysqli_fetch_array($dd2)){
        $id2 = $r2['mail_id'];
      echo '<a href="javascript:void(0)" class="w3-bar-item w3-button w3-border-bottom test w3-hover-light-grey" onclick="openMail("'.$r2['mail_id'].'");w3_close();" id="firstTab">';
         echo '<div class="w3-container">';
          echo '<img class="w3-round w3-margin-right" src="'.$r2['imagepath'].'" style="width:15%;"><span class="w3-opacity w3-large">'.$r2['sen_id'].'</span>';
            echo "<h6>Subject:".$r2['sub']."</h6>";
          echo "</div>";
        echo "</a>";
      }
    ?>
  </div>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-hourglass-end w3-margin-right"></i>Drafts</a>
  <a href="#" class="w3-bar-item w3-button"><i class="fa fa-trash w3-margin-right"></i>Trash</a>
  <a href="home.php?chk=logout" class="w3-bar-item w3-button"><i class="fa fa-remove w3-margin-right"></i>Logout</a>
    <?php
      $chk=$_GET['chk'];
      if($chk=="logout")
      {
      unset($_SESSION['semail']);
      header('Location:index.php');
      }
    ?>

</nav>

<!-- Modal that pops up when you click on "New Message" -->
<div id="id01" class="w3-modal" style="z-index:4">
	<form action="compose.php" method="post">
	  <div class="w3-modal-content w3-animate-zoom">
	    <div class="w3-container w3-padding w3-red">
	       <span onclick="document.getElementById('id01').style.display='none'"
	       class="w3-button w3-red w3-right w3-xxlarge"><i class="fa fa-remove"></i></span>
	      <h2>Send Mail</h2>
	    </div>
	    <div class="w3-panel">
	      <label>To</label>
	      <input class="w3-input w3-border w3-margin-bottom" type="text" name="to">
	      <label>Subject</label>
	      <input class="w3-input w3-border w3-margin-bottom" type="text" name="sub">
	      <input class="w3-input w3-border w3-margin-bottom" style="height:150px" placeholder="What's on your mind?" name="msg">
	      <div class="w3-section">
	        <input type="submit" value="Send" name="send" class="w3-button w3-red" onclick="document.getElementById('id01').style.display='none'"/>
	      </div>    
	    </div>
	  </div>
  </form>
</div>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:320px;">
<i class="fa fa-bars w3-button w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>
<a href="javascript:void(0)" class="w3-hide-large w3-red w3-button w3-right w3-margin-top w3-margin-right" onclick="document.getElementById('id01').style.display='block'"><i class="fa fa-pencil"></i></a>



<?php
      $sql="SELECT * FROM usermail INNER JOIN users ON usermail.rec_id = users.email and usermail.mail_id='$id'";
      $rr=mysqli_query($con,$sql);
      $dd = mysqli_fetch_object($rr); 
     

        echo '<div id='.$dd->sen_id.'class="w3-container person">';
        echo "<br>";
        echo '<img class="w3-round  w3-animate-top" src="'.$dd->imagepath.'" style="width:20%;">';
        echo '<h5 class="w3-opacity">Subject: '.$dd->sub.'</h5>';
        echo '<h4><i class="fa fa-clock-o"></i> From '.$dd->sen_id.', '.$dd->recDT.'</h4>';
        echo '<a class="w3-button w3-light-grey" href="#">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>';
        echo '<a class="w3-button w3-light-grey" href="#">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>';
        echo '<hr>';
        echo '<p>'.$dd->msg.'</p>';
        echo "</div>";
  
?>
<!-- <div id="Jane" class="w3-container person">
  <br>
  <img class="w3-round w3-animate-top" src="userImages/Babul.JPG" style="width:20%;">
  <h5 class="w3-opacity">Subject: None</h5>
  <h4><i class="fa fa-clock-o"></i> From Jane Doe, Sep 25, 2015.</h4>
  <a class="w3-button w3-light-grey">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>
  <a class="w3-button w3-light-grey">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>
  <hr>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  <p>Forever yours,<br>Jane</p>
</div>

<div id="John" class="w3-container person">
  <br>
  <img class="w3-round w3-animate-top" src="userImages/Babul.JPG" style="width:20%;">
  <h5 class="w3-opacity">Subject: None</h5>
  <h4><i class="fa fa-clock-o"></i> From John Doe, Sep 23, 2015.</h4>
  <a class="w3-button w3-light-grey">Reply<i class="w3-margin-left fa fa-mail-reply"></i></a>
  <a class="w3-button w3-light-grey">Forward<i class="w3-margin-left fa fa-arrow-right"></i></a>
  <hr>
  <p>Welcome.</p>
  <p>That's it!</p>
</div> -->
     
</div>

<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}
function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show"; 
        x.previousElementSibling.className += " w3-red";
    } else { 
        x.className = x.className.replace(" w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-red", "");
    }
}

openMail("Borge")
function openMail(personName) {
    var i;
    var x = document.getElementsByClassName("person");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    x = document.getElementsByClassName("test");
    for (i = 0; i < x.length; i++) {
       x[i].className = x[i].className.replace(" w3-light-grey", "");
    }
    document.getElementById(personName).style.display = "block";
    event.currentTarget.className += " w3-light-grey";
}
</script>

<script>
var openTab = document.getElementById("firstTab");
openTab.click();
</script>

</body>
</html> 
