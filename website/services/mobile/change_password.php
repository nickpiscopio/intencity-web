<?php
	/**
	 * This file is supposed to get the password of a specifed user and email it to him or her.
	 */
	
	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../PasswordHash.php';

	define("RESPONSE_PASSWORD_ERROR", "Invalid password");

	$email = strtolower($_POST['email']);
	$password = $_POST['oldPassword'];
	$new = $_POST['password'];
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, "SELECT " . COLUMN_EMAIL . ", " . COLUMN_PASSWORD . " FROM " . TABLE_USER . " WHERE " . COLUMN_EMAIL . " = '" . $email . "'");
	
	//Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);	

	$phpass = new PasswordHash(12, false);
	
	if($phpass->CheckPassword($password, $row[COLUMN_PASSWORD]))
	{	
		$hash = $phpass->HashPassword($new);
		
		$query = mysqli_query($conn, "UPDATE User SET Password = '" . $hash . "' WHERE Email = '" . $email . "'");
	
		if($query)
		{
			print json_encode(SUCCESS);
		}
		else
		{
			print json_encode(FAILURE);
		}
	}
	else
	{			
		print json_encode(RESPONSE_PASSWORD_ERROR);
	}
?>