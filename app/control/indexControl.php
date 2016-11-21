<?php
namespace app\control;
use core\lib\model;
class indexControl extends \core\sai{
	public function __construct(){
		parent::__construct();
		$m = new \app\model\optionModel();
		$con['ORDER'] = array('id'=>'DESC');
		$con['is_top'] = '1';
		$con['LIMIT'] = array(0,10);
		$this->recommand = $m->lists('article',$con);
	}
	
	public function index(){
		
		if(!empty(get('type'))){
			$con["type[~]"] = get('type');
		}
		if(!empty(get('title'))){
			$con["title[~]"] = get('title');
		}
		
		$model = new \app\model\optionModel();
		$limit['ORDER'] = 'id DESC';
		if(isset($con)) $limit['AND'] = $con;
		$count = $model->counts('article',$limit);
		$page = new \core\lib\page($count, 6, 1);
		$limitnum = $page->limit;
		$limit['LIMIT'] = $limitnum;
		$data = $model->lists('article',$limit);
		$page->config['theme'] = '<ul class="am-pagination">%prevPage% %nextPage% </ul>';
		$pagelist = $page->show();

		$title = '13sai';
		$arr = array('12','10','19','22','20');
		$this->display('index.php',array('data'=>$data,'title'=>$title, 'arr'=>$arr, 'pagelist'=>$pagelist, 'recommand'=>$this->recommand));
	}
	

	
	public function content(){
		$model = new \app\model\optionModel();
		$where['id'] = get('id');
		$data = $model->getOne('article',$where);
		$title = '13sai|'.$data['title'];
		$this->display('content.php',array('data'=>$data,'title'=>$title,'recommand'=>$this->recommand));
	}

}