<?php
	/**
	 * This file is used to bcrypt a string.
	 * 
	 * Parameters
	 * 	string		The string to either encrypt or check against the bcrypt
	 * 	hash		The hash to validate the string against.
	 */
	include_once 'PasswordHash.php';
	
	$string = $_GET['string'];
	
	$crypt = $_GET['hash'];
	
	$phpass = new PasswordHash(12, false);	
	
	if(isset($crypt))
	{
		$isValid = $phpass->CheckPassword($string, $hash);
	
		if(crypt($string, $crypt) == $crypt)
		{
			$isValid = true;
		}
		else
		{
			$isValid = false;
		}
	
		echo $isValid;
	}
	else
	{
		$phpass = new PasswordHash(12, false);
		
		$hash = $phpass->HashPassword($string);

		echo $hash;
	}
?>