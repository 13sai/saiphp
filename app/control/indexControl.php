<?php
namespace app\control;
use core\lib\model;
class indexControl extends \core\sai{
	public function __construct($module, $control, $action){
		parent::__construct($module, $control, $action);
		$m = new \app\model\optionModel();
		$con['ORDER'] = array('id'=>'DESC');
		$con['is_top'] = '1';
		$con['LIMIT'] = array(0,10);
		$this->recommand = $m->lists('article',$con);
	}

}