<?php

	//Includes the database connection information.
	include_once 'db_connection.php';
	
	define(EMAIL, "nick.piscopio@gmail.com");
	define(EMAIL_NOT_FOUND_ERROR, "EMAIL_NOT_FOUND_ERROR");
	define(PASSWORD_ERROR, "PASSWORD_ERROR");
	define(SUCCESS, "SUCCESS");
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	//Run the raffle stored procedure.
	$checkEmailQuery = mysqli_query($conn, "SELECT Email FROM User WHERE Email = '$email' && AccountType = 'A'");
	
	$row = mysqli_fetch_array($checkEmailQuery);
	
	if($row['Email'] != "")
	{
		$checkPasswordQuery = mysqli_query($conn, "SELECT Password FROM User WHERE Email = '$email'");
		
		$row = mysqli_fetch_array($checkPasswordQuery);
		
		if($row['Password'] == $password)
		{
			//Run the raffle stored procedure.
			$query = mysqli_query($conn, "CALL getIntencityRaffleWinner()");
			
			$winnerEmail = "";
			$winnerFirstName = "";
			$winnerLastName = "";
			
			while($row = mysqli_fetch_array($query))
			{
				$winnerEmail = $row['Email'];
				$winnerFirstName = $row['FirstName'];
				$winnerLastName = $row['LastName'];
			}
			
			$email_subject = "IntencityApp.com Raffle";
			$email_body = "Intencity has a raffle winner!. \n\nFirst Name:\n$winnerFirstName \n\nLastName:\n$winnerLastName \n\nEmail:\n$winnerEmail";
			
			$headers = "From: raffle@intencityapp.com\n";
			$headers .= "Reply-To: no-reply@intencityapp.com";
			
			mail(EMAIL,$email_subject,$email_body,$headers);
			
			print json_encode(SUCCESS);
		}
		else
		{
			print json_encode(PASSWORD_ERROR);
		}
	}
	else
	{
		print json_encode(EMAIL_NOT_FOUND_ERROR);
	}
?>