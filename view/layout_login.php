<?php 
	session_start();
	
	require_once 'form_fns.php';
	require_once '../controller/login.php';
	require_once '../model/objects/error.php';
	
	// If user is not logged ,display form login else display welcome page

	if(!isset($_SESSION['valid_user'])){
		// display header
		display_html_header("Login");

		// display login form 
		display_login_form($error);
		$error = null;
		// display footer
		display_html_footer();


	}else{
		
		// display header
		display_html_header("Index");

		// display register form
		display_html_index();

		// display footer
		display_html_footer();


	}

 ?>