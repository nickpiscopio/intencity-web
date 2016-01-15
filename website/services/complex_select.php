<?php
	/**
	 * This file is supposed to be a generic SELECT from the the database.
	 * 
	 * Accepts:
	 * 		select_columns		The columns to select separated by commas.
	 * 		table				The table to pull the information.
	 * 		condition_num		The number of conditions that are being evaluationed.
	 * 		where(0-n)			The where column condition separated by commas.
	 * 		conditions(0-n)		The where conditions separated by commas.
	 * 		following_sql		The SQL that comes after everything.
	 * 							This could be GROUP BY, ORDER BY ASC, etc.
	 * 		operator(0-n)		This is the opperator to either combine the conditions with && or divide them with ||.
	 * 
	 * EXAMPLE URL	http://intencityapp.com/services/complex_select.php?select_columns=ID,ExerciseName&table=ExerciseWeek&where=ExerciseName,ID&conditions=Chin%20Ups,14
	 * EXAMPLE SQL	http://intencityapp.com/dev2/services/complex_select.php?select_columns=ID,RoutineName&table=Routine&following_sql=GROUP%20BY%20RoutineName%20ORDER%20BY%20RoutineName%20ASC
	 * 
	 * EXAMPLE SQL	SELECT ID,ExerciseName FROM ExerciseWeek WHERE Email = 'nick.piscopio@gmail.com' && ExerciseName = 'Chin Ups' && ID = 14
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';
	
	define("FAILURE", "FAILURE");
	
	include 'start_session.php';
	include 'check_session.php';
	
	//NEEDS TO BE CHANGED TO A POST.
	$selectColumns = explode(",", $_POST['select_columns']);
	$selectColumnsString = $_POST['select_columns'];
	$table = $_POST['table'];
	$conditionNum = $_POST['condition_num'];
	
	$where = "";
	$conditions = "";
	$followingSQL = "";
	$operator = "&&";
	$whereString = "";
	
	$operatorIterator = 0;
	$operatorIsSet = false;
	
	if(isset($_POST['following_sql']))
	{
		$followingSQL = " " . $_POST['following_sql'];
	}
	
	for($i = 0; $i < $conditionNum; $i++)
	{		
		if(isset($_POST['where' . (string)$i]))
		{
			$where = explode(",", $_POST['where' . (string)$i]);
		}
		
		if(isset($_POST['conditions' . (string)$i]))
		{
			$conditions = explode(",", $_POST['conditions' . (string)$i]);
		}
		
		if($where != "")
		{
			for($z = 0; $z < count($conditions); $z++)
			{				
				$leftParathesis = "";
				$rightParathesis = "";
				
				if(isset($_POST['operator' . (string)$operatorIterator]))
				{
					$operator = strtoupper($_POST['operator' . (string)$operatorIterator]);
						
					$operatorIsSet = true;
				}
				
				if($operator == "OR" && $operatorIsSet)
				{
					$operator = "||";
						
					$operatorIsSet = false;
				}
				else
				{
					$operator = "&&";
				}
				
				if($z == 0)
				{					
					$leftParathesis = "(";
				}
				
				if($z == count($conditions) - 1)
				{
					$rightParathesis = ")";
				}
			
				if(is_numeric($conditions[$z]) || $conditions[$z] == "NOW()" || $conditions[$z] == "CURDATE()" || $conditions[$z] == "DAYOFWEEK(NOW())")
				{
					$whereString .= " " . $operator . " "  . $leftParathesis . $where[$z] . " = " . $conditions[$z] . $rightParathesis;
				}
				else
				{
					$whereString .=  " " . $operator . " " . $leftParathesis . $where[$z] . " = " . "'" . $conditions[$z] . "'" . $rightParathesis;
				}
				
				$operatorIterator++;
			}
		}
	}	
	
	$select = "SELECT " . $selectColumnsString . " FROM " . $table . " WHERE " . COLUMN_EMAIL . " = '" . $_SESSION['email'] . "'" . $whereString . $followingSQL;

	$query = mysqli_query($conn, $select);
	
	//Check if the query was successful.
	if($query)
	{
		$json = array();	
		
		while($row = mysqli_fetch_array($query))
		{
			$temp = array();
			
			for($i = 0; $i < count($selectColumns); $i++)
			{
				$temp[$selectColumns[$i]] = $row[$selectColumns[$i]];
			}
				
			array_push($json, $temp);
		}
		
		print json_encode($json);
	}
	else
	{
		print json_encode(FAILURE);
	}
?>