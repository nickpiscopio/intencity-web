<?php
	/**
	 * This file calls a stored procedure from the database.
	 * 
	 * Accepts:
	 * 		d 	This is the stored procedure that will be called on the backend.
	 * 		v	This is the variable that will be sent into the stored procedure.		
	 * 
	 * EXAMPLE URL	
	 * http://intencity.fit/dev/services/mobile/stored_procedure.php?d=removeAccount&v=43472
	 */

	include_once '../db_connection.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	//NEEDS TO BE CHANGED TO A POST.
	$storedProcedure = $_POST['d'];
	$urlV  = $_POST['v'];
	$v = addslashes($urlV);
	$variables = explode('|', $v);
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

	if ($query)
	{
		while($entry = mysqli_fetch_assoc($query))
		{
			$output[] = $entry;
		}
		
		// Return the information from the stored procedure.
		$response->send(STATUS_CODE_SUCCESS_STORED_PROCEDURE, $output);	
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_STORED_PROCEDURE, NULL);	
	}
?>