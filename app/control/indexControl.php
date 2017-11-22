<?php
namespace app\control;
<<<<<<< HEAD
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
=======

use core\lib\control;

class indexControl extends control{
    public function __construct()
    {
        parent::__construct();
    }
>>>>>>> 51f6307bd2895712e81346576dab99540bbb3377

    public function test()
    {
        echo $this->response(0,['ahb'=>1]);
    }
}