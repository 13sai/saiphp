<?php
//输出
function p($var){
    if(is_bool($var)){
        var_dump($var);
    }else if(is_null($var)){
        var_dump(null);
    }else{
        echo "<meta charset='utf-8'/><pre style='position:relative;z-index:100;padding:10px;border-radius:5px;background:#f5f5f5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>".print_r($var, true)."</pre>";
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
function post($name = null, $default = false, $type=false){
    if(!empty($_POST[$name])){
        if($type){
            switch ( $type )
            {
                case 'int':
                    if(is_numeric($_POST[$name])){
                        return $_POST[$name];
                    }else{
                        return $default;
                    }
                    break;
                default:
                    ;
                    break;
            }
        }else{
            return $_POST[$name];
        }
    }else{
        return $_POST;
    }
}

//获取get值
function get($name, $default = false, $fitt=false){
    if(isset($_GET[$name])){
        if($fitt){
            switch ( $fitt )
            {
                case 'int':
                    if(is_numeric($_GET[$name])){
                        return $_GET[$name];
                    }else{
                        return $default;
                    }
                    break;
                default:
                    ;
                    break;
            }
        }else{
            return $_GET[$name];
        }
    }else{
        return $default;
    }
}

//跳转
function jump($url){
    header('location:'.$url);
    exit();
}

//生成url
function sUrl($str,$arr = array()){
    $num = count($arr);
    if($num != 0){
        foreach($arr as $key => $value){
            $str.= '/'.$key.'/'.$value;
        }
    }
    echo '/index.php/'.$str.'.html';
}

//清空文件
function delFile($dirName, $self = false){
    if(file_exists($dirName) && $handle=opendir($dirName)){
        while(($item = readdir($handle)) !== false){
            if($item!= "." && $item != ".."){
                if(file_exists($dirName.'/'.$item) && is_dir($dirName.'/'.$item)){
                    delFile($dirName.'/'.$item);
                }else{
                    unlink($dirName.'/'.$item);
                }
            }
        }
        closedir( $handle );
        if($self !== false) unlink($dirName);
    }
}

//分页函数
function showPage($data, $url, $theme = '<ul class="am-pagination"><li class="prev"><a> %totalRow% %header% %nowPage%/%totalPage% 页 </a></li> %first% %prevPage% %linkPage% %nextPage% %end%</ul>', $rollPage = 2){
    $config = [
        'header' => '条记录',
        'prev' => '&lt;',
        'next' => '&gt;',
        'first' => '&laquo;',
        'last' => '&raquo;',
        'theme' => $theme
    ];

    $_pagelist = '';

    for ($i=$rollPage; $i>=1; $i--) {
        $_page = $data['page']-$i;
        if ($_page < 1) continue;
        $_pagelist .= '<li><a href="'.$url.$_page.'">'.$_page.'</a></li>';
    }

    $_pagelist .= '<li><span class="nowpage">'.$data['page'].'</span></li>';

    for ($i=1; $i<=$rollPage; $i++) {
        $_page = $data['page']+$i;
        if ($_page > $data['total_page']) break;
        $_pagelist .= '<li><a href="'.$url.$_page.'">'.$_page.'</a></li>';
    }

    $first = ($data['page'] > $rollPage + 1)? '<li><a href="'.$url.'1">'.$config['first'].'</a></li>' : '';
    $last = ($data['total_page'] - $data['page'] > $rollPage)? '<li><a href="'.$url.$data['total_page'].'">'.$config['last'].'</a><li>' : '';
    $prev = ($data['page'] == 1)? '' : '<li><a href="'.$url.($data['page'] -1).'">'.$config['prev'].'</a></li>';
    $next = ($data['page'] == $data['total_page'])? '' : '<li><a href="'.$url.($data['page'] +1).'">'.$config['next'].'</a></li>';


    return str_replace(
        [
            '%header%',
            '%nowPage%',
            '%totalRow%',
            '%totalPage%',
            '%first%',
            '%prevPage%',
            '%linkPage%',
            '%nextPage%',
            '%end%'
        ],[
        $config['header'],
        $data['page'],
        $data['count'],
        $data['total_page'],
        $first,
        $prev,
        $_pagelist,
        $next,
        $last
    ],$config['theme']
    );
}