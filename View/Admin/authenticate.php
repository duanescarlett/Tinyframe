<?php

	require_once 'navigation.php';
	
	if(isset($_SESSION['username'])){
		echo 'Authenticated';
		echo $data['user'];
		echo $_SESSION['username'];
	}	
	else{
		echo 'Not authenticated';
	}

	