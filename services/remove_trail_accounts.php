<?php
	/**
	 * This file deletes trial accounts that are over a week old.
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';
		
	//Constants for having and not having beta access for Intencity.
	define(ACCOUNT_TRIAL, "T");
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, "CALL removeTrialAccounts()");
?>
