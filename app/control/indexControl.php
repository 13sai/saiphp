<?php
namespace App\Control;

use Core\Lib\Control;
use App\Model\AppModel;

class IndexControl extends Control{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo 1;
    }

    public function getList()
    {
    	header("Access-Control-Allow-Origin: *");
    	$page = get('page')? get('page') : 1;
    	$id = get('id');
    	$type = get('type');

    	$con = [];

    	if(!empty(get('type'))){
			$con["type[~]"] = get('type');
		}
		if(!empty(get('title'))){
			$con["title[~]"] = get('title');
		}

        $appModel = new appModel();
        $data = $appModel->lists('article', $con, $page, 10, '*');
        $this->response(0, $data);
    }

    public function detail(){
    	header("Access-Control-Allow-Origin: *");
		$model = new appModel();
		$where['id'] = get('id');
		$data = $model->getOne('article', $where, '*');
		$this->response(0, $data);
	}
}