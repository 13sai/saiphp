<?php
namespace core\lib;

class conf{
	static public $conf = array();

	//加载配置项
	static public function get($name, $file){
		
		if(isset(self::$conf[$file])){
			return self::$conf[$file][$name];
		}else{
			$path = SAI.'/core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include $path;
				if(isset($conf[$name])){
					self::$conf[$file] = $conf;
					return $conf[$name];
				}else{
					echo '没有此配置项';
				}
			}else{
				echo '没有配置文件';
			}
		}
	}

	//加载配置文件
	static public function all($file){
		if(isset(self::$conf[$file])){
			return self::$conf[$file];
		}else{
			$path = SAI.'/core/config/'.$file.'.php';
			if(is_file($path)){
				$conf = include $path;
				self::$conf[$file] = $conf;
				return $conf;
			}else{
				echo '没有配置文件';
			}
		}
	}
}