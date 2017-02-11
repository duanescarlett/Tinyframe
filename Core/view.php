<?php
	// This is the overhead class for controllers
	 
	class View{

		public function model($model){
			require_once configs()['AppBase'] . 'Model/' . $model . '.php';
			return new $model();
		}
		
		public function viewLoader($view, $data = ''){
			require_once configs()['AppBase'] . 'View/' . $view . '.php';
		}
		
	}