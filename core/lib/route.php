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
		获取url参数
		*/
		$parmstring = conf::get('PARSTRING', 'conf');
		$_surl = preg_replace('/.html$/','',$_SERVER['REQUEST_URI']);
		if(isset($_surl) && $_surl != '/' && $_surl != '/index.php'){
			
			if(strpos($_surl,'/?') !== false){
                $module = conf::get('DEFAULT_MODULE','conf');
				$control = conf::get('DEFAULT_CONTROL','conf');
				$action = conf::get('DEFAULT_ACTION','conf');
			}else{
				
				$matches = explode('?', trim($_surl, '/'));
				$pathArr = explode('/', trim($matches[0], '/'));
				
				if(isset($pathArr[$parmstring])){
					$module = $pathArr[$parmstring];
				}
				unset($pathArr[$parmstring + 1]);
				if(isset($pathArr[$parmstring + 1])){
					$control = $pathArr[$parmstring + 1];
				}
				unset($pathArr[$parmstring]);
				if(isset($pathArr[$parmstring + 2])){
					$action = $pathArr[$parmstring + 2];
				}else{
					$action = conf::get('DEFAULT_ACTION','conf');;
				}
				unset($pathArr[$parmstring + 2]);

				//url参数 get
				$count = count($pathArr) + 1;
				$i = $parmstring + 2;
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
			$module = conf::get('DEFAULT_MODULE','conf');
			$control = conf::get('DEFAULT_CONTROL','conf');
			$action = conf::get('DEFAULT_ACTION','conf');
		}

		$this->routes = $this->replaceRoute($module, $control, $action);
	}
	
	public function replaceRoute($module, $control, $action){
	    $routes = conf::all('route');
	    if(empty($routes)){
	        return $module.'/'.$control.'/'.$action;
        }
	    foreach($routes as $k => $v){
	        $k = '/'.str_replace('/', '\/', $k).'$/';
            $route = preg_replace($k, $v, $module.'/'.$control.'/'.$action);
        }

        return $route;
    }
}