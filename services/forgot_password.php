<?php
	/**
	 * This file is supposed to get the password of a specifed user and email it to him or her.
	 * 
	 * URL GET EXAMPLE		http://intencity.fit/dev/services/forgot_password.php?email=dev@gmail.com
	 * 						This example does not work when we are using $_POST. We ARE using $_POST.
	 */
	
	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';
	include_once 'TextHash.php';
	include_once 'random_generator.php';
	include_once 'status_codes.php';
	include_once 'Response.php';
	
	$email = $_POST['email'];

	$response = new Response();
	
	$token = getToken(8);
	
	$phpass = new TextHash(12, false);
	
	$hash = $phpass->HashText($token);
	
	$query = mysqli_query($conn, "SELECT " . COLUMN_EMAIL . " FROM " . TABLE_USER . " WHERE " . COLUMN_EMAIL . " = '" . $email . "'");

	// Get any data that came back from the database.
	$row = mysqli_fetch_assoc($query);
	
	if($row[COLUMN_EMAIL] == $email)
	{
		$query = mysqli_query($conn, "UPDATE " . TABLE_USER . " SET " . COLUMN_PASSWORD . " = '" . $hash . "' WHERE " . COLUMN_EMAIL . " = '" . $email . "'");
		
		if($query)
		{
		    $to = $_REQUEST['email']; 
		    $subject = "Your New Password!";
		    $message = "<html>
				            <body style='width: 100%; margin: 0 auto;'>
				                <div id='content' style='padding: 10px; margin: 0 auto; text-align: center; width: 400px; height: auto;'>
				                  <div id='logo' style='width: 400px; padding: 20px 0 10px 0;'>
				                    <img style='height: 140px; width: 180px; margin: 0 auto;' src='http://intencity.fit/images/intencity_hero.png' />
				                  </div>
				                
				                  <p style='width:400px; color: #647082; text-align: center; margin: 15px 0 15px 0; font-family: Arial, Helvetica, sans-serif; font-size: 1.5em; font-weight: 700; letter-spacing:.005em'>Your New Password</p>
				           
				                  <p style='color: #647082; font-family: Arial, Helvetica, sans-serif; font-size: 18px; margin: 15px 0 15px 0; width:400px; text-align: center; letter-spacing:.005em font-weight: 500'>
				                    We see someone is a bit forgetful.<br/>
				                    Don't worry, we created a new password.<br/>
				                    Log in to Intencity with the password below:<br/>
				                  </p>
				          
				                  <p style='width:400px; color: #309DDB; text-align: center; margin: 15px 0 20px 0; font-family: Arial, Helvetica, sans-serif; font-size: 1.8em; font-weight: 700; letter-spacing:.005em'>" . $token . "</p>
				                
				                  <p style='color: #647082; font-family: Arial, Helvetica, sans-serif; font-size: 18px; margin: 15px 0 15px 0; width:400px; text-align: center; letter-spacing:.005em font-weight: 500'>
				                    Once logged in, you can change your password from the settings.
				                  </p>      
				                </div>
				              </div>
				            </body>
				          </html>";
		
			// To send the HTML mail we need to set the Content-type header.
			$headers = "From: no-reply@intencity.fit\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
			mail($to, $subject, $message, $headers);

			$response->send(STATUS_CODE_SUCCESS_EMAILED_NEW_PASSWORD, NULL);
		}
		else
		{
			$response->send(STATUS_CODE_FAILURE_EMAILED_PASSWORD, NULL);
		}
	}
	else
	{
		$response->send(STATUS_CODE_FAILURE_EMAILED_PASSWORD, NULL);
	}
?>
