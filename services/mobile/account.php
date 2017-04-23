<?php
	/**
	 * This file creates a new account only if the email hasn't already been used.
	 * 
	 * URL GET EXAMPLE		http://intencity.fit/dev/services/mobile/account.php?first_name=John&last_name=Smith&email=john.smith@gmail.com&password=hello123&account_type=n
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../TextHash.php';
	include_once '../Time.php';
	include_once '../Response.php';
	
	//Constants for having and not having beta access for Intencity.
	define(ACCOUNT_ADMIN, "A");
	define(ACCOUNT_BETA, "B");
	define(ACCOUNT_NORMAL, "N");
	define(ACCOUNT_TRIAL, "T");
	// Account for mobile trials.
	define(ACCOUNT_MOBILE_TRIAL, "M");	

	// Utility class to create a JSON response.
	$response = new Response();
	
	//Capitalize first letter.
	$firstName = addslashes(ucfirst($_POST['first_name']));
	$lastName = addslashes(ucfirst($_POST['last_name']));

	//Changes the email to lowercase.
	$email = strtolower($_POST['email']);
	$password = $_POST['password'];
	//Capitalizes the value recieved from the beta_access variable from the URL.
	$accountType = strtoupper($_POST['account_type']);
	
	//Makes the account a trial if it can't figure out what account type the user should be.
	if($accountType != ACCOUNT_ADMIN && $accountType != ACCOUNT_BETA && $accountType != ACCOUNT_NORMAL && $accountType != ACCOUNT_MOBILE_TRIAL)
	{
		$accountType = ACCOUNT_TRIAL;
	}
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, "SELECT " . COLUMN_EMAIL ." FROM " . TABLE_USER . " WHERE " . COLUMN_EMAIL . " = '" . $email . "'");

	//Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if($row[COLUMN_EMAIL] == $email)
	{
		// Return the account exists.
		$response->send(STATUS_CODE_FAILURE_EMAIL_ERROR, NULL);
	}
	else
	{
		$phpass = new TextHash(12, false);

		$hashedPassword = $phpass->HashText($password);

		$time = new Time();
		$now = $time->getMillis();

		$createAccountQuery =  "INSERT INTO " . TABLE_USER . " (" . COLUMN_EMAIL . ", " 
																	. COLUMN_CREATED_DATE . ", " 
																	. COLUMN_LAST_LOGIN_DATE . ", " 
																	. COLUMN_FIRST_NAME . ", " 
																	. COLUMN_LAST_NAME . ",  " 
																	. COLUMN_PASSWORD . ", " 
																	. COLUMN_ACCOUNT_TYPE . ", " 
																	. COLUMN_EARNED_POINTS . ") 
															VALUES ('" . $email . "', " 
																		. $now . ", " 
																		. $now . ", 
																		'" . $firstName . "', 
																		'" . $lastName . "', 
																		'" . $hashedPassword . "', 
																		'" . $accountType . "', 100);
								SELECT " . COLUMN_ID . "
								FROM " . TABLE_USER . "
								WHERE " . COLUMN_EMAIL . "='" . $email . "';";

		if (mysqli_multi_query($conn, $createAccountQuery))
		{
			if (mysqli_next_result($conn))
			{
		        // Store first result set.
		        if ($result = mysqli_store_result($conn)) {
		            $row = mysqli_fetch_row($result);

		            $userId = $row[0];
		            // The user was created if the ID is greater than 0.
					if($userId > 0)
					{
						

						$insertEquipmentQuery = "INSERT INTO " . TABLE_USER_EQUIPMENT . "(" . TABLE_USER_EQUIPMENT . "." . COLUMN_USER_ID . "," 
																							. TABLE_USER_EQUIPMENT . "." .  COLUMN_EQUIPMENT_NAME . ")
													SELECT '" . $userId . "', " 
																. TABLE_EQUIPMENT . "." . COLUMN_EQUIPMENT_NAME .
													" FROM " . TABLE_EQUIPMENT .
													" WHERE " . TABLE_EQUIPMENT . "." . COLUMN_EQUIPMENT_NAME . " != 'NULL'" .
													" GROUP BY " . TABLE_EQUIPMENT . "." . COLUMN_EQUIPMENT_NAME . ";";

						mysqli_multi_query($conn, $insertEquipmentQuery);

						$response->send(STATUS_CODE_SUCCESS_ACCOUNT_CREATION, $userId);
					}
					else
					{
						$response->send(STATUS_CODE_FAILURE_ACCOUNT_CREATION, NULL);
					}
		       
		            mysqli_free_result($result);
		        }
		        else
		        {
		        	$response->send(STATUS_CODE_FAILURE_ACCOUNT_CREATION, NULL);
		        }
		    }
		    else
	        {
	        	$response->send(STATUS_CODE_FAILURE_ACCOUNT_CREATION, NULL);
	        }
		}
		else
		{
			$response->send(STATUS_CODE_FAILURE_ACCOUNT_CREATION, NULL);
		}		
	}
?>
