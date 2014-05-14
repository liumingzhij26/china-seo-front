<?php
class CountryAction extends BaseAction{
	
	
	private $_arctype = null;
	private $_archives = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
		$this->_archives = D('Archives');
	}
	
	public function index(){
		dump($_GET);
	}
	
	
	public function getAjaxcity(){
		$_country_id = $_GET['country_id'];
		$_country_id = intval($_country_id);
		if($_country_id > 0){
			$_data = $this->_arctype->where("reid = {$_country_id} and ranks = 3")->Field('id,typename,typedir')->select();	//查询之后返回一维数组
			if(!empty($_data)){
				echo json_encode($_data);
			}
		}else{
			echo 'error';
		}
	}
	
	
	public function getList(){
		
		return $this->_arctype->Field('id,typename,typedir,ranks,picname')->select();
	
	}
}