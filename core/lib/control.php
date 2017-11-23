<?php
namespace core\lib;
use function Composer\Autoload\includeFile;
use \core\sai;
class control extends sai{
    public $module;
    public $control;
    public $action;

    public function __construct(){
    }

    // 输出
    public function response($code, $data = mull){
        return json_encode(['code' => $code, 'data' => $data]);
    }

    // 模板输出
    public function show($file, $data = null){
        $base = ['module' => $this->module, 'control' => $this->control, 'action' => $this->action];

        if(!empty($data)){
            $data = array_merge($base, $data);
        }else{
            $data = $base;
        }

        foreach ($data as $k=>$v){
            $$k = $v;
        }

        include SAI.$this->module.'/views/'.$file.'.html';
    }
}