<?php
/*
 * @author : lmz
 * @date : 2013-12-26
 */
class EmptyAction extends BaseAction{
	
	private $_arctype = null;
	private $_archives = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
		$this->_archives = D('Archives');
	}
	
	public function index(){
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
		$this->display("Public:404"); 
	}
	
	/**
	 * 
	 * 说明：为空方法，会传入一个 action
	 */
	public function _empty($name){//获得当前的ACTION_NAME
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
		$this->display("Public:404"); 
	}	
	
}