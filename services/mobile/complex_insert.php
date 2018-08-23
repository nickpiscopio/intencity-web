<?php
	/**
	 * This file is supposed to be a generic INSERT into the database.
	 * This file accepts multiple insert statements.
	 * 
	 * Accepts:
	 * 		statements		The number of statements that are going to be placed in the database.
	 * 						This starts at 0.
	 * 		table(0-n)		The table to insert into.
	 * 		columns(0-n)	The columns to insert into. Separate the columns with a ",".
	 * 		inserts(0-n)	The items to insert. Separate with a ",".
	 *
 	 * Returns:
 	 *		The auto incremented IDs of the inserted rows.
 	 *		If there are multiple IDs, it gets the first one then increments in the PHP file.
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev2/services/complex_insert.php?statements=2&email=dev@gmail.com&table0=Routine&columns0=RoutineName,ExerciseDay,ExerciseName&inserts0=test,2,Pullups&
	  				table1=Routine&columns1=RoutineName,ExerciseDay,ExerciseName&inserts1=test,2,Bench&
	  				table2=Routine&columns2=RoutineName,ExerciseDay,ExerciseName&inserts2=test,2,Pushups
	 * 
	 * EXAMPLE SQL	INSERT INTO Routine(Email,RoutineName,ExerciseDay,ExerciseName)VALUES('dev@gmail.com','test',1,'Pull Ups');
					INSERT INTO Routine(Email,RoutineName,ExerciseDay,ExerciseName)VALUES('dev@gmail.com','test',1,'Pushups');
					INSERT INTO Routine(Email,RoutineName,ExerciseDay,ExerciseName)VALUES('dev@gmail.com','test',1,'Bench');
	 */

	//Includes the database connection information.
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	//NEEDS TO BE CHANGED TO A POST.
	$statements = $_POST['statements'];
	$email = $_POST['email'];
	$table = "";
	$columns = "";
	$inserts = "";
	
	$insertQuery = "";
	
	for($i = 0; $i < $statements; $i++)
	{
		$table = $_POST['table' . (string)$i];
		$columns = $_POST['columns' . (string)$i];
		$inserts = explode(",", $_POST['inserts' . (string)$i]);
		
		$insertString = "";
		
		for($z = 0; $z < count($inserts); $z++)
		{
			if($inserts[$z] == "CURDATE()" || $inserts[$z] == "NOW()" || is_numeric($inserts[$z]))
			{
				$insertString .= ", " . $inserts[$z];
			}
			else
			{
				$insertString .= ", '" . $inserts[$z] . "'";
			}
		}
		
		$insertQuery .= "INSERT INTO " . $table . " (" . COLUMN_EMAIL . ", " . $columns . ") VALUES ('" . $email . "'" . $insertString . "); ";
	}

	$query = mysqli_multi_query($conn, $insertQuery);

	//Check if the query was successful.
	if($query)
	{
		// Get the first ID that was inserted.
		$firstId = mysqli_insert_id($conn);
		$ids = array();
		
		for ($i = 0; $i < $statements; $i++)
		{
			// Add an incremented ID for each statement. This way we get every ID added.
			$ids[] = $firstId + $i;
		}
		
		print json_encode($ids);
	}
	else
	{
		print json_encode(FAILURE);
	}
?>