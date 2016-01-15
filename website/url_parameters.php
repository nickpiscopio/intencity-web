<?php 
	include 'services/start_session.php';

	$userId = $_GET['user'];
	
	if(isset($_GET['page']))
	{
		$_SESSION['page'] = $_GET['page'];
	}
	else
	{
		$_SESSION['page'] = "";
	}
?>