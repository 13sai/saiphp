<?php
namespace Core;
class Sai{
	public static $classMap = array();
	public $_options = array();
	public function __construct(){
	}

	public static function run(){
		//调用路由类
		$route = new \core\lib\Route();
		//获取模块,控制器,方法
        $routes = $route->routes;
        list($moduleName, $controlName, $actionName) = explode('/', $routes);

		$controlFile = SAI.$moduleName.'/control/'.$controlName.'Control.php';
		$controlClass = '\\'.$moduleName.'\control\\'.$controlName.'Control';

		if(is_file($controlFile)){
			include $controlFile;
			$control = new $controlClass();
			$control->module = $moduleName;
			$control->control = $controlName;
			$control->action = $actionName;
			$control->$actionName();
		}else{
			p('找不到控制器');
		}
	}

	static public function load($class){
		/*
		自动加载类
		如果已加载，return 
		如果未加载过，引入
		*/
		if(isset($classMap[$class])){
			return true;
		}else{
			$class = str_replace('\\','/',$class);
			$file = SAI.$class.'.php';
			if(is_file($file)){
				//p($file);
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}
}