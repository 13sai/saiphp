<?php
namespace app\model;
use core\lib\model;
class optionModel extends model{	
	//public $table = 'main';
	public function listall($table){
		$result = $this->select($table,'*');
		return $result;
	}
	
	public function counts($table,$where = array()){
		$result = $this->count($table,$where);
		return $result;
	}
	
	public function lists($table,$limit){
		$result = $this->select($table,'*',$limit);
		return $result;
	}

	public function getOne($table,$where){
		$result = $this->get($table, '*', $where);
		return $result;
	}

	public function insertOne($table,$data){
		$id = $this->insert($table, $data);
		return $id;
	}

	public function setOne($table,$id,$index,$data){
		$result = $this->update($table, $data, array(
			$index=>$id
		));
		return $result;
	}

	public function delOne($table,$id,$index){
		$result = $this->delete($table, array(
			$index=>$id
		));
		return $result;
	}
}