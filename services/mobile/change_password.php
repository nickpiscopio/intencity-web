<?php
	/**
	 * This file is supposed to get the password of a specifed user and email it to him or her.
	 */
	
	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../TextHash.php';
	include_once '../Response.php';

	// Utility class to create a JSON response.
	$response = new Response();

	$userId = strtolower($_POST['user_id']);
	$password = $_POST['old_password'];
	$new = $_POST['password'];
	
	// Get the user from the database.
	$query = mysqli_query($conn, "SELECT " . COLUMN_ID . ", " . COLUMN_PASSWORD . " FROM " . TABLE_USER . " WHERE " . COLUMN_ID . " = '" . $userId . "'");
	
	// Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);	

	$phpass = new TextHash(12, false);
	
	if($phpass->CheckText($password, $row[COLUMN_PASSWORD]))
	{	
		$hash = $phpass->HashText($new);
		
		$query = mysqli_query($conn, "UPDATE " . TABLE_USER . " SET " . COLUMN_PASSWORD . " = '" . $hash . "' WHERE " . COLUMN_ID . " = '" . $userId . "'");
	
		if($query)
		{
			$response->send(RESPONSE_SUCCESS_PASSWORD_CHANGE, NULL);
		}
		else
		{
			$response->send(RESPONSE_FAILURE_PASSWORD_CHANGE, NULL);
		}
	}
	else
	{			
		$response->send(RESPONSE_FAILURE_PASSWORD_INVALID, NULL);
	}
?>