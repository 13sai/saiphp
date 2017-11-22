<?php
//路由规则
namespace core\lib;
use core\lib\conf;
class route{
	public $module;
    public $control;
    public $action;

    public function __construct(){
        /*
         * 获取url参数
         */
        $parmstring = conf::get('PARSTRING', 'conf');
        $_surl = preg_replace('/.html$/','',$_SERVER['REQUEST_URI']);
        if(isset($_surl) && $_surl != '/' && $_surl != '/index.php'){

            if(strpos($_surl,'/?') !== false){
                $this->module = conf::get('DEFAULT_MODULE','conf');
                $this->control = conf::get('DEFAULT_CONTROL','conf');
                $this->action = conf::get('DEFAULT_ACTION','conf');
            }else{
                $matches = explode('?', trim($_surl, '/'));
                $pathArr = explode('/', trim($matches[0], '/'));

                if(isset($pathArr[$parmstring])){
                    $this->control = $pathArr[$parmstring];
                }
                unset($pathArr[$parmstring]);
                if(isset($pathArr[$parmstring+1])){
                    $this->action = $pathArr[$parmstring+1];
                }else{
                    $this->action = conf::get('DEFAULT_ACTION','conf');;
                }
                unset($pathArr[$parmstring+1]);

                //url参数 get
                $count = count($pathArr) + 1;
                $i = $parmstring+2;
                //p($i);
                //$_GET = array();
                while($i < $count){
                    //防止出现奇数参数
                    if(isset($pathArr[$i+1])){
                        $_GET[$pathArr[$i]] = $pathArr[$i + 1];
                        $i += 2;
                    }
                }
            }
        }else{
            $this->module = conf::get('DEFAULT_MODULE','conf');
            $this->control = conf::get('DEFAULT_CONTROL','conf');
            $this->action = conf::get('DEFAULT_ACTION','conf');
        }
    }
}