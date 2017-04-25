<?php
	/**
	 * This file is to delete muscle group routines from the UserMuscleGroupRoutine table.
	 *
	 * Accepts:
	 *		email 		The email of the user.
	 * 		remove		The equipment to insert to the database. Separate with a "|".
	 *
 	 * Returns:
 	 *		SUCCESS
 	 *		FAILURE
	 * 
	 * EXAMPLE URL	http://intencity.fit/dev/services/mobile/update_user_fitness_location.php?user_id=100&remove=Tesla Road, Livermore, CA, Uni|H G Trueman Road, Lusby, MD, U
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$email = $_POST['user_id'];
	$remove = $_POST['remove'];
	
	$deleteQuery = "";

	if (isset($remove))
	{
		$remove = explode("|", $remove);

		$total = count($remove);
		
		for($z = 0; $z < $total; $z++)
		{
			$deleteQuery .= "DELETE FROM " . TABLE_USER_EQUIPMENT . " WHERE " . COLUMN_EMAIL . "=" . "'" . $email . "' AND " . COLUMN_LOCATION . " = '" . $remove[$z] . "'; ";
		}
	}

	$query = mysqli_multi_query($conn, $deleteQuery);

	//Check if the query was successful.
	if($query)
	{		
		$response->send(STATUS_CODE_SUCCESS_FITNESS_LOCATIONS_UPDATED, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_FITNESS_LOCATIONS_UPDATE, NULL);
	}
?>