<?php 
	
	require_once '../config/database.php';
	require_once '../model/objects/user.php';
	require_once '../model/objects/error.php';
	
	

	$db = new Database();
	$db->getDatabase();

	// create a new user
	$user = new User($db->getConn());

	// create a object to get error
	$error = new Displayerror();

	// get data from form login
	if(isset($_POST['submit'])){
		// get data
		$email = $_POST['email'];
		$password = $_POST['password'];

		// check validate data
		if(empty($email)){

			$error->setEmailErr("Email is required");
			

		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		
      		$error->setEmailErr("Invalid email format");
    	}


		if(empty($password)){

			$error->setPassErr("Password is required");
		}
		
		
		if(empty($error->getEmailErr()) && empty($error->getPassErr())){


			if($user->readUser($email,$password)){

				$_SESSION['valid_user'] = $email;
				
			

			}else{

				$error->setErr("Email or Password is incorrect .Please enter again");
			}

		}


		
	}
	

 ?>