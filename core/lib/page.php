<?php
//分页
namespace Core\Lib;
use Core\Lib\Conf;
class Page {
    private $total;      //总记录  
    private $pagesize;    //每页显示多少条  
    public $limit;          //limit  
    private $page;           //当前页码  
    private $pagenum;      //总页码  
    private $url;           //地址  
    private $bothnum;      //两边保持数字分页的量
    // 分页显示定制
    public $config = array('header'=>'条记录','prev'=>'&lt;','next'=>'&gt;','first'=>'&laquo;','last'=>'&raquo;','theme'=>'<ul class="am-pagination"><li class="prev"><a> %totalRow% %header% %nowPage%/%totalPage% 页 </a></li> %first% %prevPage% %linkPage% %nextPage% %end%</ul>');
  
    //构造方法初始化  
    public function __construct($_total, $_pagesize, $_rollpage) {
	    $this->nowpageStr = conf::get('PAGESTRING','route');
        $this->total = $_total ? $_total : 0;
        $this->pagesize = $_pagesize;
        $this->pagenum = ceil($this->total / $this->pagesize);
        $this->page = $this->setPage();
        $this->limit = array(($this->page-1)*$this->pagesize,$this->pagesize);
        $this->url = $this->setUrl();
        $this->bothnum = $_rollpage ? $_rollpage : 2;
    }

	//配置样式
    public function setConfig($name,$value) {
        if(isset($this->config[$name])) {
            $this->config[$name]  = $value;
        }
    }
  
    //获取当前页码  
    private function setPage() {
	    $nowpageStr = $this->nowpageStr;
        if (!empty($_GET[$nowpageStr])) {  
	        if ($_GET[$nowpageStr] > 0) {  
	            if ($_GET[$nowpageStr] > $this->pagenum) {  
	                return $this->pagenum;  
	            } else {  
                    return $_GET[$nowpageStr];  
	            }
	        } else {
	            return 1;
	        }  
        } else {  
            return 1;  
        }  
    }   
  
    //获取地址  
    private function setUrl() {  
        $_url = $_SERVER["REQUEST_URI"];
        //return $_url;
        if(isset($_url) && $_url != '/'){
	        $_par = parse_url($_url);
	        if (isset($_par['query'])){
	              parse_str($_par['query'],$_query);  
	              unset($_query[$this->nowpageStr]);  
	              $_url = $_par['path'].'?'.http_build_query($_query).'&';
	        }else{
		        $_url .= '?';
	        }
        }else{
	        $_url = '/index.php/index/index?';
        }
        return $_url.$this->nowpageStr.'=';
    }     

    //数字目录  
    private function pageList() {
	    $_pagelist = '';
	    $nowpageStr = $this->nowpageStr;
	    
        for ($i=$this->bothnum;$i>=1;$i--) {
            $_page = $this->page-$i;  
            if ($_page < 1) continue;  
            $_pagelist .= '<li><a href="'.$this->url.$_page.'">'.$_page.'</a></li>';
        }
        
        $_pagelist .= '<li><span class="nowpage">'.$this->page.'</span></li>';
        
        for ($i=1;$i<=$this->bothnum;$i++) {
            $_page = $this->page+$i;  
            if ($_page > $this->pagenum) break;
            $_pagelist .= '<li><a href="'.$this->url.$_page.'">'.$_page.'</a></li>';
        }
        
        return $_pagelist;
    }  
  
    //首页
    private function first() {  
        if ($this->page > $this->bothnum+1) {  
            return '<li><a href="'.$this->url.'1">'.$this->config['first'].'</a></li>';  
        }
    }

    //尾页
    private function last() {  
        if($this->pagenum - $this->page > $this->bothnum) {  
            return '<li><a href="'.$this->url.$this->pagenum.'">'.$this->config['last'].'</a><li>';
        }  
    }
    
    //上一页
    private function prev() {  
        if ($this->page == 1) {  
            return '';
        }else{
	        return '<li><a href="'.$this->url.($this->page -1).'">'.$this->config['prev'].'</a></li>';
        }
          
    }  
  
    //下一页  
    private function next() {  
        if($this->page == $this->pagenum) {  
            return '';
        }else{
	        return '<li><a href="'.$this->url.($this->page +1).'">'.$this->config['next'].'</a></li>';
        }
    }
  
    //分页信息  
    public function show() {
	    ($this->pagenum < 2) ? $_page = '' : $_page = str_replace(
            array('%header%','%nowPage%','%totalRow%','%totalPage%','%first%','%prevPage%','%linkPage%','%nextPage%','%end%'),
            array($this->config['header'],$this->page,$this->total,$this->pagenum,$this->first(),$this->prev(),$this->pageList(),$this->next(),$this->last()),$this->config['theme']);
        return $_page;
    }
} 