<?php

require_once('unit_test.php');

class Master_test extends Unit_test{
	
	public $error;	
	
	public function controller($query){	
		$this->innit('Test Controllers', 'Should properly render a controller without problem');
		
		$url = URL_BASE."?c=".$query['c']."_test&m=".$query['m']."&r=1";
		if(isset($query['r'])){
			require(TEST_DIR."/controllers/".$query['c']."_test.php");
			$control = ucfirst($query['c']."_test");
			$con = new $control();
			
			$this->assert( file_exists(APP_DIR."/controllers/".$query['c'].".php"), "Verify that the controller file exists");
			$this->check_func(array($con, $query['m']), array(), true, "should render the function ".$query['m']."()");
			$this->get_report();
			
			//Test the models
			$this->model('m_default');
		}
		else{
			header("Location:".$url);
		}
	}
	
	public function model($model){
		$this->innit('Test Models', 'Should properly render a model without problem');
		$this->assert(file_exists(APP_DIR."/models/".$model.".php"), "Verify that the model file exists");
		
		require(TEST_DIR."/models/".$model."_test.php");
		$model = ucfirst($model."_test");
		$this->get_report();
	}
}
?>