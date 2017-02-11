<?php

	class FormData {
		
		private $key;
		private $value;
		public $data = array();
		
		public function __construct(){
			
			foreach ($_POST as $key => $value){
				$this->data[$key] = $value;
			}

		}
		
		public function printIt(){
			print_r($this->data);
		}
		
		public function get($key){
			if(isset($this->data[$key]))
				return trim($this->data[$key]);
		}
		
	}