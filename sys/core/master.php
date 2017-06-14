<?php

class Master extends mysqli{
	
	public $error;
	
	public function __construct(){
		//Database connection
		
		/*parent::construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if($this->connect_errno){
			if(ENV == 'dev'){
				die("Error establishing a database connection:".$this->connect_error);
			}
		}*/
	}
	
	
	public function controller($query){
		
		$url = URL_BASE."?c=".$query['c']."&m=".$query['m']."&r=1";
		if(isset($query['r'])){
			require(APP_DIR."/controllers/".$query['c'].".php");
			$control = ucfirst($query['c']);
			$con = new $control();
			call_user_func(array($con, $query['m']));
		}else{
			header("Location:".$url);
		}
	}
	
	public function model($model){
		require(APP_DIR."/models/".$model.".php");
		$model = ucfirst($model);
		return new $model();
	}
	
	public function view($view, $data){
		if(count($data) > 0){
			foreach($data as $variable => $value){
				$$variable = $value;
			}
		}
		require(APP_DIR."/views/".$view.".php");
	}
}
?>