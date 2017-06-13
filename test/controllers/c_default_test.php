<?php

require_once(SYS_DIR."/core/master.php");

class C_default_test extends Master{
	
	public function index(){
		$model = $this->model('m_default');
		return true;
	}
	
}
?>