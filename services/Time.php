<?php
/**
 * This class is a utility class for time.
 */
class Time {

	/**
	 * This function gets the current time in milliseconds.
	 *
	 * @return The current time in milliseconds.
	 */
	function getMillis()
	{
		return round(microtime(true) * 1000);
	}
}

?>