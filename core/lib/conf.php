<?php
namespace core\lib;

class conf{
	static public $conf = array();

	//加载配置项
	static public function get($name, $file){
        $file = strtolower($file);
		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{
			$path = SAI.'/core/config/'.$file.'.php';
			if(is_file($path)){
				//p(1);
				$conf = include $path;
				if(isset($conf[$name])){
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					return false;
				}
			}else{
                return false;
			}
		}
	}

	//加载配置文件
	static public function all($file){
        $file = strtolower($file);
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$path = SAI.'/core/config/'.$file.'.php';
			if(is_file($path)){
				//p(1);
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
                return false;
			}
		}
	}
}