<?php
	/**
	 * This file checks to see if the session variables are set.
	 */

	if(!isset($_SESSION['email']))
	{
		header("Location: demo.html");
	}	
?>