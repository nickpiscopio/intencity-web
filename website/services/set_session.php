<?php
	/**
	 * This file sets the session variables for Intencity.
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';

	//Starts the session so we can keep use the user information throughout his or her session of using Intencity.
	include 'start_session.php';
	
	$userId = $_POST['userId'];

	$_SESSION['email'] = strtolower($_POST['email']);
	$_SESSION['accountType'] = $_POST['account_type'];
	
	$whereClause = "";
	
	if(!empty($userId))
	{
		$whereClause = COLUMN_ID . " = " . $userId;
	}
	else
	{
		$whereClause = COLUMN_EMAIL . " = '" . $_SESSION['email'] . "'";
	}
	
	define("QUERY_COLUMN_AMOUNT", 1);
	
	$sql = "SELECT " . COLUMN_ID . "," . COLUMN_FIRST_NAME . "," . COLUMN_LAST_NAME . "," . COLUMN_EMAIL . "  FROM " . TABLE_USER . " WHERE " . $whereClause;
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, $sql);
	
	//Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if(mysqli_num_rows($query) == QUERY_COLUMN_AMOUNT)
	{
		$_SESSION['userId'] = $row[COLUMN_ID];
		$_SESSION['firstName'] = $row[COLUMN_FIRST_NAME];
		$_SESSION['lastName'] = $row[COLUMN_LAST_NAME];
		
		if($row[COLUMN_EMAIL] == $_SESSION['email'])
		{
			$_SESSION['isLoggedInUser'] = true;
		}
		else
		{
			$_SESSION['isLoggedInUser'] = false;
		}
	}
?>