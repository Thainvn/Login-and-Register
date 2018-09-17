<?php 
	require_once '../view/form_fns.php';
	

	session_start();
	$old_username = isset($_SESSION['valid_user']) ? $_SESSION['valid_user'] : "" ;

	unset($_SESSION['valid_user']);
	$result_dest = session_destroy();


 ?>