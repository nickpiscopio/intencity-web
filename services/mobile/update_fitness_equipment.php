<?php
	/**
	 * This file is to insert equipment into the database after it deletes the old records first.
	 * 
	 * Accepts:
	 * 		inserts(0-n)	The equipment to insert to the database. Separate with a ",".
	 * 
	 * EXAMPLE URL	http://intencity.fit/dev/services/mobile/update_fitness_equipment.php?user_id=100&display_name=Home&saved_location=123 Saved Road&location=1234 Street Road&inserts=Cable Pull,Treadmill,Roman Chair
	 * 
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$userId = $_POST['user_id'];
	$displayName  = str_replace("'", "\'", $_POST['display_name']);
	$savedlocation = $_POST['saved_location'];
	$location = $_POST['location'];
	$inserts = $_POST['inserts'];
	
	$insertQuery = "";

	// Deletes every time regardless of whether we are inserting or updating.
	$insertQuery .= "DELETE FROM  " . TABLE_USER_EQUIPMENT . " WHERE " . COLUMN_USER_ID . "='" . $userId . "' AND (" . COLUMN_LOCATION . "='" . $savedlocation ."' OR " . COLUMN_LOCATION . "='" . $location ."'); ";	

	if (isset($inserts))
	{
		$inserts = explode(",", $inserts);

		$insertTotal = count($inserts);
		
		for($z = 0; $z < $insertTotal; $z++)
		{
			$insertQuery .= "INSERT INTO " . TABLE_USER_EQUIPMENT . " (" . COLUMN_DISPLAY_NAME . "," . COLUMN_LOCATION . "," . COLUMN_USER_ID . ", " . COLUMN_EQUIPMENT_NAME . ") VALUES ('" . $displayName . "','" . $location . "','" . $userId . "', '" . $inserts[$z] . "'); ";
		}
	}

	$query = mysqli_multi_query($conn, $insertQuery);

	//Check if the query was successful.
	if($query)
	{		
		$response->send(STATUS_CODE_SUCCESS_FITNESS_EQUIPMENT_UPDATED, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_FITNESS_EQUIPMENT_UPDATE, NULL);
	}
?>