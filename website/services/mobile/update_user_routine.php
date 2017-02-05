<?php
	/**
	 * This file is to delete routines from the Routine table.
	 *
	 * Accepts:
	 *		email 		The email of the user.
	 * 		remove		The equipment to insert to the database. Separate with a "|".
	 *
 	 * Returns:
 	 *		SUCCESS
 	 *		FAILURE
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev/services/mobile/update_user_routine.php?email=dev@gmail.com&remove=Yolo|Routine 3/11/2014
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$email = $_POST['email'];
	$remove  = str_replace("'", "\'", $_POST['remove']);	
	
	$deleteQuery = "";

	if (isset($remove))
	{
		$remove = explode("|", $remove);

		$total = count($remove);
		
		for($z = 0; $z < $total; $z++)
		{
			$deleteQuery .= "DELETE FROM " . TABLE_ROUTINE . " WHERE " . COLUMN_EMAIL . "=" . "'" . $email . "' AND " . COLUMN_ROUTINE_NAME . " = '" . $remove[$z] . "'; ";
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