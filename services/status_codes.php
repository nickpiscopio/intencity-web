<?php
	/**
	 * This file has all of the status code constants.
	 */

	// Success status codes.
	define(RESPONSE_SUCCESS_ACCOUNT_CREATION, serialize(array("CODE" => 201, "MESSAGE" => "Successfully created user account.")));
	define(RESPONSE_SUCCESS_ACCOUNT_UPDATED, serialize(array("CODE" => 202, "MESSAGE" => "Successfully updated user account.")));
	define(RESPONSE_SUCCESS_DATE_LOGIN_UPDATED, serialize(array("CODE" => 203, "MESSAGE" => "Successfully updated user login date.")));
	define(RESPONSE_SUCCESS_PASSWORD_CHANGE, serialize(array("CODE" => 204, "MESSAGE" => "Successfully changed user password.")));

	// Failure status codes.
	define(RESPONSE_FAILURE_EMAIL_ERROR, serialize(array("CODE" => 501, "MESSAGE" => "Error using user email. Email already exists.")));
	define(RESPONSE_FAILURE_ACCOUNT_CREATION, serialize(array("CODE" => 502, "MESSAGE" => "Error creating user account.")));
	define(RESPONSE_FAILURE_PASSWORD_INVALID, serialize(array("CODE" => 503, "MESSAGE" => "Error validating user password.")));
	define(RESPONSE_FAILURE_PASSWORD_CHANGE, serialize(array("CODE" => 504, "MESSAGE" => "Error changing user password.")));
?>