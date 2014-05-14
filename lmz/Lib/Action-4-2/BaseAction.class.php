<?php
class BaseAction extends Action{
	
	protected $_m = null;
	
	protected function _initialize(){
        $this->_m = new Model();
	}
}