<?php
	/**
	 * This file is supposed to get the password of a specifed user and email it to him or her.
	 */
	
	//Includes the database connection information.
	include_once 'db_connection.php';
	include_once 'db_asset_names.php';
	include_once 'PasswordHash.php';
	include_once 'random_generator.php';
	
	$email = $_POST['email'];
	
	$token = getToken(8);
	
	$phpass = new PasswordHash(12, false);
	
	$hash = $phpass->HashPassword($token);
	
	$query = mysqli_query($conn, "SELECT Email FROM User WHERE Email = '" . $email . "'");
	
	while($entry = mysqli_fetch_assoc($query))
	{
		$output[] = $entry;
	}
	
	if($output != null)
	{
		$query = mysqli_query($conn, "UPDATE User SET Password = '" . $hash . "' WHERE Email = '" . $email . "'");
		
		if($query)
		{
		    $to = $_REQUEST['email']; 
		    $subject = "Your New Password!";
		    $message = "<html>
		            <body style='width: 100%; margin: 0 auto;'>
		                <div id='content' style='padding: 10px; margin: 0 auto; text-align: center; width: 400px; height: auto;'>
		                  <div id='logo' style='width: 400px; padding: 20px 0 10px 0;'>
		                    <img style='height: 140px; width: 180px; margin: 0 auto;' src='http://intencityapp.com/images/web/logo_medium.png' />
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
			$headers = "From: no-reply@intencityapp.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		
			mail($to, $subject, $message, $headers);
		
			print json_encode(SUCCESS);
		}
		else
		{
			print json_encode(FAILURE);
		}
	}
	else
	{
		print json_encode(FAILURE);
	}
?>
