<?php
//路由规则
namespace core\lib;
use core\lib\conf;
class uploadFile{
    public $save_path;//上传文件保存路径
    public $allow_types;//允许上传的文件扩展名，不同文件类型用“|”隔开
    public $max_size;//设置上传文件大小
    public $file_name;//重命名方式代表以时间命名，其他则使用给予的名称
    public $allow_null;//可否空文件上传
    public $config = array();//配置
    public $files;//提交的等待上传文件
    public $ext;//文件类型

    /**
    * 构造函数，初始化类
    * @access public
    * @param string $file_name 上传后的文件名
    * @param string $save_path 上传的目标文件夹
    */
    public function __construct($config) {
        $save_path = isset($config['save_path']) ? $config['save_path'] : './upload/';
        $allow_types = isset($config['allow_types']) ? $config['allow_types'] : 'jpg|gif|png|zip|rar';
        $max_size = isset($config['max_size']) ? $config['max_size'] : '10280';
        $file_name = isset($config['file_name']) ? $config['file_name'] : 'time';
        $allow_null = isset($config['allow_null']) ? $config['allow_null'] : false;

        $this->save_path   = (preg_match("/\/$/",$save_path)) ? $save_path : $save_path . '/';
        $this->allow_types = strtolower($allow_types);
        $this->max_size = $max_size;
        $this->file_name = $file_name;
        $this->allow_null = $allow_null;
    }
    
	public function uploadDo($file){
		//检测是否选择文件
		if($this->allow_null != false){
			foreach( $file as $key=>$value ){
	        	if($value['error'] == 4){
		        	break;
		        	$arguments = false;
	    			$msg = '请选择文件！';
	            	return self::output($msg, $arguments);
	            	die();
	        	}
	        }
		}
	    	
        //检测是否超过限制大小
		$result = $this->check_size($file);
		if($result == false){
			$arguments = false;
    		$msg = '文件过大！';
            return self::output($msg, $arguments);
            die();
		}
		//检测路径
		if(!is_dir($this->save_path)){
			$st = mkdir($this->save_path,0777);
			if($st == false){
				$msg = '请选择正确的存储路径';
		    	$arguments = false;
	            return self::output($msg, $arguments);
	            die();
			}
		}
		
		$result = array();
    	$i = $k = 0;
		foreach( $file as $key=>$value ){
			$k++;
			if($value['error'] == 0){
	        	$i++;
	        	$type = $this->check_file_type($file[$key]['name']);
	        	$birthname = time().$i;

	        	$pathname = $this->check_file_exist($this->save_path . $birthname , $type);
	            move_uploaded_file($file[$key]["tmp_name"], $pathname);
	    		array_push($result,substr($pathname,1));
    		}elseif($value['error'] == 0){
	    		$i++;
    		}
        }
        if($i == $k){
	        $arguments = $result;
			$msg = '成功！';
        }else{
	        $arguments = $result;
	        $msg = '成功';
        }
        
        return self::output($msg, $arguments);
	}
	 /**
   * 检查上传文件类型
   * @access public
   * @param string $filename 等待检查的文件名
   * @return 如果检查通过返回true 未通过则返回false和错误消息
   */
    public function check_file_type($filename = null){
        $ext = $this->get_file_type($filename);
        $ext = strtolower($ext);
        $allow_types = explode('|',$this->allow_types);
        
        //检查上传文件扩展名是否在请允许上传的文件扩展名中
        if(in_array($ext,$allow_types)){
            return $ext;
        }else{
            $msg = '文件类型不对!';
            $arguments = false;
            return self::output($msg, $arguments);
        }
    }

    /*
     * 判断文件是否已存在
     * @access public
     * @param string $filename 要取得文件类型的目标文件名
     * @return string 文件类型
     */
    public function check_file_exist($filename, $type){
        if (file_exists($filename.'.'.$type)){
	        //重命名
			$filename = $filename.rand(0,99);
			$this->check_file_exist($filename, $type);
		}else{
    		return $filename.'.'.$type;
		}
    }

    /**
     * 取得文件类型
     * @access public
     * @param string $filename 要取得文件类型的目标文件名
     * @return string 文件类型
     */
    public function get_file_type($filename){
        $info = pathinfo($filename);
        $type = $info['extension'];
        return $type;
    }
    
    /**
     * 检测文件大小
     * @access public
     * @param string $filename 要取得文件类型的目标文件名
     * @return string 文件类型
     */
    public function check_size($file){
        foreach ($file as $key=>$value){
	        if($value['size'] > $this->max_size){
		        return false;
		        break;
	        }
        }
        return true;
    }

    static protected function output($msg,$arguments){
	    $data['result'] = $arguments;
	    $data['info'] = $msg;
	    return $data;
    }
}