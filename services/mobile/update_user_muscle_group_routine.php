<?php
	/**
	 * This file is to delete muscle group routines from the UserMuscleGroupRoutine table.
	 *
	 * Accepts:
	 *		user_id		The user id of the user.
	 * 		remove		The equipment to insert to the database. Separate with a "|".
	 * 
	 * EXAMPLE URL	http://intencity.fit/dev/services/mobile/update_user_muscle_group_routine.php?user_id=100&remove=Upper Back, Lower Back, L| Cardio %26 Chest
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$userId = $_POST['user_id'];
	$remove = $_POST['remove'];
	
	$deleteQuery = "";

	if (isset($remove))
	{
		$remove = explode("|", $remove);

		$total = count($remove);
		
		for($z = 0; $z < $total; $z++)
		{
			$deleteQuery .= "DELETE FROM " . TABLE_USER_MUSCLE_GROUP_ROUTINE . " WHERE " . COLUMN_USER_ID . "=" . $userId . " AND " . COLUMN_DISPLAY_NAME . " = '" . $remove[$z] . "'; ";
		}
	}

	$query = mysqli_multi_query($conn, $deleteQuery);

	//Check if the query was successful.
	if($query)
	{
		$response->send(STATUS_CODE_SUCCESS_MUSCLE_GROUP_UPDATED, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_MUSCLE_GROUP_UPDATED, NULL);
	}
?>