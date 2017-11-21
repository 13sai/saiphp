<?php
namespace core;
class sai{
	public static $classMap = array();
	public $_options = array();
	
	public function __construct(){
		$smarty = new \Smarty;
		$smarty->debugging = false;
		$smarty->caching = false;
		$smarty->template_dir= APP.'/views/';  //设置模板目录
		$smarty->compile_dir = APP."/templates_c/";  //设置编译目录
		$smarty->cache_dir = APP."/cache/";  //缓存文件夹
		$smarty->cache_lifetime = 60;
		$smarty->left_delimiter = "<{";  //左定界符
		$smarty->right_delimiter = "}>"; //右定界符
		$this->tpl = $smarty;
	}
	
	public static function run(){

		//调用路由类
		$route = new \core\lib\route();


		$control = $route->control;
		$action = $route->action;


		$controlFile = APP.'/control/'.$control.'Control.php';
		$controlClass = '\\'.MODULE.'\control\\'.$control.'Control';

		if(is_file($controlFile)){
			include $controlFile;
			$control = new $controlClass($control,$action);

			$control->$action();

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
			$file = SAI.'/'.$class.'.php';
			if(is_file($file)){
				//p($file);
				include $file;
				self::$classMap[$class] = $class;
			}else{
				return false;
			}
		}
	}

	//输出变量
	public function assign($key, $value = null){
		if (is_array($key)) {
            foreach ($key as $k => $v) {
                $this->_options[$k] = $v;
            }
        } else {
            $this->_options[$key] = $value;
        }
	}

	//解析模板  输出变量
	public function display($file, $array = array()){
		$_options = $this->_options;
		if(!empty($array)){
			foreach( $array as $key => $value )
			{
				$this->tpl->assign($key, $value);
			}
		}
		if(!empty($_options)){
			foreach( $_options as $key => $value )
			{
				$this->tpl->assign($key, $value);
			}
		}
		$this->tpl->display($file);
	}

	public function code(){
		$image = new \core\lib\image();
		$image->code();
	}
}