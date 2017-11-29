<?php 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
	<div class="navbar-wrapper">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Sayeed's Shop</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="product_view.php">View Product</a></li>
                <li><a href="product_insert_form.php">Add Product</a></li>
                <li><a href="#order_product">Order List</a></li>
                <li><a href="subadminlist.php">SubAdmin List</a></li>
                <li><a href="">Customer List</a></li>
                <li><a href="sub_admin_reg_form.php" target="_blank">Create Sub-Admin</a></li>
                <li><a href="login/logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </nav>
    </div>
	
	<script src="../../js/bootstrap.min.js"></script>
  </body>
</html>