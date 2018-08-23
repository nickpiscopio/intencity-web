<?php
	/**
	 * This file checks to see if the user is using an Intencity in the Intencity App for android.
	 */
	if($_SERVER['HTTP_X_REQUESTED_WITH'] ==  "XMLHttpRequest")
	{
		print json_encode("INTENCITY_APP");
	}
	else
	{
		print json_encode("NOT_INTENCITY_APP");
	}	
?>
