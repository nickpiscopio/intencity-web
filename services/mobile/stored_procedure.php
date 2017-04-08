<?php
	/**
	 * This file calls a stored procedure from the database.
	 * 
	 * Accepts:
	 * 		d 	This is the stored procedure that will be called on the backend.
	 * 		v	This is the variable that will be sent into the stored procedure.		
	 * 
	 * EXAMPLE URL	
	 * http://intencityapp.com/dev/services/mobile/stored_procedure.php?d=getAllDisplayMuscleGroups&v=dev@gmail.com
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	
	//NEEDS TO BE CHANGED TO A POST.
	$storedProcedure = $_POST['d'];
	$urlV  = $_POST['v'];
	$v = addslashes($urlV);
	$variables = explode(',', $v);
	$varLength = count($variables);

	$parameters = "";

	if (isset($urlV))
	{
		for ($i = 0; $i < $varLength; $i++)
		{
	    	$parameters .= ($i > 0 ? "," : "") . "'" . $variables[$i] ."'";
		}
	}

	$query = mysqli_query($conn, "CALL " . $storedProcedure . "(" . $parameters . ")");

	while($entry = mysqli_fetch_assoc($query))
	{
		$output[] = $entry;
	}
	
	//Return user data.
	print json_encode($output);
?>