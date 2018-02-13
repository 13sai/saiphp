<?php
//路由规则
namespace Core\Lib;
use Core\Lib\Conf;
class Image{
	public function code(){
	    session_start();
	    $image = imagecreatetruecolor(100, 30);
	    $bgcolor = imagecolorallocate($image,255,255,255);
	    imagefill($image, 0, 0, $bgcolor);
	    $captcha_code = "";
	    for($i=0;$i<4;$i++){
	        $fontsize = 6;
	        $fontcolor = imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));            //0-120深颜色
	        $fontcontent = rand(0,9);
	        $captcha_code .= $fontcontent;
	        $x = ($i*100/4)+rand(5,10);
	        $y = rand(5,10);

	        imagestring($image,$fontsize,$x,$y,$fontcontent,$fontcolor);
	    }
	    $_SESSION['authcode'] = $captcha_code;
	    for($i=0;$i<200;$i++){
	        $pointcolor = imagecolorallocate($image,rand(50,200), rand(50,200), rand(50,200));
	        imagesetpixel($image, rand(1,99), rand(1,29), $pointcolor);
	    }

	    self::output($image);
	}

	static protected function output($image, $type = 'png', $filename = ''){
        header("Content-type: image/" . $type);
        $ImageFun = 'image' . $type;
        if (empty($filename)) {
            $ImageFun($image);
        } else {
            $ImageFun($image, $filename);
        }
        imagedestroy($image);
    }
}