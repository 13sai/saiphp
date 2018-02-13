<?php
namespace Core\Lib;
use Core\Lib\Conf;
class Log{
	static $class;
	/*
	存储方式
	写入日志
	*/
	static public function init(){
		$drive = conf::get('DRIVE','log');
		//p($drive);
		$class = '\core\lib\drive\log\\'.$drive;
		//p($class);
		self::$class = new $class;
	}

	static public function log($name){
		self::$class->log($name);
	}
}