<?php
class HotelsAction extends Action{
	
	public function index(){
		echo $_GET["name"];
		$_arctype = m('arctype');
		$_data = $_arctype->select();
		dump($_data);
		$this->show(time());
	}
	
}