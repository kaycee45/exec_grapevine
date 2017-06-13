<?php

class Unit_test{
	
	public $block;
	
	public function innit($name, $desc){
		$this->block = array();
		$this->block['name'] = $name;
		$this->block['description'] = $desc;
	}
	
	public function assert($assert, $desc){
		if(!array_key_exists('asserts', $this->block)){
			$this->block['asserts'] = array();
		}
		$truthy = ($assert) ? "PASS" : "FAIL";
		$this->block['asserts'][] = array($desc, $truthy);
	}
	
	public function check_func($function, $args, $expected, $desc){
		if(!array_key_exists('function', $this->block)){
			$this->block['functions'] = array();
		}
		$return = call_user_func_array($function, $args);
		if($expected){
			$truthy = ($return == $expected) ? "PASS" : "FAIL";
		}
		else $truthy = true;
		
		$this->block['functions'][] = array($desc, $truthy);
	}
	
	public function get_report(){
		echo "<pre>";
		print_r($this->block);
		echo "</pre>";
	}
}
?>