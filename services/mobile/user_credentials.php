<?php
	/**
	 * This file retrieves the email and password from the database 
	 * and will return to the user whether the information provided is correct.
	 *
	 * URL GET EXAMPLE		http://intencityapp.com/services/user_credentials.php?email=nick.piscopio@gmail.com&password=hello123
	 * 						This example does not work when we are using $_GET. We ARE using $_GET.
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../TextHash.php';
	include_once '../Response.php';

	// Utility class to create a JSON response.
	$response = new Response();
	
	//Constants for the response from the database.
	define("RESPONSE_VALID_CREDENTIALS", "Valid credentials");
	define("RESPONSE_PASSWORD_ERROR", "Invalid password");
	define("RESPONSE_EMAIL_ERROR", "Could not find email");

	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	
	if(empty($email))
	{
		$email = $_SESSION['email'];
	}
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, "SELECT " . COLUMN_ID . ", " . COLUMN_EMAIL . ", " . COLUMN_PASSWORD . ", " . COLUMN_ACCOUNT_TYPE . " FROM " . TABLE_USER . " WHERE " . COLUMN_EMAIL . " = '" . $email . "'");
	
	//Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if($row[COLUMN_EMAIL] == $email)
	{
		$phpass = new TextHash(12, false);
		
		if($phpass->CheckText($password, $row[COLUMN_PASSWORD]))
		{
			$response->send(STATUS_CODE_SUCCESS_CREDENTIALS_VALID, $row);
		}
		else
		{			
			$response->send(STATUS_CODE_FAILURE_CREDENTIALS_PASSWORD_INVALID, NULL);
		}
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_CREDENTIALS_EMAIL_INVALID, NULL);
	}
?>