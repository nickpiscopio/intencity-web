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

		// Send the JSON response.
		// The response should be as follows:
		// {
		//		"STATUS_CODE": 201,
		//		"DATA": " [DATA TO SEND AS A RESPONSE] " 
		// }
		print json_encode($response);
	}
}

?>