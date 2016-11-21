<?php
//路由规则
namespace core\lib;
use core\lib\conf;
class session{
	public function __construct(){
		session_start();
	}
	public function set($name, $value){
		$_SESSION[$name] = $value;
	}

	public function get($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		return null;
	}

	public function delete($name){
		unset($_SESSION[$name]);
	}

	public function destroy(){
		session_destroy;
	}
}