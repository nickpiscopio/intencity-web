<?php
	/**
	 * This file is to delete routines from the Routine table.
	 *
	 * Accepts:
	 *		user_id 	The ID of the user.
	 * 		remove		The equipment to insert to the database. Separate with a "|".
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev/services/mobile/update_user_routine.php?user_id=100&remove=Yolo|Routine 3/11/2014
	 */

	// Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$userId = $_POST['user_id'];
	$remove  = str_replace("'", "\'", $_POST['remove']);	
	
	$deleteQuery = "";

	if (isset($remove))
	{
		$remove = explode("|", $remove);

		$total = count($remove);
		
		for($z = 0; $z < $total; $z++)
		{
			$deleteQuery .= "DELETE FROM " . TABLE_ROUTINE . " WHERE " . COLUMN_USER_ID . "=" . $userId . " AND " . COLUMN_ROUTINE_NAME . " = '" . $remove[$z] . "'; ";
		}
	}

	$query = mysqli_multi_query($conn, $deleteQuery);

	//Check if the query was successful.
	if($query)
	{		
		$response->send(STATUS_CODE_SUCCESS_USER_ROUTINE_UPDATED, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_USER_ROUTINE_UPDATE, NULL);
	}
?>