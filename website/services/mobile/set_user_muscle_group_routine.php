<?php
	/**
	 * This file adds a custom muscle group routine.
	 * 
	 * Accepts:
	 * 		email 		The email of the user to add the custom routine.
	 * 		inserts 	The muscle groups we are inserting into the database.
	 *
 	 * Returns:
 	 *		SUCCESS
 	 *		FAILURE	
	 * 
	 * EXAMPLE URL	
	 * http://intencityapp.com/dev/services/mobile/set_user_muscle_group_routine.php?email=dev@gmail.com&inserts=Upper%20Back,Lower%20Back
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$e  = "'" . $_POST['email'] . "'";
	$v  = $_POST['inserts'];
	$variables = explode(',', $v);
	$varLength = count($variables);

	$insert = "";

	$routineNumber = mysqli_query($conn, "SELECT " . COLUMN_ROUTINE_NUMBER . " FROM " . TABLE_USER_MUSCLE_GROUP_ROUTINE . " WHERE " . COLUMN_EMAIL . " = " . $e . " ORDER BY " . COLUMN_ROUTINE_NUMBER . " DESC LIMIT 1;");
	if ($row = mysqli_fetch_assoc($routineNumber))
	{
		$routineNumber = $row[COLUMN_ROUTINE_NUMBER];
		$routineNumber++;
	}
	else
	{
		$routineNumber = 0;
	}

	$select = "SELECT " . COLUMN_MUSCLE_GROUP_NAME . " FROM " . TABLE_CUSTOM_ROUTINE_MUSCLE_GROUP . " WHERE " . COLUMN_DISPLAY_NAME . " = '" . $variables[0] . "'" . ($varLength > 1 ? " OR " . COLUMN_DISPLAY_NAME . " = '" . $variables[1] . "'" : "");

	$muscleGroupNameQuery = mysqli_query($conn, $select);

	while($row = mysqli_fetch_assoc($muscleGroupNameQuery))
	{
    	$muscleGroupNames[] = $row[COLUMN_MUSCLE_GROUP_NAME];
	}
	
	$muscleGroupNameLength = count($muscleGroupNames);

	for ($i = 0; $i < $muscleGroupNameLength; $i++)
	{
		$muscleGroup = $muscleGroupNames[$i];

	    $insert .= "INSERT INTO " . TABLE_USER_MUSCLE_GROUP_ROUTINE . "(" . COLUMN_EMAIL . "," . COLUMN_MUSCLE_GROUP_NAME . "," . COLUMN_ROUTINE_NUMBER . "," . COLUMN_DISPLAY_NAME . ") VALUES (" . $e . ",'" . $muscleGroup . "'," . $routineNumber . "," . ($varLength > 1 ? "'" . $variables[0] . " & " . $variables[1]. "'" : "'" . $variables[0] . "'") . "); ";
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
?>