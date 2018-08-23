<?php
	/**
	 * This file updates the last time the user logged in.
	 * 
	 * URL GET EXAMPLE		http://intencityapp.com/dev/services/mobile/update_user_login.php?email=john.smith@gmail.com
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	//Constants for the response from the database.
	define(RESPONSE_UPDATED_LOGIN, "Updated user login");

	$email = $_POST['email'];

	// Query to update the user's login date.
	$updateLogin =  "UPDATE " . TABLE_USER . " SET " . COLUMN_LAST_LOGIN_DATE . " = CURDATE() WHERE Email = '" . $email . "'";
	
	//Create the account.
	mysqli_query($conn, $updateLogin);

	//Return the account was created.
	print json_encode(RESPONSE_UPDATED_LOGIN);
?>
