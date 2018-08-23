<?php
	/**
	 * This file is supposed to be a generic INSERT into the database.
	 * This file accepts multiple insert statements.
	 * 
	 * Accepts:
	 * 		statements		The number of statements that are going to be placed in the database.
	 * 						This starts at 1.
	 * 		table(0-n)		The table to insert into.
	 * 		columns(0-n)	The columns to insert into. Separate the columns with a ",".
	 * 		inserts(0-n)	The items to insert. Separate with a ",".
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev2/services/complex_insert.php?statements=2&table0=Routine&columns0=RoutineName,ExerciseDay,ExerciseName&inserts0=test,2,Pullups&
	  				table1=Routine&columns1=RoutineName,ExerciseDay,ExerciseName&inserts1=test,2,Bench&
	  				table2=Routine&columns2=RoutineName,ExerciseDay,ExerciseName&inserts2=test,2,Pushups
	 * 
	 * EXAMPLE SQL	INSERT INTO Routine(Email,RoutineName,ExerciseDay,ExerciseName)VALUES('nick.piscopio@gmail.com','test',1,'Pull Ups');
					INSERT INTO Routine(Email,RoutineName,ExerciseDay,ExerciseName)VALUES('nick.piscopio@gmail.com','test',1,'Pushups');
					INSERT INTO Routine(Email,RoutineName,ExerciseDay,ExerciseName)VALUES('nick.piscopio@gmail.com','test',1,'Bench');
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	include 'start_session.php';
	include 'check_session.php';
	
	//NEEDS TO BE CHANGED TO A POST.
	$statements = $_POST['statements'];
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
		
		$insertQuery .= "INSERT INTO " . $table . " (" . COLUMN_EMAIL . ", " . $columns . ") VALUES ('" . $_SESSION['email'] . "'" . $insertString . "); ";
	}

	$query = mysqli_multi_query($conn, $insertQuery);

	//Check if the query was successful.
	if($query)
	{
		$id = mysqli_insert_id($conn);
		
		print json_encode($id);
	}
	else
	{
		print json_encode(FAILURE);
	}
?>