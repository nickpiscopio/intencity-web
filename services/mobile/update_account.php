<?php
	/**
	 * This file updates a user's trial account to a full account.
	 * 
	 * URL GET EXAMPLE		http://intencityapp.com/dev/services/mobile/update_account.php?trial_email=trialemail@intencity.fit&first_name=John&last_name=Smith&email=john.smith@gmail.com&password=hello123
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */

	// Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../TextHash.php';
	
	// Constants for having and not having beta access for Intencity.
	define(ACCOUNT_NORMAL, "N");
	// Account for mobile trials.
	define(ACCOUNT_MOBILE_TRIAL, "M");
	
	// Constants for the response from the database.
	define(RESPONSE_EMAIL_ERROR, "Email already exists");
	define(RESPONSE_ACCOUNT_UPDATED, "Account updated");
	
	// Capitalize first letter.
	$firstName = addslashes(ucfirst($_POST['first_name']));
	$lastName = addslashes(ucfirst($_POST['last_name']));

	// Changes the email to lowercase.
	$trialEmail = strtolower($_POST['trial_email']);
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
		print json_encode(RESPONSE_EMAIL_ERROR);
	}
	else
	{
		$phpass = new TextHash(12, false);

		$hash = $phpass->HashText($password);

		$updateAccountQuery =  "UPDATE " . TABLE_USER .
									" SET " . COLUMN_EMAIL . "='" . $email . "',
									" . COLUMN_CREATED_DATE . "=CURDATE(), 
									" . COLUMN_FIRST_NAME . "='" . $firstName . "', 
									" . COLUMN_LAST_NAME . "='" . $lastName . "', 
									" . COLUMN_PASSWORD . "='" . $hash . "', 
									" . COLUMN_ACCOUNT_TYPE . "='" . $accountType . "', 
									" . COLUMN_EARNED_POINTS . "=100, 
									" . COLUMN_SHOW_WELCOME . "=0 
									WHERE " . COLUMN_EMAIL . "='" . $trialEmail . "';
								UPDATE " . TABLE_EXERCISE_PRIORITY . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_EXERCISE_PRIORITY . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_BADGE . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_USER_MEDIA . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_USER_EQUIPMENT . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_SETTINGS . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_ROUTINE . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_POST . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_FOLLOWING . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_EXCLUSION . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_CURRENT_ROUTINE . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_COMPLETED_MUSCLE_GROUP . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_COMMENT . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';
								UPDATE " . TABLE_COMPLETED_EXERCISE . 
									" SET " . COLUMN_EMAIL ."='" . $email ."' 
									WHERE " . COLUMN_EMAIL ."='" . $trialEmail ."';";
		
		// Update the the account.
		mysqli_multi_query($conn, $updateAccountQuery);
	
		// Return the account was created.
		print json_encode(RESPONSE_ACCOUNT_UPDATED);
	}
?>
