<?php
//输出
function p($var){
	if(is_bool($var)){
		var_dump($var);
	}else if(is_null($var)){
		var_dump(null);
	}else{
		echo "<pre style='position:relative;z-index:100;padding:10px;border-radius:5px;background:#f5f5f5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var, true)."</pre>";
	}
}

function _method(){
	return strtolower($_SERVER['REQUEST_METHOD']);
}


//截取字符串
function cutArticle($data,$cut){     
	$data=strip_tags($data);//去除html标记  
	$pattern = "/&[a-zA-Z]+;/";//去除特殊符号  
	$data=preg_replace($pattern,'',$data);  
	if(!is_numeric($cut))  
	    return $data;  
	if($cut>0)  
	    $data=mb_strimwidth($data,0,$cut,"...","utf8");  
	return $data;  
}

//获取post值
function post( $name = null, $default = false){
	if($name == null){
		return $_POST;
	}elseif(isset($_POST[$name])){
		return $_POST[$name];
	}else{
		return $default;
	}
}

//获取get值
function get($name, $default = false){
	if(isset($_GET[$name])){
		return $_GET[$name];
	}else{
		return $default;
	}
}

//跳转
function jump($url){
	header('location:'.$url);
}