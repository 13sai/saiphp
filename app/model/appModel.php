<?php
namespace app\model;
use core\lib\model;
class appModel extends model{	


	public function getPN($table,$id,$con = null){
		if(!empty($con)) $reg = $con;
    	$where['ORDER'] = 'id desc';
    	$reg['id[<]'] = $id;
    	$where['AND'] = $reg;
    	$result['prev'] = $this->get($table, '*', $where);
    	
    	$con['ORDER'] = 'id asc';
    	$con['id[>]'] = $id;
    	$where1['AND'] = $con;
    	$result['next'] = $this->get($table, '*', $where1);
    	return $result;
	}
}