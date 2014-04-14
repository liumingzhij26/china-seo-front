<?php 
class ContinentAction extends BaseAction{
	
	private $_arctype = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
	}
	
	public function index(){
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
		$this->display("Public:404"); 
	}
	
	/**
	 *
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getListContinent($_id = 0){
		$_id = (int)$_id;
        if(S('ListContinent_'.$_id) == true){
            $_data = S('ListContinent_'.$_id);
        }else{
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->_arctype->where("reid = {$_id}")->field('id,typename,typedir')->limit('8')->select();
            if(count($_data)>0){
                S('ListContinent_'.$_id,$_data);
            }else{
                return null;
            }
        }        
		return $_data;
	}
	
	public function getAjaxContinent(){
		$_id = $_GET['id'];
		$_id = intval($_id);
		if($_id > 0){
			$_data = $this->_arctype->where("reid = {$_id} and ranks = 2")->field('id,typename,typedir')->select();
			$_else_data = $this->_arctype->where("reid != {$_id} and ranks = 2")->field('id,typename,typedir')->select();
			$_data = array_merge($_data,$_else_data);
			//dump($_data);
			echo json_encode($_data);
		}
	}
	
}