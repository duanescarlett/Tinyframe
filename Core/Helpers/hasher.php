<?php

namespace Core\Helpers;
use RandomLib\Factory;


class Hasher{
	
	private $config;
	private $randomLib;
	private $generater;
	
	public function __construct($config){
		$this->config = $config;
		$this->randomLib = new Factory;
		$this->generater = $this->randomLib->getMediumStrengthGenerator();
	}
	
	public function password($password){
		return password_hash(
			$password,
			$this->config['Hash']['Algo'],
			$this->config['Hash']
		);
	}
	
	public function passwordCheck($password, $hash){
		return password_verify($password, $hash);
	}
	
	public function hashy($input){
		return hash('sha256', $input);
	}
	
	public function hashCheck($know, $user){
		return hash_equals($know, $user);
	}
	
	public function randomHashString($string){
		return $this->generater->generateString(128, $string);
	}
	
}