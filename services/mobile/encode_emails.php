<?php
	/**
	 * This file adds a custom muscle group routine.
	 * 
	 * Accepts:
	 * 		user_id		The ID of the user.
	 * 		inserts 	The muscle groups we are inserting into the database.
	 * 
	 * EXAMPLE URL	
	 * http://intencity.fit/dev/services/mobile/set_user_muscle_group_routine.php?user_id=dev@gmail.com&inserts=Upper%20Back,Lower%20Back
	 */

	// Includes the database connection information.
	include_once '../db_connection.php';

	$select = mysqli_query($conn, "SELECT Email FROM User");

	$update = "";

	while($row = mysqli_fetch_assoc($select))
	{
    	$email = $row["Email"];
    	$encodedEmail = hash('sha256', $email);

    	$update .= "UPDATE User SET Email='" . $encodedEmail . "' WHERE Email='" . $email . "';";    	
	}

	mysqli_multi_query($conn, $update);

	print $update;
?>