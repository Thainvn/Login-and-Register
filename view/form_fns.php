<?php 
	function display_html_header($title){
		?>
		<!DOCTYPE html>
			<html lang="en">
			<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				 
				<title><?php echo $title; ?></title>
				<!-- Bootstrap CSS -->
				<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" media="screen" />
				
				<link rel="stylesheet" href="../libs/css/custom/style.css">
			</head>
			<body>
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="#">ThaiFood</a>
				    </div>
				    <ul class="nav navbar-nav">
				      <li class="active"><a href="#">Home</a></li>
				      <li><a href="layout_login.php">Index</a></li>
				  
				    </ul>
				    <ul class="nav navbar-nav navbar-right">
				    	<?php
				    	if($title == "Index"){
				    		echo ' <li><a href="layout_logout.php" ><span class="glyphicon glyphicon-user"></span> Logout</a></li>';
				    		
				    	}else{
		    				echo ' <li><a href="layout_register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>';
		    		  		echo '<li><a href="layout_login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
		    	}
				     	
				      ?>
				    </ul>
				  </div>
				</nav>
				<div class="container">
					
						<h1><?php echo $title;?></h1>
					
					<div>
						
		<?php
	}

	function display_html_footer(){
		?>			
						
					</div>
				</div>
				    </div>
				    <!-- /container -->
				 
				<!-- jQuery library -->
				<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
				 
				<!-- Bootstrap JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
				
			</body>
			</html>
		<?php
	}

	function display_login_form($error){
		 
		?>
		<div class='col-sm-6 col-md-4 col-md-offset-4'>
		 
		   <!--  alert messages will be here actual HTML login form -->
			<?php
			
			if($error->getErr()){

		    	echo "<div class='alert alert-danger'> ";
		    		echo $error->getErr();
		    	echo "</div>";
			}
			?>
		   <div class='account-wall'>
		        <div class='tab-content'>
		            <div class='tab-pane active' >
		                <img class='profile-img' src='../libs/images/login_icon.png'>

		               
		               <form class='form-signin' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method='post' id="login_form">

		               		<span class="error"><?php echo $error->getEmailErr(); ?></span>
		                    <input type='text' name='email' class='form-control' placeholder='Email' autofocus />
		                    
							<span class="error"><?php echo $error->getPassErr(); ?></span>
		                   <input type='password' name='password' class='form-control' placeholder='Password' />
		                   

		                   <input type='submit' name="submit" class='btn btn-lg btn-primary btn-block' value='Log In' />

		                </form>

		            </div>
		        </div>
		        <p class="text-center">New here?<a href="layout_register.php"> Create an account</a></p>
		    </div>
		 
		</div>

		<?php
		
	}

	function display_register_form ($error){
	 	
		?>
			
			<form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method='post' id="register_form" >
			 
			    <table class='table table-responsive'>
			 
			        <tr>
			            <td class='width-30-percent'>Firstname</td>
			            <td><input type='text' name='firstname' class='form-control'  value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname'], ENT_QUOTES) : "";  ?>" /></td>
			            <td><span class="error"><?php echo $error->getFirstnameErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Lastname</td>
			            <td><input type='text' name='lastname' class='form-control'  value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname'], ENT_QUOTES) : "";  ?>" /></td>
			            <td><span class="error"><?php echo $error->getLastnameErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Contact Number</td>
			            <td><input type='text' name='phonenum' class='form-control'  value="<?php echo isset($_POST['phonenum']) ? htmlspecialchars($_POST['phonenum'], ENT_QUOTES) : "";  ?>" /></td>
			              <td><span class="error"><?php echo $error->getPhoneErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Email</td>
			            <td><input type='email' name='email' class='form-control'  value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : "";  ?>" /></td>
			              <td><span class="error"><?php echo $error->getEmailErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td>Password</td>
			            <td><input type='password' name='password' class='form-control'></td>
			             <td><span class="error"><?php echo $error->getPassErr(); ?></span></td>
			        </tr>
			 
			        <tr>
			            <td></td>
			            <td>
			                <button type="submit" name = "submit" class="btn btn-primary">
			                    <span class="glyphicon glyphicon-plus"></span> Register
			                </button>
			            </td>
			        </tr>
			 
			    </table>
			</form>
		<?php
	}


	function display_html_index(){
		?>
		
		 
		<h2>Welcome <?php echo $_SESSION['valid_user']; ?></h2>

		<?php
	}

	function do_html_url($link,$title){
		?>
		<a href="<?php echo $link; ?>"><?php echo $title;?></a>
		<?php
	}

	
 ?>