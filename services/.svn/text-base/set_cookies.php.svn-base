<?php
	/**
	 * This file sets the cookies for user login for Intencity.
	 */
	include_once 'random_generator.php';

	$expire = time() + 60 * 60 * 24 * 30;
	
	$email = $_POST['email'];
	$token = getToken(16);
	
	setcookie("email", $email, $expire, "/");
	setcookie("cookie_token", $token, $expire, "/");
	
	print json_encode($token);
?>