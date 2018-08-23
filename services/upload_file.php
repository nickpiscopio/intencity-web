<?php
	/**
	 * This file is supposed to be a generic upload to the server.
	 */
	
	define("SUCCESS", "SUCCESS");
	define("FAILURE", "FAILURE");
	
	include 'start_session.php';
	include 'check_session.php';
	
	$fileName = $_GET['file_name'];
 
	$data = array();
	 
	if(isset($_GET['file']))
	{  
		$error = false;
		$files = array();
		
		$uploadDir = "";
		
		if(!empty($fileName))
		{
			$uploadDir = '../uploads/' . $_SESSION['email'] . "/" . date("Y-m-d") . "/" . $fileName;
		}
		else
		{
			$uploadDir = '../uploads/' . $_SESSION['email'] . "/" . date("Y-m-d");
		}

		foreach($_FILES as $file)
		{
			if (!file_exists($uploadDir)) 
			{
				mkdir($uploadDir, 0777, true);
			}
			
			if(move_uploaded_file($file['tmp_name'], $uploadDir . "/" . $file['name']))
			{
				$files[] = $file['name'];
			}
			else
			{
			    $error = true;
			}
		}
		
		$data = ($error) ? array('error' => 'There was an error uploading your files') : array('files' => $files);
	}
	else
	{
		$data = array('success' => 'Form was submitted', 'formData' => $_POST);
	}
	 
	echo json_encode($data);
?>