<?php
	/**
	 * This file adds a saved routine to the Routine table.
	 * 
	 * Accepts:
	 * 		user_id		The ID of the user to add the custom routine.
	 *		routine 	The name of the routine.
	 * 		inserts 	The exercise IDs we are inserting into the database.
	 * 
	 * EXAMPLE URL	
	 * http://intencity.fit/dev/services/mobile/set_routine.php?user_id=100&routine=Legs&inserts=10,20
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$userId = $_POST['user_id'];
	$routineName  = str_replace("'", "\'", $_POST['routine']);
	$v = $_POST['inserts'];
	$variables = explode(',', $v);
	$varLength = count($variables);

	$insert = "";

	$preExistingRoutine = mysqli_query($conn, "SELECT " . COLUMN_ROUTINE_NAME . " FROM " . TABLE_ROUTINE . " WHERE " . COLUMN_USER_ID . " = " . $userId . " AND " . COLUMN_ROUTINE_NAME . " = '" . $routineName . "' LIMIT 1;");

	if (mysqli_num_rows($preExistingRoutine) == 0)
	{
		$routineNumber = mysqli_query($conn, "SELECT " . COLUMN_EXERCISE_DAY . " FROM " . TABLE_ROUTINE . " WHERE " . COLUMN_USER_ID . " = " . $userId . " ORDER BY " . COLUMN_EXERCISE_DAY . " DESC LIMIT 1;");
		if ($row = mysqli_fetch_assoc($routineNumber))
		{
			$routineNumber = $row[COLUMN_EXERCISE_DAY];
			$routineNumber++;
		}
		else
		{
			$routineNumber = 0;
		}

		for ($i = 0; $i < $varLength; $i++)
		{
		    $insert .= "INSERT INTO " . TABLE_ROUTINE . "(" . COLUMN_USER_ID . "," . COLUMN_ROUTINE_NAME . "," . COLUMN_EXERCISE_DAY . "," . COLUMN_EXERCISE_ID . ") VALUES (" . $userId . ",'" . $routineName . "'," . $routineNumber . ",'" . $variables[$i] . "'); ";
		}

		$query = mysqli_multi_query($conn, $insert);
		if($query)
		{
			
			$response->send(STATUS_CODE_SUCCESS_ROUTINE_SAVED, NULL);
		}
		else
		{
			$response->send(STATUS_CODE_FAILURE_ROUTINE_SAVE, NULL);
		}
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_ROUTINE_EXISTS, NULL);
	}
?>