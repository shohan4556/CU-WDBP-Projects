<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="scripts/quizzer.js" type="text/javascript"></script>
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/style.css">
  <meta charset="UTF-8">
  <title>Add Record Form</title>
</head>
<body>
    
   <div id="header">

<?php include("header/header.php");   ?>

</div>

<div id="menu"> 

<?php include("menu/menu1.php");   ?>

	</div>
	<div id="menu1"> 

<?php include("menu/menu.php");   ?>

	</div>
	
	<div id="sbar">
    
    <center><h2 style="font-style:italic;"><b>Option</b></h2></center>
    
    <?php include("sidebar/leftsidebar.php");   ?>
    
</div>
	<div id="sbar1"></div>
	
	<div id="cont"> 
    
  <center>
    <form action="insert.php" method="post">
      <div id="f1" name="f1">
        <hr width=50%><span>Quiz name : </span><input type="text" name="quizName" id="quizName"><br><hr width=50%>
        <span>Question : </span><input type="text" name="q0" id="q0"><br>
        <span>Option 1 : </span><input type=radio name="a0" value=1 checked="checked"><input type="text" name="a10" id="a10" ><br>
        <span>Option 2 : </span><input type=radio name="a0" value=2><input type="text" name="a20" id="a20"><br>
        <span>Option 3 : </span><input type=radio name="a0" value=3><input type="text" name="a30" id="a30"><br>
        <span>Option 4 : </span><input type=radio name="a0" value=4><input type="text" name="a40" id="a40"><br>
      </div>
      <br>
      <input type=button class=btn onClick=addQ() value="Add question">
      <!--<input type=button class=btn onClick=removeQ() value="Remove question">-->
      <br>
        <input type="submit" class=btn value="Submit">
    </form>
  </center>
    
   </div>
	
	<div id="footer">

<?php include("footer/footer.php");   ?>

</div>
     
    
</body>
</html>
