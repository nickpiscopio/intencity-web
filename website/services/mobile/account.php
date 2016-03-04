<?php
	/**
	 * This file creates a new account only if the email hasn't already been used.
	 * 
	 * URL GET EXAMPLE		http://intencityapp.com/dev/services/account.php?first_name=John&last_name=Smith&email=john.smith@gmail.com&password=hello123&account_type=n
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../PasswordHash.php';
	
	//Constants for having and not having beta access for Intencity.
	define(ACCOUNT_ADMIN, "A");
	define(ACCOUNT_BETA, "B");
	define(ACCOUNT_NORMAL, "N");
	define(ACCOUNT_TRIAL, "T");
	// Account for mobile trials.
	define(ACCOUNT_MOBILE_TRIAL, "M");
	
	//Constants for the response from the database.
	define(RESPONSE_EMAIL_ERROR, "Email already exists");
	define(RESPONSE_ACCOUNT_CREATED, "Account created");
	
	//Capitalize first letter.
	$firstName = ucfirst($_POST['first_name']);
	$lastName = ucfirst($_POST['last_name']);
	//Changes the email to lowercase.
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	//Capitalizes the value recieved from the beta_access variable from the URL.
	$accountType = strtoupper($_POST['account_type']);
	
	//Makes the account a trial if it can't figure out what account type the user should be.
	if($accountType != ACCOUNT_ADMIN && $accountType != ACCOUNT_BETA && $accountType != ACCOUNT_NORMAL && $accountType != ACCOUNT_MOBILE_TRIALd)
	{
		$accountType = ACCOUNT_TRIAL;
	}
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, "SELECT " . COLUMN_EMAIL ." FROM " . TABLE_USER . " WHERE " . COLUMN_EMAIL . " = '" . $email . "'");

	//Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if($row[COLUMN_EMAIL] == $email)
	{
		//Return the account exists.
		print json_encode(RESPONSE_EMAIL_ERROR);
	}
	else
	{
		$phpass = new PasswordHash(12, false);

		$hash = $phpass->HashPassword($password);

		$createAccountQuery =  "INSERT INTO User (" . COLUMN_EMAIL . ", " . COLUMN_CREATED_DATE . " , " . COLUMN_FIRST_NAME . ", " . COLUMN_LAST_NAME . ",  " . COLUMN_PASSWORD . ", " . COLUMN_ACCOUNT_TYPE . ", " . COLUMN_EARNED_POINTS . ", " . COLUMN_SHOW_WELCOME . ") VALUES 
									('" . $email . "', CURDATE() , '" . $firstName . "', '" . $lastName . "', '" . $hash . "', '" . $accountType . "', 100, 1);
									INSERT INTO Settings (Email) VALUES ('" . $email . "');
									INSERT INTO " . TABLE_USER_EQUIPMENT . "(" . TABLE_USER_EQUIPMENT . "." . COLUMN_EMAIL . "," . TABLE_USER_EQUIPMENT . "." .  COLUMN_EQUIPMENT_NAME . ")
										SELECT '" . $email . "', " . TABLE_EQUIPMENT . "." . COLUMN_EQUIPMENT_NAME .
										" FROM " . TABLE_EQUIPMENT .
										" WHERE " . TABLE_EQUIPMENT . "." . COLUMN_EQUIPMENT_NAME . " != 'NULL'" .
										" GROUP BY " . TABLE_EQUIPMENT . "." . COLUMN_EQUIPMENT_NAME . ";";
		
		//Create the account.
		mysqli_multi_query($conn, $createAccountQuery);
	
		//Return the account was created.
		print json_encode(RESPONSE_ACCOUNT_CREATED);
	}
?>
