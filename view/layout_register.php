<?php 
	require_once 'form_fns.php';
	require_once '../controller/register.php';
	require_once '../model/objects/error.php';

	

		// display header
		display_html_header("Register");

		// display register form
		display_register_form($error);

		// display footer
		display_html_footer();
 ?>