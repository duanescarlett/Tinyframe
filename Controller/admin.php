<?php

//use RandomLib\Factory;
use Core\Helpers\Hasher;

    class Admin extends View{
		
		private $form;
		private $hasher;
		private $user;
		private $val;
		private $data;
		private $mailer;
		private $randomLib;
		
		public function __construct(){
			// New model created
            $this->user = $this->model('User');
			$this->hasher = new Hasher(configs());
			$this->csrf = new Csrf(configs());
			$this->form = new FormData();
			$this->val = new Validation($this->user);
			$this->mailer = new PHPMailer();
			$this->randomLib = new RandomLib\Factory;
			// Return this for RandomLib
			$this->randomLib->getMediumStrengthGenerator();
			
			$this->user->bootUp();
			//$this->csrf->call();
		}
		
		public function email($subject, $message, $recipient){
			$this->mailer->IsSMTP();
			$this->mailer->Host = configs()['Email']['host'];
			$this->mailer->SMTPAuth = configs()['Email']['host'];
			$this->mailer->SMTPSecure = configs()['Email']['smtp_secure'];
			$this->mailer->Port = configs()['Email']['port'];
			$this->mailer->Username = configs()['Email']['username'];
			$this->mailer->Password = configs()['Email']['password'];
			$this->mailer->isHTML = configs()['Email']['html'];
			$this->mailer->Subject = $subject;
			$this->mailer->Body = $message;
			$this->mailer->addAddress($recipient);     // Add a recipient
			$this->mailer->From = configs()['Email']['username'];
			
			if(!$this->mailer->send()) {
				echo 'You might need to configure your email settings in your config file</br>';
				echo '<b>PHPMailer Error:</b> ' . $this->mailer->ErrorInfo;
			} else {
				echo 'Message has been sent';
			}
			
			// Load an html page and maybe send some data
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/index');
			$this->viewLoader('Admin/Footer/footer');
		}
		
        public function start($name = ''){
			
			$this->user->build();
			$this->data = array();
			$this->data = $this->user::all();
			// Load an html page and maybe send some data
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/index', ['stack' => $this->data]);
			$this->viewLoader('Admin/Footer/footer');
        }
		
		public function login(){
			if(isset($_SESSION['csrf_token'])){
				$this->data = $_SESSION['csrf_token'];
			}
			else{
				$this->data = 'none';
			}
			
			// Load an html page and maybe send some data
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/login', ['token' => $this->data]);
			$this->viewLoader('Admin/Footer/footer');
		}
		
		public function logout(){
			// Load an html page and maybe send some data
			unset($_SESSION['user']);
			unset($_SESSION['username']);
			
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/login');
			$this->viewLoader('Admin/Footer/footer');
		}
		
		public function authenticate(){
			
			$array = array(
				"username" 	=> $this->form->get('username'),
				"pass" 		=> $this->hasher->hashy($this->form->get('loginpassword')),
				"remember" 	=> $this->form->get('remember'),
				"csrf_token"=> $this->form->get('csrf_token'),
			);
		
			$this->data = $this->user->login($array);
			
			//if(isset($this->data)){
			if($this->data){
				if(isset($array['remember'])){
					// Remember this login
					// RememberID
					$rId = $this->hasher->randomHashString($this->hasher->hashy($array['username']));
					$rToken = $this->hasher->randomHashString($array['pass']);
					
					$this->user->updateRememberCredentials(
						$rId,
						$rToken
					);
				}
			}
	
			// Load an html page and maybe send some data
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/authenticate', ['user' => $this->data]);
			$this->viewLoader('Admin/Footer/footer');
			
		}
		
		public function register(){
			// Load an html page and maybe send some data
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/register');
			$this->viewLoader('Admin/Footer/footer');
		}
		
		public function registration(){
			
			// Put these into and array indexed
			$password = $this->hasher->hashy($this->form->get('password'));
			$password_c = $this->hasher->hashy($this->form->get('password_confirm'));
			
			if($password[0] === $password_c[0]){
				
				$message = "They match";
				
				$date = new DateTime();
				
				$array = array(
					"firstname" => $this->form->get('fname'),
					"lastname"  => $this->form->get('lname'),
					"email"     => $this->form->get('email'),
					"username"  => $this->form->get('username'),
					"password"  => $password,
					"admin"     => 1,
					"reg_date"  => $date->getTimestamp(),
					"remember_id" => $this->hasher->hashy($this->hasher->randomHashString($password)),
					"active_hash" => $this->hasher->hashy($this->hasher->randomHashString($password . $date->getTimestamp())),
				);
				
				$this->val->validate([
					'firstname' => [$array['firstname'], 'required|min(2)'],
					'lastname'  => [$array['lastname'], 'required|min(2)'],
					'email'     => [$array['email'], 'required|email'],
					'username'  => [$array['username'], 'required|min(2)'],
					'password'  => [$array['password'], 'required'],
					//'password_confirm' => [$password_c, 'required|matches(password)'],
				]);
				
				if($this->val->passes()){
					
					// Insert
					/* $this->user->create([
						'firstname' => $array['firstname'],
						'lastname' => $array['lastname'],
						'email' => $array['email'],
						'username' => $array['username'],
						'pass' => $array['password'],
						'admin' => $array['admin'],
						'reg_date' => $array['reg_date'],
						'active' => 1
					]); */
					$this->user->createUser($array);
					
					//print_r($this->user->all()->toArray());
					
				}
				else{
					var_dump($this->val->errors());
					die('failed');
				}
				
				
			}
			else{
				$message = "They dont match";
			}
			
			//$this->email("Resgistration", "You are now registered", "duanescarlett@gmail.com");
			
			// Load an html page and maybe send some data
			$this->viewLoader('Admin/Header/header');
			$this->viewLoader('Admin/registration');
			$this->viewLoader('Admin/Footer/footer');
		}

		public function create(){
			// Insert
			$this->user->create([
				'firstname' => $array['firstname'],
				'lastname' => $array['lastname'],
				'email' => $array['email'],
				'username' => $array['username'],
				'pass' => $array['password'],
				'admin' => $array['admin'],
				'reg_date' => $array['reg_date'],
				'active' => 1
			]);
		}
		
		public function read(){
			
		}
		
		public function update(){
			$this->user->where('active', 1)
          ->where('destination', 'San Diego')
          ->update(['delayed' => 1]);
		}
		
		public function delete(){
			
		}
    }
	
