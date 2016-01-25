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
	 * EXAMPLE URL	http://intencityapp.com/dev/services/mobile/update_exclusion.php?email=dev@gmail.com&inserts=Bicep Curl, Dead Lift
	 * 
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$email = $_POST['email'];
	$inserts = $_POST['inserts'];
	
	$insertQuery = "";
	$insertQuery .= "DELETE FROM  " . TABLE_EXCLUSION . " WHERE " . COLUMN_EMAIL . "=" . "'" . $email . "'; ";

	if (isset($inserts))
	{
		$inserts = explode(",", $inserts);

		$insertTotal = count($inserts);

		// echo $insertTotal;
		
		for($z = 0; $z < $insertTotal; $z++)
		{
			$insertQuery .= "INSERT INTO " . TABLE_EXCLUSION . " (" . COLUMN_EMAIL . "," . COLUMN_EXCLUDE_FOREVER . ", " . COLUMN_EXCLUSION_NAME . ", " . COLUMN_EXCLUSION_TYPE . ") 
								VALUES ('" . $email . "', 1, '" . $inserts[$z] . "', 'E'); ";
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