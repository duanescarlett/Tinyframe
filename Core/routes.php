<?php

	class Routes{
		
		protected $controller = 'index';
		protected $method = 'start';
		protected $params = [];
		private $url;
		public $db;
		public $csrf;
		
		public function __construct(){
			$csrf = $this->csrf = new Csrf(configs());
			$url = $this->parseUrl();
			
			if(file_exists(configs()['AppBase'] . 'Controller/' . $url[0] . '.php')){
				$this->controller = $url[0];
				unset($url[0]);
				require_once configs()['AppBase'] . 'Controller/' . $this->controller . '.php';
			}
			else{
				// If the controller does not exists default to index
				require_once configs()['AppBase'] . 'Controller/' . $this->controller . '.php';
			}
			
			$class = $this->controller;
			$this->controller = new $class();
			
			if(isset($url[1])){
				if(method_exists($this->controller, $url[1])){
					$this->method = $url[1];
					unset($url[1]);
				}
			}
			
			if(is_array($url)){
				$this->params = array_values($url);// Get the URL method calls
			}
			
			call_user_func_array([$this->controller, $this->method], $this->params);
			
		}
		
		public function parseUrl(){
			
			if(isset($_GET['url'])){
				if(!isset($_GET['killSignal'])){
					return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
				}
				
			}
			
		}
		
	}