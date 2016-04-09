<?php
	/**
	 * This file is supposed to be a generic upload to the server.
	 *
	 * DOCUMENTATION: http://stackoverflow.com/questions/21306720/uploading-image-from-android-to-php-server
	 */	
	include_once '../db_connection.php';
	
	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");

	$fileName = "user-profile.jpg";
 	$userId = $_REQUEST['id'];

	$target_dir = "../../uploads/" . $userId . "/";
	if (!file_exists($target_dir))
	{
		mkdir($target_dir, 0777, true);
	}

    $base = $_REQUEST['image'];

    $binary = base64_decode($base);

    header('Content-Type: bitmap; charset=utf-8');

    $file = fopen($target_dir . $fileName, 'wb');

    $response = FAILURE;
    
    if (fwrite($file, $binary)) 
	{
		$response = SUCCESS;
	}

	fclose($file);

	print json_encode($response);
?>