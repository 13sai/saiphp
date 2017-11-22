<?php
namespace core\lib;
use core\lib\conf;
class model extends \medoo{
    public function __construct(){
        $option = conf::all('database');
        parent::__construct($option);
    }

    /*
     * 获取列表
     * @param $table
     * @param $where
     * @param $page
     * @param $limit
     * @param $field
     * @param $order
     */
    public function lists($table, $where, $page = 1, $limit = 10, $field = '*', $order = null){
        $result = [];
        $result['count'] = $this->count($table, $where);
        $where['limit'] = [$limit * ($page - 1), $limit];
        if(!is_null($order)) $where['order'] = $order;
        $result['data'] = $this->select($table, $field, $where);
        $result['page'] = $page;
        $result['limit'] = $limit;
        $result['total_page'] = ceil($result['count']/$result['limit']);
        return $result;
    }

    /*
	 * 获取所有记录
	 * @param $table
	 * @param $where
	 * @param $field
	 * @param $order
	 */
    public function listAll($table, $where, $field = '*'){
        return $this->select($table, $field, $where);
    }

    /*
	 * 获取单条记录
	 * @param $table
	 * @param $where
	 * @param $field
	 */
    public function getOne($table, $where, $field = '*'){
        return $this->get($table, $field, $where);
    }

    /*
	 * 插入数据
	 * @param $table
	 * @param $data 为array批量插入
	 */
    public function insert($table, $data){
        return $this->insert($table, $data);
    }

    /*
	 * 修改数据
	 * @param $table
	 * @param $where
	 * @param $data 可为array
	 */
    public function edit($table,$where,$data){
        return $this->update($table, $data, $where);
    }

    /*
     * 删除数据
     * @param $table
     * @param $where
     * @param $data 可为array
     */
    public function del($table, $where){
        return $this->delete($table, $where);
    }

    /*
     * 判断存在
     * @param $table
     * @param $where
     */
    public function hasOne($table, $where){
        return $this->has($table, $where);
    }
}