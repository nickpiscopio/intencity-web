<?php
	/**
	 * This file adds a custom routine to the Routine table.
	 * 
	 * Accepts:
	 * 		email 		The email of the user to add the custom routine.
	 *		routine 	The name of the routine.
	 * 		inserts 	The exercises we are inserting into the database.
	 *
 	 * Returns:
 	 *		SUCCESS
 	 *		FAILURE		A failure will occur if the name of the routine already exists or if the database couldn't insert the routine for some reason.
	 * 
	 * EXAMPLE URL	
	 * http://intencityapp.com/dev/services/mobile/set_routine.php?email=dev@gmail.com&routine=Legs&inserts=Upper%20Back,Lower%20Back
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$e  = "'" . $_POST['email'] . "'";
	$routineName  = $_POST['routine'];
	$v  = $_POST['inserts'];
	$variables = explode(',', $v);
	$varLength = count($variables);

	$insert = "";

	$preExistingRoutine = mysqli_query($conn, "SELECT " . COLUMN_ROUTINE_NAME . " FROM " . TABLE_ROUTINE . " WHERE " . COLUMN_EMAIL . " = " . $e . " AND " . COLUMN_ROUTINE_NAME . " = '" . $routineName . "' LIMIT 1;");
	if (mysqli_num_rows($preExistingRoutine) == 0)
	{
		$routineNumber = mysqli_query($conn, "SELECT " . COLUMN_EXERCISE_DAY . " FROM " . TABLE_ROUTINE . " WHERE " . COLUMN_EMAIL . " = " . $e . " ORDER BY " . COLUMN_EXERCISE_DAY . " DESC LIMIT 1;");
		if ($row = mysqli_fetch_assoc($routineNumber))
		{
			$routineNumber = $row[COLUMN_EXERCISE_DAY];
			$routineNumber++;
		}
		else
		{
			// We start at 7 because 7 would be the next number in the list 
			// if we continued from the default list of routines from the 
			// MuscleGroupRoutine table.
			$routineNumber = 7;
		}

		for ($i = 0; $i < $varLength; $i++)
		{
		    $insert .= "INSERT INTO " . TABLE_ROUTINE . "(" . COLUMN_EMAIL . "," . COLUMN_ROUTINE_NAME . "," . COLUMN_EXERCISE_DAY . "," . COLUMN_EXERCISE_NAME . ") VALUES (" . $e . ",'" . $routineName . "'," . $routineNumber . ",'" . $variables[$i] . "'); ";
		}

		$query = mysqli_multi_query($conn, $insert);
		if($query)
		{
			
			print json_encode(SUCCESS);
		}
		else
		{
			print json_encode(FAILURE);
		}
	}
	else
	{
		// The routine name already exists.
		print json_encode(FAILURE);
	}
?>