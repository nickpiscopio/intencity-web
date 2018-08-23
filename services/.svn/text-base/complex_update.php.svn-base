<?php
	/**
	 * This file is supposed to be a generic UPDATE into the database.
	 * 
	 * Accepts:
	 * 		table		The table to update.
	 * 		set			The columns to set information.
	 * 					This has to be [ColumnName]=[Value] in the string.
	 * 		where		Where to insert the data.
	 * 					This has to be [ColumnName]=[Value] in the string.
	 * 
	 * EXAMPLE URL	http://intencityapp.com/services/complex_update.php?table=ExerciseWeek&set=ExerciseWeight=120,ExerciseDuration=5&where=ID=51
	 * 
	 * EXAMPLE SQL
	 * 
	 * UPDATE ExerciseWeek
		SET ExerciseWeight = 132, ExerciseDuration = 5
		WHERE Email = 'nick.piscopio@gmail.com' && ID = 44
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	include 'start_session.php';
	include 'check_session.php';
	
	//NEEDS TO BE CHANGED TO A POST.
	$table = $_POST['table'];
	$set = $_POST['set'];
	
	$where = "";
	
	if(isset($_POST['where']))
	{
		$where = " && " . $_POST['where'];
	}
	
	$update = "UPDATE " . $table . " SET " . $set . " WHERE " . COLUMN_EMAIL . " = '" . $_SESSION['email'] . "'" . $where;
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, $update);
	
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