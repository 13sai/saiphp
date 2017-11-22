<?php
namespace core\lib;
use core\lib\conf;
class log{
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