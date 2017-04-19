<?php
/**
 * This class is a utility class for web responses.
 */
class Response {

	/**
	 * This function returns a JSON response for a service that was called.
	 *
	 * @param code 		The status code to send.
	 * @param data 		The data associated with the response.
	 */
	function send($code, $data)
	{
		$response = array("STATUS_CODE" => $code, "DATA" => $data);

		//Return the account couldn't be created.
		print json_encode($response);
	}
}

?>