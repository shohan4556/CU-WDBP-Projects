<?php include 'inc/header.php';?>
        <?php 
		    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login']))
		    {
		        $customerLogin = $cmr->customerLogin($_POST);
		    }
		?>

 <div class="main">
    <div class="content">
    	 <div class="login_panel">
    	 	<?php
    			if (isset($customerLogin))
    			{
    				echo $customerLogin;
    			}
    		?>
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<form action="" method="post">
                	<input name="email" placeholder="Email" type="text">
                    <input name="password" placeholder="password" type="password">
          			<div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
          	</form>
        </div>
        <?php 
		    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register']))
		    {
		        $customerReg = $cmr->customerRegistration($_POST);
		    }
		?>
    	<div class="register_account">
    		<?php
    			if (isset($customerReg))
    			{
    				echo $customerReg;
    			}
    		?>
    		<h3>Register New Account</h3>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="name" placeholder="Name" />
							</div>
							
							<div>
							   <input type="text"  name="city" placeholder="City" />
							</div>
							
							<div>
								<input type="text"  name="zip" placeholder="Zip-Code" />
							</div>
							<div>
								<input type="text"  name="email" placeholder="Email" />
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text"  name="address" placeholder="Address" />
						</div>
						<div>
							<input type="text" name="country" placeholder="country" />
						</div>
		    			        
	
		           <div>
		          <input type="text" name="phone" placeholder="Phone" />
		          </div>
				  
				  <div>
					<input type="password" name="password" placeholder="Password" />
				</div>
		    	</td>
		    </tr> 
		    </tbody></table> 
		   <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>

		   </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
   <?php include 'inc/footer.php';?>
