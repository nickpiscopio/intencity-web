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
	 * EXAMPLE URL	http://intencityapp.com/dev/services/mobile/update_fitness_equipment.php?email=dev@gmail.com&display_name=Home&saved_location=123 Saved Road&location=1234 Street Road&inserts=Cable Pull,Treadmill,Roman Chair
	 * 
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$email = $_POST['email'];
	$displayName = $_POST['display_name'];
	$savedlocation = $_POST['saved_location'];
	$location = $_POST['location'];
	$inserts = $_POST['inserts'];
	
	$insertQuery = "";

	// Deletes every time regardless of whether we are inserting or updating.
	$insertQuery .= "DELETE FROM  " . TABLE_USER_EQUIPMENT . " WHERE " . COLUMN_EMAIL . "='" . $email . "' AND " . COLUMN_LOCATION . "='" . $savedlocation ."'; ";	

	if (isset($inserts))
	{
		$inserts = explode(",", $inserts);

		$insertTotal = count($inserts);
		
		for($z = 0; $z < $insertTotal; $z++)
		{
			$insertQuery .= "INSERT INTO " . TABLE_USER_EQUIPMENT . " (" . COLUMN_DISPLAY_NAME . "," . COLUMN_LOCATION . "," . COLUMN_EMAIL . ", " . COLUMN_EQUIPMENT_NAME . ") VALUES ('" . $displayName . "','" . $location . "','" . $email . "', '" . $inserts[$z] . "'); ";
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