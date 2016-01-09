<?php	
	include 'services/start_session.php';
	session_unset();
	session_destroy();	
	
	$expire = time() - 3600;
	
	setcookie("email", "", $expire, "/");
	setcookie("cookie_token", "", $expire, "/");
	
	header("Location: sign_in.php");
?>
