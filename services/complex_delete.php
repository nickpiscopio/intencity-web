<?php
	/**
	 * This file is supposed to be a generic DELETE from the the database.
	 * 
	 * Accepts:
	 * 		table				The table to pull the information.
	 * 		condition_num		The number of conditions that are being evaluationed.
	 * 		where(0-n)			The where column condition separated by commas.
	 * 		conditions(0-n)		The where conditions separated by commas.
	 * 		operator(0-n)		This is the operator to either combine the conditions with && or divide them with ||.
	 * 
	 * EXAMPLE URL	http://intencityapp.com/dev2/services/complex_delete.php?table=Exclusion&condition_num=1&where0=ExcludeForever&conditions0=0
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
	$conditionNum = $_POST['condition_num'];
	
	$where = "";
	$conditions = "";
	$operator = "&&";
	$whereString = "";
	
	$operatorIterator = 0;
	$operatorIsSet = false;

	
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
					
				if(is_numeric($conditions[$z]) || $conditions[$z] == "NOW()" || $conditions[$z] == "CURDATE()")
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
	
	$delete = "DELETE FROM " . $table . " WHERE " . COLUMN_EMAIL . " = '" . $_SESSION['email'] . "'" . $whereString;
	
	//Check to see if the email is already in use.
	$query = mysqli_query($conn, $delete);
	
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