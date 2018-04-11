<?php
	/**
	 * This file retrieves the email and password from the database 
	 * and will return to the user whether the information provided is correct.
	 *
	 * URL GET EXAMPLE		http://intencity.fit/dev/services/mobile/user_credentials.php?user_id=100&email=dev@gmail.com&password=hello123
	 *
	 *						user_id 	(Optional) If user_id isn't set, then we are loggin in.
	 *									If user_id isn't set, then we are deleting the account.
	 *
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

	$userId = $_POST['user_id'];
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	
	if(empty($email))
	{
		$email = $_SESSION['email'];
	}

	$whereClause = (isset($userId)) ? 
						COLUMN_ID . " = " . $userId :
						COLUMN_EMAIL . " = '" . $email . "'";
	
	// Check to see if the account exists.
	$query = mysqli_query($conn, "SELECT " . COLUMN_ID . ", " . COLUMN_EMAIL . ", " . COLUMN_PASSWORD . ", " . COLUMN_ACCOUNT_TYPE . 
									" FROM " . TABLE_USER . 
									" WHERE " . $whereClause);
	
	// Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if($row[COLUMN_EMAIL] == $email || $row[COLUMN_ID] == $userId)
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