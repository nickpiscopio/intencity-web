<?php
	/**
	 * This file is to insert equipment into the database after it deletes the old records first.
	 * 
	 * Accepts:
	 * 		inserts(0-n)	The equipment to insert to the database. Separate with a ",".
	 *
 	 * Returns:
 	 *		SUCCESS
 	 *		FAILURE
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev/services/mobile/update_exercise_priority.php?email=dev@gmail.com&exercises=Bicep Curl,Dead Lift,&priorities=50,-25
	 * 
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$email = $_POST['email'];
	$exercises = $_POST['exercises'];
	$priorities = $_POST['priorities'];
	
	$insertQuery = "";
	$insertQuery .= "DELETE FROM  " . TABLE_EXCLUSION . " WHERE " . COLUMN_EMAIL . "=" . "'" . $email . "'; ";
	$insertQuery .= "DELETE FROM  " . TABLE_EXERCISE_PRIORITY . " WHERE " . COLUMN_EMAIL . "=" . "'" . $email . "'; ";

	if (isset($exercises))
	{
		$exercises = explode(",", $exercises);
		$priorities = explode(",", $priorities);

		$total = count($exercises);
		
		for ($i = 0; $i < $total; $i++)
		{
			$priority = $priorities[$i];

			if ($priority > 0)
			{
				$insertQuery .= "INSERT INTO " . TABLE_EXERCISE_PRIORITY . " (" . COLUMN_EMAIL . "," . COLUMN_EXERCISE_NAME . ", " . COLUMN_PRIORITY . ") 
								VALUES ('" . $email . "','" . $exercises[$i] . "'," . $priority . "); ";
			}
			else if ($priority < 0)
			{
				$insertQuery .= "INSERT INTO " . TABLE_EXCLUSION . " (" . COLUMN_EMAIL . "," . COLUMN_EXCLUDE_FOREVER . ", " . COLUMN_EXCLUSION_NAME . ", " . COLUMN_EXCLUSION_TYPE . ") 
								VALUES ('" . $email . "', 1, '" . $exercises[$i] . "', 'E'); ";
			}
		}
	}	

	$query = mysqli_multi_query($conn, $insertQuery);

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