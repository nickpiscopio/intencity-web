<?php
	/**
	 * This file is supposed to get the password of a specifed user and email it to him or her.
	 */
	
	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';
	include_once 'PasswordHash.php';
	include 'start_session.php';
	
	$email = $_SESSION['email'];
	$password = $_POST['password'];
	
	$phpass = new PasswordHash(12, false);
	
	$hash = $phpass->HashPassword($password);
	
	$query = mysqli_query($conn, "UPDATE User SET Password = '" . $hash . "' WHERE Email = '" . $email . "'");
	
	if($query)
	{
		print json_encode(SUCCESS);
	}
	else
	{
		print json_encode(FAILURE);
	}
?>
