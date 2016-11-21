<?php
namespace zeta\model;
use core\lib\model;
class indexModel extends model{	
	//public $table = 'main';
	public function insertOne($table,$data){
		$result = $this->insert($table,$data);
		return $result;
	}
	
	public function updateOne($table,$data,$where){
		$result = $this->update($table,$data,$where);
		return $result;
	}
	
	public function deleteOne($table,$where){
		$result = $this->delete($table,$where);
		return $result;
	}
}
