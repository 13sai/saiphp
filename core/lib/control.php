<?php
namespace core\lib;
use \core\sai;
class control extends sai{
    public $module;
    public $control;
    public $action;

    public function __construct(){
    }

    //输出
    public function response($code, $data){
        $data['module'] = $this->module;
        $data['control'] = $this->control;
        $data['action'] = $this->action;
        return json_encode(['code' => $code, 'data' => $data]);
    }
}