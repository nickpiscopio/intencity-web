<?php
	/**
	 * This file holds the information for the database connection.
	 */

	// Turns off the errors because we only want the json response.
	error_reporting(0);

	//Constants for the database.
	define("DB_HOST", "localhost");
	define("DB_USER", "intencit_thyleft");
	define("DB_PASSWORD", "a123b123");
	define("DATABASE", "intencit_intencity");
	
  	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DATABASE);
?>