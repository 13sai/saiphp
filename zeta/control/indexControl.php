<?php
namespace zeta\control;
use core\lib\model;
class indexControl extends \core\sai{
	public function __construct(){
		parent::__construct();
		$this->title = '13sai';
	}

	public static function check_login(){
		$session = new \core\lib\session();
		//p($session);
		$_se = $session->get('user');
		if(empty($_se)) jump('/zeta');
	}
	
	public function index(){
		$data['title'] = $this->title;
		$this->display('index.php',$data);
	}

	public function login(){
		$session = new \core\lib\session();
		$code = $session->get('authcode');
		if($code == post('code')){
			$model = new \app\model\optionModel();
			$o = post('code');
			$data['user'] = post('user');
			$data['password'] = md5(post('pw'));
			$where['AND'] = $data;
			$result = $model->getOne('admin',$where);

			if($result){
				$session->set('user',$data['user']);
				jump("/index.php/zeta/index/create");
			}else{
				p('用户名或密码不正确！');
			}
		}else{
			p('验证码不正确！');
		}
		
	}

	public function logout(){
		$session = new \core\lib\session();
		$code = $session->delete('user');
		jump('/zeta');
		
	}

	public function create(){
		self::check_login();
		if(_method() == 'post'){
			$m = new \zeta\model\indexModel();
			$data = post();
			$config['save_path'] = './upload/article';
			//$config['max_size'] = '10';
			$upload = new \core\lib\uploadFile($config);
			//p($_FILES);
			$result = $upload->uploadDo($_FILES);
			if($result['result'] === false){
				p($result['info']);
				die();
			}else{
				$data['pic'] = $result['result'];
			}
			
			$id = $m->insertOne('article',$data);
			if($id!==false){
				jump('/index.php/zeta/index/lists');
			}else{
				p('新增失败！');
			}
		}else{
			$data['title'] = $this->title;
			$this->display('create.php',array('title'=>$this->title));
		}
	}

	public function lists(){
		self::check_login();
		$model = new \app\model\optionModel();
		$limit['ORDER'] = 'id DESC';
		$count = $model->counts('article',$limit);
		//p($count);
		$page = new \core\lib\page($count, 10, 1);
		$limitnum = $page->limit;
		//p($limitnum);
		$limit['LIMIT'] = $limitnum;
		$list = $model->lists('article',$limit);
		$page->config['theme'] = '<ul class="am-pagination">%prevPage% %nextPage% </ul>';
		$pagelist = $page->show();
		$this->display('lists.php',array('title'=>$this->title,'list'=>$list,'pagelist'=>$pagelist));
	}

	public function update(){
		self::check_login();
		if(_method() == 'post'){
			$m = new \zeta\model\indexModel();
			//p($_POST);die();
			$data = post();
			$where['id'] = post('id');
			$config['save_path'] = './upload/article';
			//p($_FILES);die();
			$upload = new \core\lib\uploadFile($config);
			$result = $upload->uploadDo($_FILES);
			if($result['result'] == false){
				
			}else{
				$data['pic'] = $result['result'];
			}
			$id = $m->updateOne('article',$data,$where);
			$id == 1 ? jump('/index.php/zeta/index/lists') : p('修改失败！');
		}else{
			$model = new \app\model\optionModel();
			$where['id'] = get('id');
			$data = $model->getOne('article',$where);
			$title = '13sai|'.$data['title'];
			$this->display('update.php',array('data'=>$data,'title'=>$title));
		}
	}

	public function delete(){
		$m = new \zeta\model\indexModel();
		$where['id'] = get('id');
		//p($where);
		//die();
		$id = $m->deleteOne('article',$where);
		$id == 1 ? header("Location:".$_SERVER['HTTP_REFERER']) : p('删除失败！');
	}
}