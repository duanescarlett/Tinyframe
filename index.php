<?php

	session_cache_limiter(false);
	session_start();
	
	// Get the configuration variables
	require_once 'Core/config.php';

	 // Load the Open Source modules
	require_once configs()['AppBase'] .'vendor/autoload.php';
	
	 // Load the the system modules
	require_once configs()['AppBase'] .'Core/view.php';
	require_once configs()['AppBase'] .'Core/routes.php';
	require_once configs()['AppBase'] .'Core/database.php';
	
	// Load the system helpers
	require_once configs()['AppBase'] .'Core/Helpers/hasher.php';
	require_once configs()['AppBase'] .'Core/Helpers/formData.php';
	require_once configs()['AppBase'] .'Core/Helpers/validation.php';
	require_once configs()['AppBase'] .'Core/Security/filters.php';
	require_once configs()['AppBase'] .'Core/Security/csrf.php';
	
	DEFINE('DB_USER', configs()['Database']['user']);
	DEFINE('DB_HOST', configs()['Database']['host']);
	DEFINE('DB_PASSWORD', configs()['Database']['password']);
	DEFINE('DB_NAME', configs()['Database']['name']);
	DEFINE('DB_DRIVER', configs()['Database']['driver']);
	
	// Start the engine
	$routes = new Routes;
