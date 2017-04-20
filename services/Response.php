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
		// [0] is the boolean for success.
		// [1] is the status code.
		$status = unserialize($code);
		$response = array("STATUS" => array("SUCCESS" => $status[0], "CODE" => $status[1]), "DATA" => $data);

		// Send the JSON response.
		// The response should be as follows:
		// {
		//		"STATUS": {
		//			"SUCCESS": true,
		//			"CODE": 201	
		//		},
		//		"DATA": " [DATA TO SEND AS A RESPONSE] " 
		// }
		print json_encode($response);
	}
}

?>