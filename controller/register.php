<?php 
	

	require_once '../config/database.php';
	require_once '../model/objects/user.php';
	require_once '../model/objects/error.php';
	// start a session 
	session_start();
	

	$db = new Database();
	$db->getDatabase();

	$user = new User($db->getConn());

	$error = new Displayerror();

	// get data from register form
	if(isset($_POST['submit'])){
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$phonenum = $_POST['phonenum'];
		$password = $_POST['password'];
	

		// check validate data
		if(empty($firstname)){

			$error->setFirstnameErr("Firstname is required");
			

		}elseif(!preg_match("/^[a-zA-Z ]*$/",$firstname)){

				$error->setFirstnameErr("Only letters and white space allowed");
		}


		if(empty($lastname)){
			$error->setLastnameErr("Lastname is required");

		}elseif(!preg_match("/^[a-zA-Z ]*$/",$lastname)){

				$error->setLastnameErr("Only letters and white space allowed");
		}


		if(empty($email)){

			$error->setEmailErr("Email is required");

		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		
      		$error->setEmailErr("Invalid email format");
    	}
		else if($user->emailExist($email)){

			$error->setEmailErr("Email is exist.Please choose anothor one.");
			
		}else{

		}

		if(empty($phonenum)){

		}else if(!preg_match('/^(01[269]|09|08)[0-9]{8}$/',$phonenum)){
			$error->setPhoneErr("Phone number is incorrect");
		}else{

		}

		if(empty($password)){
			$error->setPassErr("Password is required");

		}else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%]{8,}$/',$password)){

				$error->setPassErr("Password have least 8 chars,least uppercase,lowercase,one number");
		}

		
		if(empty($error->getFirstnameErr()) && empty($error->getLastnameErr()) && empty($error->getEmailErr()) && empty($error->getPhoneErr()) && empty($error->getPassErr())){

			if($user->createUser($firstname,$lastname,$email,$phonenum,$password)){

				// if ok ,save user
				$_SESSION['valid_user'] = $email;
				
				header('Location:layout_login.php');

			}else{
				$error->setErr("Could not register.Please try again");
			}
		}
			
	}
	
 ?>