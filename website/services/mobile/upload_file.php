<?php
	/**
	 * This file is supposed to be a generic upload to the server.
	 *
	 * DOCUMENTATION: http://swiftdeveloperblog.com/image-upload-example/
	 */	
	include_once '../db_connection.php';
	include_once '../db_asset_names.php';

	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
 
 	// $email = $_POST['id'];
 	$userId = $_POST['id'];

	$data = array();

	$target_dir = "../../uploads/" . $userId . "/";
	if(!file_exists($target_dir))
	{
		mkdir($target_dir, 0777, true);
	}

	$target_dir = $target_dir . "/" . basename($_FILES["file"]["name"]);

	if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir)) 
	{
		echo json_encode([
			"Message" => "The image has been uploaded.",
			"Status" => "OK"
		]);

		// $insertQuery .= "INSERT INTO " . TABLE_USER_MEDIA . " (" . COLUMN_DATE . ", " . COLUMN_EMAIL . ", " .  . ") VALUES ('" . $email . "'" . $insertString . "); ";

		// $query = mysqli_multi_query($conn, $insertQuery);

	} else {

		echo json_encode([
			"Message" => "Sorry, there was an error uploading your file.",
			"Status" => "Error"
		]);
	}
?>