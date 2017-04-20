<?php
	/**
	 * This file has all of the status code constants.
	 */

	// Success status codes.
	define(RESPONSE_SUCCESS_ACCOUNT_CREATION, serialize(array(true, 201)));
	define(RESPONSE_SUCCESS_ACCOUNT_UPDATED, serialize(array(true, 202)));
	define(RESPONSE_SUCCESS_DATE_LOGIN_UPDATED, serialize(array(true, 203)));
	define(RESPONSE_SUCCESS_PASSWORD_CHANGE, serialize(array(true, 204)));

	// Failure status codes.
	define(RESPONSE_FAILURE_EMAIL_ERROR, serialize(array(false, 501)));
	define(RESPONSE_FAILURE_ACCOUNT_CREATION, serialize(array(false, 502)));
	define(RESPONSE_FAILURE_PASSWORD_INVALID, serialize(array(false, 503)));
	define(RESPONSE_FAILURE_PASSWORD_CHANGE, serialize(array(false, 504)));
?>