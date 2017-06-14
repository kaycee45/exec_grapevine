<?php

require_once(MASTER);

class C_default extends Master{
	
	public function index(){
		$model = $this->model('m_default');
		$data['consultants'] = null;
		
		if(isset($_POST['search'])){
			$result = $model->search(null, trim($_POST['consultant']), $_POST['office'], $_POST['area'], $_POST['location'], $_POST['salary']);
			$data['consultants'] = $result;
		}
		$this->view('v_default', $data);
	}
	
}
?>