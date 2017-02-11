<?php 

	function configs(){
		
		$baseUrl = 'tinyframe/';
		return array(
		
			// This gives you the system file location
			'AppBase' => $_SERVER['DOCUMENT_ROOT'].'/'.$baseUrl,
			
			// This gives you the project root
			'AppRoot' => dirname($_SERVER['REQUEST_URI']),
		
			// Php encryption setting
			'Hash' => [
				'Algo' => PASSWORD_BCRYPT, 
				'Cost' => 10
			],
			
			// Database settings
			'Database' => [
				'user' => 'root', 
				'host' => '127.0.0.1', 
				'password' => 'root', 
				'name' => 'testShell',
				'driver' => 'mysql',
			],
			
			// Athentication settngs
			'Auth' => [
				'session' => 'user_id',
				'remember' => 'user_remember'
			],
			
			// Email settings
			'Email' => [
				'smtp_auth' => true,
				'smtp_secure' => 'tls',
				'host' => 'smtp.gmail.com',
				'username' => 'duanescarlett@gmail.com',
				'password' => 'LX:954Dos#',
				'port' => 587,
				'html' => true
			],
			
			// CSRF settings
			'CSRF' => [
				'session' => 'csrf_token'
			],
			
		);
		
	}
	