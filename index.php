<?php
/*
入口文件
1.定义常量
2.加载数据库
3.启动框架
*/
//定义常量
if(strpos($_SERVER['REQUEST_URI'],'/index.php/zeta') !==false){
	define('MODULE','zeta');
	define('ZETA',1);
}else{
	define('MODULE','app');
	define('ZETA',0);
};
define('SAI',str_replace('\\','/',realpath('./')));
define('CORE',SAI.'/core');
define('APP',SAI.'/'.MODULE);
define('DEBUG',true);
//引入vendor
include "vendor/autoload.php";
//echo 1;die();
//调试模式
if(DEBUG){
	//引入调试包
	$whoops = new \Whoops\Run;
	//设置标题
	$errorTitle = "sai error";
	$option = new \Whoops\Handler\PrettyPageHandler();
	$option->setPageTitle($errorTitle);
	$whoops->pushHandler($option);
	$whoops->register();
	ini_set('display_error','on');
}else{
	ini_set('display_error','off');
}
//导入公共函数
include CORE.'/common/function.php';


//导入核心文件
include CORE.'/sai.php';

//判断是否加载  如果未加载  加载之
spl_autoload_register('\core\sai::load');

\core\sai::run();