<?php

require_once(MASTER);

class M_default extends Master{
		
	public function mock_db(){
		$data = array(
			'office' => array(
						array('id'=>1, 'name'=>'office1', 'location'=>'London'),
						array('id'=>2, 'name'=>'office2', 'location'=>'Manchester'),
						array('id'=>3, 'name'=>'office3', 'location'=>'Birmingham'),
						array('id'=>4, 'name'=>'office4', 'location'=>'London')
				),
			'consultant' => array(
						array('id'=>1, 'name'=>'micheal ballack', 'salary'=>30000),
						array('id'=>2, 'name'=>'John smith', 'salary'=>45000),
						array('id'=>1, 'name'=>'Andy Yau', 'salary'=>130000)
				),
			'area' => array(
						array('id'=>1, 'area'=>'midlands', 'consultant_id'=>1, 'office_id'=>3),
						array('id'=>2, 'area'=>'east-midlands', 'consultant_id'=>1, 'office_id'=>2),
						array('id'=>3, 'area'=>'south', 'consultant_id'=>2, 'office_id'=>1),
						array('id'=>4, 'area'=>'midlands', 'consultant_id'=>3, 'office_id'=>3),
						array('id'=>5, 'area'=>'east-midlands', 'consultant_id'=>2, 'office_id'=>2),
						array('id'=>6, 'area'=>'south', 'consultant_id'=>1, 'office_id'=>1)
				),
		);
		return $data;
	}
	
	public function search($cid=null, $cname=null, $office=null, $area=null, $location=null, $sal=null){
		$data = array();	
		$mock_db = $this->mock_db();
		foreach($mock_db['consultant'] as $arr){
			$_cons = array();
			if($cid){
				if($cid == $arr['id']){
					$_cons['name'] = $arr['name'];
					$_cons['salary'] = $arr['salary'];
				}
			}
			else{
				$exp = explode('-', $sal);
				$min = isset($exp[0]) ? $exp[0] : 0; 
				$max = isset($exp[1]) ? $exp[1] : 1000000; 
				$match = (preg_match('/'.$cname.'/i', $arr['name']) == true) ? true : false;
				if($cname && $sal){
					if($match && ($arr['salary'] >= $min && $arr['salary'] <= $min)){
						$_cons['name'] = $arr['name'];
						$_cons['salary'] = $arr['salary'];
					}
				}
				else{
					if($match || ($arr['salary'] >= $min && $arr['salary'] <= $min)){
						$_cons['name'] = $arr['name'];
						$_cons['salary'] = $arr['salary'];
					}
				}
			}
			
			//check for data matching the recruitment area
			foreach($mock_db['area'] as $ar){
				if($area){
					if($ar['area'] == $area && $ar['consultant_id'] == $arr['id']){
						$_cons['recruitment-area'] = $ar['area'];
					} 
				}
				else{
					if($ar['consultant_id'] == $arr['id']){
						$_cons['recruitment-area'] = $ar['area'];
					} 
				}
				
				//check for data matching the office
				foreach($mock_db['office'] as $off){
					if($office || $location){
						if($off['name'] == $office && $off['id'] == $ar['office_id']){
							$_cons['office-name'] = $off['name'];
						} 
						if($off['location'] == $location && $off['id'] == $ar['office_id']){
							$_cons['office-location'] = $off['location'];
						} 
					}
					else{
						if($off['id'] == $ar['office_id']){
							$_cons['office-name'] = $off['name'];
							$_cons['office-location'] = $off['location'];
						} 
					}
				}
			}
			$data[] = $_cons;
		}
		return $data;
	}
}
?>