<?php

require_once('unit_test.php');

class Master extends Unit_test{
	
	public $error;	
	
	public function controller($query){	
		$this->innit('Test Controllers', 'Should properly render a controller without problem');
		
		$url = URL_BASE."?c=".$query['c']."&m=".$query['m']."&r=1";
		if(isset($query['r'])){
			require(APP_DIR."/controllers/".$query['c'].".php");
			$control = ucfirst($query['c']);
			$con = new $control();
			
			$this->assert( file_exists(APP_DIR."/controllers/".$query['c'].".php"), "Verify that the controller ".$query['c']." exists");
			$this->check_func(array($con, $query['m']), array(), null, "should render the function ".$query['m']."()");
			
			$this->get_report();
		}
		else{
			header("Location:".$url);
		}
	}
	
	public function model($model){
		$this->innit('Test Models', 'Should properly render a model without problem');
		$this->assert(file_exists(APP_DIR."/models/".$model.".php"), "Verify that the model ".$model." exists");
		
		require(APP_DIR."/models/".$model.".php");
		$model = ucfirst($model);
		$mod = new $model();
		
		$this->check_func(array($mod, "mock_db"), array(), null, "should render the function mock_db()");
		$args = array(null, null, null, null, $location="London", $sal="0-100000");
		$this->check_func(array($mod, "search"), $args, null, "should render the function search()");
			
		$this->get_report();
	}
	
	public function view($view, $data=null){
		$this->innit('Test Views', 'Should properly render a view without problem');
		$this->assert(file_exists(APP_DIR."/views/".$view.".php"), "Verify that the model ".$view." exists");
	}
}
?>