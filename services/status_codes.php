<?php
	/**
	 * This file has all of the status code constants.
	 */

	// Success status codes.
	define(STATUS_CODE_SUCCESS_ACCOUNT_CREATION, 201);
	define(STATUS_CODE_SUCCESS_ACCOUNT_UPDATED, 202);
	define(STATUS_CODE_SUCCESS_DATE_LOGIN_UPDATED, 203);
	define(STATUS_CODE_SUCCESS_PASSWORD_CHANGED, 204);
	define(STATUS_CODE_SUCCESS_CREDENTIALS_VALID, 205);

	// Failure status codes.
	define(STATUS_CODE_FAILURE_EMAIL_ERROR, 501);
	define(STATUS_CODE_FAILURE_ACCOUNT_CREATION, 502);
	define(STATUS_CODE_FAILURE_PASSWORD_INVALID, 503);
	define(STATUS_CODE_FAILURE_PASSWORD_CHANGE, 504);
	define(STATUS_CODE_FAILURE_CREDENTIALS_EMAIL_INVALID, 505);
	define(STATUS_CODE_FAILURE_CREDENTIALS_PASSWORD_INVALID, 506);
?>