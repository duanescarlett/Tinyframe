<?php

use Illuminate\Database\Capsule\Manager as Capsule;


	class Database{
		
		public $db;
		
		public function __construct(){
			
			$this->db = new Capsule;
			$this->db->addConnection([
				'driver' => DB_DRIVER,
				'host' => DB_HOST,
				'database' => DB_NAME,
				'username' => DB_USER,
				'password' => DB_PASSWORD,
				'charset' => 'utf8',
				'collation' => 'utf8_unicode_ci',
				'prefix' => '',
				'strict' => false,
			]);

			$this->db->setAsGlobal();
			$this->db->bootEloquent();
			
		}
		
		// This is where you add the schema
		public function schema(){
			if($this->db::schema()->hasTable('user')){
				
			}
			else{
				$this->db::schema()->create('user', function($table){
					$table->increments('id');
					$table->string('firstname');
					$table->string('lastname');
					$table->string('username')->unique();
					$table->longText('pass');
					$table->string('email')->unique();
					$table->boolean('admin');
					$table->string('reg_date');
					$table->string('updater');
					$table->boolean('active');
					$table->longText('active_hash');
					$table->longText('recovery_hash');
					$table->longText('remember_id');
					$table->longText('remember_token');
				});
			}
		}
		
	}