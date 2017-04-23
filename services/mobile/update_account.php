<?php
	/**
	 * This file updates a user's trial account to a full account.
	 * 
	 * URL GET EXAMPLE		http://intencityapp.com/dev/services/mobile/update_account.php?user_id=100&first_name=John&last_name=Smith&email=john.smith@gmail.com&password=hello123
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */

	// Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../TextHash.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	// Utility class to create a JSON response.
	$response = new Response();
	
	// Constants for having and not having beta access for Intencity.
	define(ACCOUNT_NORMAL, "N");

	$userId = $_POST['user_id'];
	
	// Capitalize first letter.
	$firstName = addslashes(ucfirst($_POST['first_name']));
	$lastName = addslashes(ucfirst($_POST['last_name']));

	// Changes the email to lowercase.
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];

	// We make the account type to be normal because we are creating a full account.
	$accountType = ACCOUNT_NORMAL;
	
	// Check to see if the email is already in use.
	$query = mysqli_query($conn, "SELECT " . COLUMN_EMAIL ." FROM " . TABLE_USER . " WHERE " . COLUMN_EMAIL . " = '" . $email . "'");

	// Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if($row[COLUMN_EMAIL] == $email)
	{
		// Return the account exists.
		$response->send(STATUS_CODE_FAILURE_EMAIL_ERROR, NULL);
	}
	else
	{
		$phpass = new TextHash(12, false);

		$hash = $phpass->HashText($password);

		$updateAccountQuery =  "UPDATE " . TABLE_USER .
									" SET " . COLUMN_EMAIL . "='" . $email . "',
									" . COLUMN_FIRST_NAME . "='" . $firstName . "', 
									" . COLUMN_LAST_NAME . "='" . $lastName . "', 
									" . COLUMN_PASSWORD . "='" . $hash . "', 
									" . COLUMN_ACCOUNT_TYPE . "='" . $accountType . "'" . 
									" WHERE " . COLUMN_ID . " = " . $userId . ";";
		
		// Update the the account.
		if (mysqli_multi_query($conn, $updateAccountQuery))
		{
			$response->send(STATUS_CODE_SUCCESS_ACCOUNT_UPDATED, NULL);
		}
		else
		{
			$response->send(STATUS_CODE_FAILURE_ACCOUNT_NOT_UPDATED, NULL);
		}
	}
?>
