<?php
	/**
	 * This file is to delete muscle group routines from the UserMuscleGroupRoutine table.
	 *
	 * Accepts:
	 * 		delete(0-n)		The equipment to insert to the database. Separate with a ",".
	 *
 	 * Returns:
 	 *		SUCCESS
 	 *		FAILURE
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev/services/mobile/update_user_muscle_group_routine.php?email=dev@gmail.com&remove=Abs %26 Biceps, Cardio %26 Chest
	 * 
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$email = $_POST['email'];
	$remove = $_POST['remove'];
	
	$deleteQuery = "";

	if (isset($remove))
	{
		$remove = explode(",", $remove);

		$total = count($remove);
		
		for($z = 0; $z < $total; $z++)
		{
			$deleteQuery .= "DELETE FROM " . TABLE_USER_MUSCLE_GROUP_ROUTINE . " WHERE " . COLUMN_EMAIL . "=" . "'" . $email . "' AND " . COLUMN_DISPLAY_NAME . " = '" . $remove[$z] . "'; ";
		}
	}

	$query = mysqli_multi_query($conn, $deleteQuery);

	//Check if the query was successful.
	if($query)
	{		
		print json_encode(SUCCESS);
	}
	else
	{
		print json_encode(FAILURE);
	}
?>