<?php

	class Home extends View {

		public function start($name = ''){
			
			// New model created
			$user = $this->model('User');
			
			// Load an html page and maybe send some data
			$this->viewLoader('index', ['name' => $name]);
			
        }
		
		public function create(){
			
		}
		
	}