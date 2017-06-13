<?php

require_once('unit_test.php');

class Master_test extends Unit_test{
	
	public $error;	
	
	public function controller($query){	
		$this->innit('Test Controllers', 'Should properly render the controller without problem');
		$url = URL_BASE."?c=".$query['c']."&m=".$query['m']."&r=1";
		if(isset($query['r'])){
			require(TEST_DIR."/controllers/".$query['c']."_test.php");
			$control = ucfirst($query['c']);
			$con = new $control();
			
			$this->check_func(array($con, $query['m']), array(), true, "should render the function ".$query['m']."()");
			$this->get_report();
		}
		else{
			header("Location:".$url);
		}
	}
}
?>