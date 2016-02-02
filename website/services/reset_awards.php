<?php
	/**
	 * This file deletes trial accounts that are over a week old.
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, "CALL resetAwards()");
?>
