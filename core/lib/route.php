<?php
//路由规则
namespace core\lib;
use core\lib\conf;
class route{
	public $control;
	public $action;
	
	public function __construct(){
		/*
		获取url参数
		*/
		$parmstring = conf::get('PARSTRING', 'route');
		$parmstring = $parmstring + ZETA;
		$_surl = $_SERVER['REQUEST_URI'];
		if(isset($_surl) && $_surl != '/' && $_surl != '/index.php' && $_surl != '/index.php/zeta'){
			
			if(strpos($_surl,'/?') !== false){
				$this->control = conf::get('CONTROL','route');
				$this->action = conf::get('ACTION','route');
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
					$this->action = conf::get('ACTION','route');;
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
			//多余
			//if(!empty($_SERVER['QUERY_STRING'])){
			//	parse_str($_SERVER['QUERY_STRING'],$urlPar);
			//	array_merge($_GET, $urlPar);
			//}
			//if(!empty($_GET))$this->para = $_GET;
			//p($_GET);
		}else{
			$this->control = conf::get('CONTROL','route');
			$this->action = conf::get('ACTION','route');
		}
	}
}