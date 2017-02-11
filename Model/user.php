<?php
	
use Illuminate\Database\Eloquent\Model as Eloquent;

    class User extends Eloquent {

        public $name;
		public $db;
		public $timestamps = [];
		protected $table = 'user';
		protected $fillable = [
			'firstname',
			'lastname',
			'email',
			'username',
			'pass',
			'admin',
			'reg_date',
			'updater',
			'active',
			'active_hash',
			'recovery_hash',
			'remember_id',
			'remember_token',
		];
		
		public function bootUp(){
			$this->db = new Database();
			$this->db->schema();
		}
		
		public function login($array){
			
			try{
				$user = $this->where('username', $array['username'])
				->where('pass', $array['pass'])
				->first();
				
				if($user){
					$_SESSION['username'] = $array['username'];
					return true;	
				}
				else{
					return false;
				}	
			}
			catch (Illuminate\Database\QueryException $e){
				$error_code = $e->errorInfo[1];
				if($error_code == 1062){
					echo 'Login failed, please try again';
					//return 'houston, we have a duplicate entry problem';
				}
			}

		}
		
		public function build(){
			$sql = "CREATE TABLE IF NOT EXISTS user (
						id INT(11) AUTO_INCREMENT PRIMARY KEY, 
						firstname VARCHAR(30) NOT NULL,
						lastname VARCHAR(30) NOT NULL,
						username VARCHAR(30) NOT NULL,
						pass TEXT NOT NULL,
						email VARCHAR(50) NOT NULL,
						admin TINYINT,
						reg_date VARCHAR(255),
						updater VARCHAR(255),
						active TINYINT,
						active_hash VARCHAR(255),
						recovery_hash VARCHAR(255),
						remember_id VARCHAR(255),
						remember_token VARCHAR(255)
					)";
		}
		
/* 		public function insert($array){
			$date = new DateTime();
			
			$stack = array(
				'firstname' => $array['firstname'],
				'lastname' => $array['lastname'],
				'username' => $array['username'],
				'pass' => $array['password'],
				'email' => $array['email'],
				'admin' => $array['admin'],
				'reg_date' => $date->getTimestamp(),
				'updater' => $date->getTimestamp(), 
				'active' => true,
			);
			
			$table = "user";
			$this->db->insert($table, $stack);

		} */
		
		public function createUser($array){

			try{
				$this->create([
					'firstname' => $array['firstname'],
					'lastname' => $array['lastname'],
					'email' => $array['email'],
					'username' => $array['username'],
					'pass' => $array['password'],
					'admin' => $array['admin'],
					'reg_date' => $array['reg_date'],
					'active' => 0,
					'remember_id' => $array['remember_id'],
					'active_hash' => $array['active_hash'],
				]);
			}
			catch (Illuminate\Database\QueryException $e){
				$error_code = $e->errorInfo[1];
				if($error_code == 1062){
					echo 'houston, we have a duplicate entry problem';
					//return 'houston, we have a duplicate entry problem';
				}
			}
		}
		
		public function removeTokenId(){
			updateRememberCredentials(null, null);
		}
		
		public function allUsers($bool){
			$date = new DateTime();
			$sql = "SELECT * FROM user WHERE 1 AND admin LIKE '$bool' LIMIT 10";
			//$stack = $this->db->query($sql);	
			//return $stack;
			
		}
		
		public function updateRememberCredentials($rememberID, $rememberToken){
			$this->where('username', $_SESSION['username'])
			->update([
				'remember_id' => $rememberID,
				'remember_token' => $rememberToken,
			]);
		}
    }
	