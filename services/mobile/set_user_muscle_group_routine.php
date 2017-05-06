<?php
	/**
	 * This file adds a custom muscle group routine.
	 * 
	 * Accepts:
	 * 		user_id		The ID of the user.
	 * 		inserts 	The muscle groups we are inserting into the database.
	 * 
	 * EXAMPLE URL	
	 * http://intencity.fit/dev/services/mobile/set_user_muscle_group_routine.php?user_id=dev@gmail.com&inserts=Upper%20Back,Lower%20Back
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$userId  = $_POST['user_id'];
	$v  = $_POST['inserts'];
	$variables = explode(',', $v);
	$varLength = count($variables);

	$routineName = "";

	for ($z = 0; $z < $varLength; $z++)
	{
		if ($z == 0)
		{
			$routineName .= $variables[$z];

			$select = "SELECT " . COLUMN_MUSCLE_GROUP_NAME . " FROM " . TABLE_CUSTOM_ROUTINE_MUSCLE_GROUP . " WHERE ";
		}
		else
		{
			$routineName .= ($varLength > 2 ? "," : "") . ($z == $varLength - 1 ? " & " : " ") . $variables[$z];	
		}

		$select .= ($z > 0 ? " OR " : "") . COLUMN_DISPLAY_NAME . " = '" . $variables[$z] . "'";
	}

	// Check to see if the routine already exists in the database.
	// We only want to insert the routine if it exists.
	$routineSelect = mysqli_query($conn, "SELECT " . COLUMN_DISPLAY_NAME . " FROM " . TABLE_USER_MUSCLE_GROUP_ROUTINE . " WHERE " . COLUMN_USER_ID . " = " . $userId . " AND " . COLUMN_DISPLAY_NAME . " = '" . $routineName . "'");

	if ($row1 = mysqli_fetch_assoc($routineSelect))
	{
		$response->send(STATUS_CODE_SUCCESS_MUSCLE_GROUP_SET, NULL);
	}
	else
	{
		$insert = "";

		// Check if the user has a custom routine already.
		// If he or she does, then increment the routine number by 1.
		$routineNumber = mysqli_query($conn, "SELECT " . COLUMN_ROUTINE_NUMBER . " FROM " . TABLE_USER_MUSCLE_GROUP_ROUTINE . " WHERE " . COLUMN_USER_ID . " = " . $userId . " ORDER BY " . COLUMN_ROUTINE_NUMBER . " DESC LIMIT 1;");
		if ($row = mysqli_fetch_assoc($routineNumber))
		{
			$routineNumber = $row[COLUMN_ROUTINE_NUMBER];
			$routineNumber++;
		}
		else
		{
			// We start at 7 because 7 would be the next number in the list 
			// if we continued from the default list of routines from the 
			// MuscleGroupRoutine table.
			$routineNumber = 7;
		}

		$muscleGroupNameQuery = mysqli_query($conn, $select);

		while($row = mysqli_fetch_assoc($muscleGroupNameQuery))
		{
	    	$muscleGroupNames[] = $row[COLUMN_MUSCLE_GROUP_NAME];
		}
		
		$muscleGroupNameLength = count($muscleGroupNames);

		for ($i = 0; $i < $muscleGroupNameLength; $i++)
		{
			$muscleGroup = $muscleGroupNames[$i];

		    $insert .= "INSERT INTO " . TABLE_USER_MUSCLE_GROUP_ROUTINE . "(" . COLUMN_USER_ID . "," . COLUMN_MUSCLE_GROUP_NAME . "," . COLUMN_ROUTINE_NUMBER . "," . COLUMN_DISPLAY_NAME . ") VALUES (" . $userId . ",'" . $muscleGroup . "'," . $routineNumber . ",'" . $routineName . "'); ";
		}

		$query = mysqli_multi_query($conn, $insert);
		if($query)
		{
			$response->send(STATUS_CODE_SUCCESS_MUSCLE_GROUP_SET, NULL);
		}
		else
		{
			$response->send(STATUS_CODE_FAILURE_MUSCLE_GROUP_SET, NULL);
		}
	}	
?>