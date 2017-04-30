<?php
	/**
	 * This file is to insert equipment into the database after it deletes the old records first.
	 * 
	 * Accepts:
	 * 		inserts(0-n)	The equipment to insert to the database. Separate with a ",".
	 * 
	 * EXAMPLE URL	http://intencity.fit/dev/services/mobile/update_exercise_priority.php?user_id=100&exercises=1,2,&priorities=50,-25
	 */

	// Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	// NEEDS TO BE CHANGED TO A POST.
	$userId = $_POST['user_id'];
	$exercises = $_POST['exercises'];
	$priorities = $_POST['priorities'];

    $PRIORITY_LIMIT_MID = 20;
    $PRIORITY_LIMIT_LOWER = 0;
	
	$insertQuery = "";
	$insertQuery .= "DELETE FROM " . TABLE_EXCLUSION . " WHERE " . COLUMN_USER_ID . "=" . $userId . "; ";
	$insertQuery .= "DELETE FROM " . TABLE_EXERCISE_PRIORITY . " WHERE " . COLUMN_USER_ID . "=" . $userId . "; ";

	if (isset($exercises))
	{
		$exercises = explode(",", $exercises);
		$priorities = explode(",", $priorities);

		$total = count($exercises);
		
		for ($i = 0; $i < $total; $i++)
		{
			$priority = $priorities[$i];

			if (($priority > $PRIORITY_LIMIT_LOWER && $priority < $PRIORITY_LIMIT_MID) || $priority > $PRIORITY_LIMIT_MID)
			{
				$insertQuery .= "INSERT INTO " . TABLE_EXERCISE_PRIORITY . " (" . COLUMN_USER_ID . "," . COLUMN_EXERCISE_ID . ", " . COLUMN_PRIORITY . ") 
								VALUES (" . $userId . ",'" . $exercises[$i] . "'," . $priority . "); ";
			}
			else if ($priority == $PRIORITY_LIMIT_LOWER)
			{
				$insertQuery .= "INSERT INTO " . TABLE_EXCLUSION . " (" . COLUMN_USER_ID . "," . COLUMN_EXCLUDE_FOREVER . ", " . COLUMN_EXERCISE_ID . ", " . COLUMN_EXCLUSION_TYPE . ") 
								VALUES (" . $userId . ", 1, '" . $exercises[$i] . "', 'E'); ";
			}
		}
	}	

	$query = mysqli_multi_query($conn, $insertQuery);

	// Check if the query was successful.
	if($query)
	{		
		$response->send(STATUS_CODE_SUCCESS_EXERCISE_PRIORITY_UPDATED, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_EXERCISE_PRIORITY_UPDATE, NULL);
	}
?>