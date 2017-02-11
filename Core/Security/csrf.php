<?php 

use Core\Helpers\Hasher;

	class Csrf {
		
		private $config;
		private $key;
		private $hasher;
		
		public function __construct($config){
			$this->config = $config;
			$this->hasher = new Hasher($config);
		}
		
		public function check(){
			
			$this->key = $this->config()['CSRF']['session'];
			
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				if(!isset($_POST[$this->key]) || ($_POST[$this->key] !== $_SESSION[$this->key])){
					// The token is invalid
					die('Invalid Request');
				}
			}
			
			$_SESSION[$this->key] = $this->hasher->hashy($this->hasher->randomHashString(date("h:i:sa")."salt"));
			
		}
		
	}