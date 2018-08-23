<?php
	/**
	 * This file is supposed to be a generic SQL Query to the database.
	 * 
	 * Accepts:
	 * 		s			(optional)This is the number of statements that will be included in the string.
	 * 					This starts at 1.
	 * 		d(0-n)		(0-n is optional) The encrypted sql. For multiple statements add a number after the "d".
	 * 		var(0-n)	(0-n is optional) The variables needed to be placed in the URL string separated by commas.
	 * 					For multiple statements add a number after the "var".
	 * 		r			A boolean value (0 = false. 1 = true) to return the ID of the last item.
	 * 		/email/		When you put "/email/" in the sql variable the file will 
	 * 					put the $_SESSION['email'] into the sql and run the query.
	 * 					This can be added as many times as desired.
	 * 		/var(0-n)/	When needing to place a variable in the URL, use this in the decrptyed SQL before encrypting it.
	 * 		;			A semicolon(;) should be added in between sql statements.
	 * 
	 * EXAMPLE URL	
	 * http://intencityapp.com/dev2/services/sql.php?sql=SELECT%20Exercise.ExerciseName,Direction,VideoURL,SubmittedBy%20FROM%20Exercise%20INNER%20JOIN%20Direction%20ON%20Exercise.ExerciseName=Direction.ExerciseName
	 *
	 * EXAMPLE URL WITH /email/
	 * http://intencityapp.com/dev2/services/sql.php?sql=INSERT%20INTO%20SubmittedExercise%28Email,Date,ExerciseName,Type,VideoURL,Status%29VALUES%28%27/email/%27,CURDATE%28%29,%27/email/%27,%27E%27,%27videos/coming_soon%27,%27P%27%29
	 * 
	 * EXAMPLE SQL Before Encrption
	 * INSERT INTO User(Email,CreatedDate,FirstName,LastName,Password,/email/)VALUES(/var0/,/var1/,/var2/,/var3/,/var4/,/var5/)
	 * 
	 * EXAMPLE SQL URL with Encrption and /email/ and &var
	 * http://intencityapp.com/dev2/services/data.php?d=Se,a,saw,U0va,//]E[TmltetmmPs/a//rav/r/v5]RNU%28reti,teselAS,r/2/a,r]ITOrieDFNLaarm%29Ea//rv,4a]NI[sEaCdaraesN,odiVL%28v/1,/a3vr/%29&var='test@gmail.com',CURDATE(),'Test','Account',1234,'N'
	 *
	 * EXAMPLE SQL
	 * INSERT INTO User(Email,CreatedDate,FirstName,LastName,Password,AccountType)VALUES('test@gmail.com',CURDATE(),'Test','Account',1234,'N')	
	 * 
	 * EXAMPLE SQL Single SELECT
	 * http://intencityapp.com/dev2/services/data.php?d=LnREtEp[[BmN]E[umFqnRENeSNLRqpa]CqmNMueWueaIUGP[nm]STit[[p[Eit[OLOYit]EEpeaeOimH[qmnmNT[U[Euee
	 * 
	 * EXAMPLE SQL Multi INSERT
	 * http://intencityapp.com/dev2/services/data.php?s=3&d0=SsresNU,a]E[T%28eNua%29/r%27r%27]RNMliaMlASv/1;]ITOcxsecmL%270//]NI[ueEcm,eeVE%28a%27v%29&var0=ATest,test1&d1=SsresNU,a]E[T%28eNua%29/r%27r%27]RNMliaMlASv/1;]ITOcxsecmL%270//]NI[ueEcm,eeVE%28a%27v%29&var1=ATest,test2&d2=SsresNU,a]E[T%28eNua%29/r%27r%27]RNMliaMlASv/1;]ITOcxsecmL%270//]NI[ueEcm,eeVE%28a%27v%29&var2=ATest,test3		
	 */

	//Includes the database connection information.
	include_once 'db_connection.php';
	
	define("FAILURE", "FAILURE");
	
	include 'start_session.php';
	
	//NEEDS TO BE CHANGED TO A POST.
	$statements = $_POST['s'];
	//If this is set to 1, then it will return the item ID from the database after inserting an item.
	$returnId = $_POST['r'];
	
	if(empty($statements))
	{
		$statements = 1;
		$executeMultiQuery = false;
	}
	else
	{
		$concatinatedSql = "";
		
		$executeMultiQuery = true;
	}
	
	for($z = 0; $z < $statements; $z++)
	{	
		if($executeMultiQuery)
		{
			$sql = $_POST['d' . (string)$z];
			$var = $_POST['var' . (string)$z];
		}
		else
		{
			$sql = $_POST['d'];
			$var = $_POST['var'];
		}
		
		//Split the sql on the divider to get the different modules.
		$splitSql = explode(']', $sql);
		
		$modular2 = str_split($splitSql[0]);
		$modular3 = str_split($splitSql[1]);
		$modular4 = str_split($splitSql[2]);
		$modular5 = str_split($splitSql[3]);
		$modularOther = str_split($splitSql[4]);
		
		$splitSqlLength = count($modular2) + count($modular3) + count($modular4) + count($modular5) + count($modularOther);
		
		$tempDecryptedSql = "";
		
		for($a = 0; $a < $splitSqlLength; $a++)
		{
			if($a % 5 == 0)
			{
				$tempDecryptedSql .= $modular5[0];
			
				array_shift($modular5);
			}
			else if($a % 4 == 0)
			{
				$tempDecryptedSql .= $modular4[0];
			
				array_shift($modular4);
			}
			else if($a % 3 == 0)
			{
				$tempDecryptedSql .= $modular3[0];
			
				array_shift($modular3);
			}
			else if($a % 2 == 0)
			{
				$tempDecryptedSql .= $modular2[0];
			
				array_shift($modular2);
			}
			else
			{
				$tempDecryptedSql .= $modularOther[0];
			
				array_shift($modularOther);
			}
		}
		
		$decryptedSqlSpace = str_replace("[", " ", $tempDecryptedSql);
		$decryptedSql = str_replace("!", "=", $decryptedSqlSpace);
		
		$splitSql = explode('/email/', $decryptedSql);
		
		$sqlStatements = explode(';', $sql);
		
		$sqlQuery = "";
		
		$sqlLength = count($splitSql);

		if(!empty($splitSql))
		{
			for($b = 0; $b < $sqlLength; $b++)
			{
				if($b == 0)
				{
					$sqlQuery .= $splitSql[$b];
				}
				else
				{
					include 'check_session.php';
					
					$sqlQuery .= $_SESSION['email'] . $splitSql[$b];
				}
			}
		}
		else
		{
			$sqlQuery = $sql;
		}

		$splitSql = explode('/id/', $sqlQuery);

		$sqlLength = count($splitSql);

		if(!empty($splitSql))
		{
			for($c = 0; $c < $sqlLength; $c++)
			{
				if($c == 0)
				{
					$sqlQueryWithId .= $splitSql[$c];
				}
				else
				{
					$sqlQueryWithId .= $_SESSION['userId'] . $splitSql[$c];
				}
			}
		}
		else
		{
			$sqlQueryWithId = $sql;
		}

		$vars = "";

		$varsLength = 0;

		if(!empty($var))
		{
			$vars = preg_split('#(?<!\\\)\,#', $var);

			$varsLength = count($vars);

			$splitSql = "";

			for($d = 0; $d < $varsLength; $d++)
			{
				$splitSql = explode('/var' . $d . '/', $sqlQueryWithId);
					
				$sqlQueryWithId = $splitSql[0] . $vars[$d] . $splitSql[1];
			}
		}
		
		$executeQueryNum = $z;
		
		if($executeMultiQuery)
		{
			$executeQueryNum = $statements - 1;
		}

		if($z == $executeQueryNum)
		{
			if(!empty($sqlStatements) && count($sqlStatements) > 1)
			{
				$query = mysqli_multi_query($conn, $sqlQueryWithId);
			}
			else
			{
				$query = mysqli_query($conn, $sqlQueryWithId);
			}
			
			//Check if the query was successful.
			if($query)
			{
				if(!empty($returnId) && $returnId == 1)
				{
					$output = mysqli_insert_id($conn);
				}
				else
				{
					while($entry = mysqli_fetch_assoc($query))
					{
						$output[] = $entry;
					}
				}
			
				//Return user data.
				print json_encode($output);
			}
			else
			{
				print json_encode(FAILURE);
			}
		}
	}
?>