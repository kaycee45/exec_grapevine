<?php

	
class Handler{
	
	private $config = array();
	
	public function __construct($config){
		$this->config = $config;
		$this->init();
	}
	
	public function init(){
		foreach($this->config["general"] as $key => $values){
			if($key == "environment"){
				$this->set_environment($values);
			}
		}
		
		define("DB_HOST", $this->config["database"]["db_host"]);
		define("DB_USER", $this->config["database"]["db_user"]);
		define("DB_PASS", $this->config["database"]["db_pass"]);
		define("DB_NAME", $this->config["database"]["db_name"]);
	}
	
	public function set_environment($env){
		$env = isset($env) ? $env : 'dev';
		if($env == 'dev' || $env == 'test') error_reporting(E_ALL);
		else error_reporting(0);
		
		define("ENV", $env);
	}	
}
	
?>