<?php
	/**
	 * This file updates the last time the user logged in.
	 * 
	 * URL GET EXAMPLE		http://intencity.fit/dev/services/mobile/update_user_login.php?id=10
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../Time.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	// Utility class to create a JSON response.
	$response = new Response();

	$userId = $_POST['user_id'];

	$time = new Time();
	$now = $time->getMillis();

	// Query to update the user's login date.
	$updateLogin =  "UPDATE " . TABLE_USER . " SET " . COLUMN_LAST_LOGIN_DATE . " = " . $now . " WHERE " . COLUMN_ID . " = " . $userId;
	
	if (mysqli_query($conn, $updateLogin))
	{
		$response->send(STATUS_CODE_SUCCESS_DATE_LOGIN_UPDATED, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_DATE_LOGIN_UPDATE, NULL);
	}
?>
