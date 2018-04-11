<?php
	/**
	 * This file is supposed to be a generic UPDATE into the database.
	 * 
	 * Accepts:
	 * 		statements		The number of statements that are going to be placed in the database.
	 * 						This starts at 0.
	 * 		table(0-n)		The table to update.
	 * 		set(0-n)		The columns to set information.
	 * 						This has to be [ColumnName]=[Value] in the string.
	 *						If the value is a string, then it needs to be wrapped in single quotes (')
	 * 		where(0-n)		Where to insert the data.
	 * 						This has to be [ColumnName]=[Value] in the string.
	 * 
	 * EXAMPLE URL	http://intencity.fit/services/complex_update.php?statements=2email=dev@gmail.com&table0=ExerciseWeek&set0=ExerciseWeight=120,ExerciseDuration=5&where0=ID=51
 																										&table1=ExerciseWeek&set1=ExerciseWeight=140,ExerciseDuration=6&where1=ID=52
 																										&table2=ExerciseWeek&set2=ExerciseWeight=150,ExerciseDuration=7&where2=ID=53
	 * 
	 * EXAMPLE SQL
	 * 
	 * UPDATE ExerciseWeek
		SET ExerciseWeight = 120, ExerciseDuration = 5
		WHERE Email = 'dev@gmail.com' && ID = 51;
		SET ExerciseWeight = 140, ExerciseDuration = 6
		WHERE Email = 'dev@gmail.com' && ID = 52;
		SET ExerciseWeight = 150, ExerciseDuration = 7
		WHERE Email = 'dev@gmail.com' && ID = 53;
	 */

	// Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';
	include_once '../status_codes.php';
	include_once '../Response.php';

	$response = new Response();
	
	// NEEDS TO BE CHANGED TO A POST.
	$statements = $_POST['statements'];
	$userId = $_POST['user_id'];
	$table = "";
	$set = "";

	$update = "";

	for($i = 0; $i < $statements; $i++)
	{
		$table = $_POST['table' . (string)$i];
		$set = $_POST['set' . (string)$i];

		$where = "";
	
		if(isset($_POST['where' . (string)$i]))
		{
			$where = " && " . $_POST['where' . (string)$i];
		}

		$update .= "UPDATE " . $table . " SET " . $set . " WHERE " . COLUMN_USER_ID . " = '" . $userId . "'" . $where . "; ";
	}
	
	$query = mysqli_multi_query($conn, $update);
	
	// Check if the query was successful.
	if($query)
	{		
		$response->send(STATUS_CODE_SUCCESS_UPDATE, NULL);
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_UPDATE, NULL);
	}
?>