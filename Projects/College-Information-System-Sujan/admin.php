<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
body{
	background:url(image/Careers-Banner-background-fixed_0.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#footer
     {
	font-style:italic;	
	}
</style><br/><br/><br/><br/>
</head>

<body>
<form action="ad_insert.php" method="POST">
	<h1 align="center" id="h" style=" text-decoration:none; color:#CCC"><i><b><big>Please Login Here........</big></b></i></h1>
        <table align="center" id="t">
		<tr> <?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
          <tr>
            <td width="113" style="color:#CCC"><b>User name :</b></td>
            <td width="215" >
              <input name="username" type="text"  size="40"/></td>
          </tr>
          <tr>
            <td style="color:#CCC"><b>Password :</b></td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
            <td colspan="8" align="center">
			<input type="submit" name="sub" value="Login" /></td>
            </tr>
            
            
			
       </table>
	</form></div></div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<div id="footer">
 <p style="color:#999"><b><big><i>A Graphics Design</i></big></b></p>
</div>

</body>
</html>