<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
class TestGuidePageAction extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的 /h/guide-1258258.html,程序只会获得去 guide-1258258
	*/
	public function testGuidePage() {
		$_Model_Name = 'guide-1258258';
		$_Model_Name = strtolower($_Model_Name);
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);
		$this->assertEmpty($_name);//判断是否为空
		$this->assertRegExp('/^(^guide+$)|(guide\-[\w\-]+)$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		$this->assertRegExp('/^guide\-\d+$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		$this->assertEquals(preg_replace('/(\D)/','',$_Model_Name),"1258258",'error : '.$_Model_Name);
		
		$_data_id = preg_replace('/(\D)/','',$_Model_Name);	
		
		$this->assertInternalType('integer',(int)$_data_id,' type error : '.$_Model_Name);//判断是否为数组
		
		$_data['list'] = $this->getGuideOne($_data_id);
		$this->assertInternalType('array',$_data['list'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data['list']);//判断是否为空
		
		$_data['position'] = $this->getGuidePosition($_data['list']['typeid2']);
		$this->assertInternalType('array',$_data['position'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data['position']);//判断是否为空
		
		$_data['hot_list'] = $this->getCityList($_data['list']['typeid2'],false,'limit 8');
		$this->assertInternalType('array',$_data['hot_list'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data['hot_list']);//判断是否为空
		
		$_data['new_list'] = $this->getGuideHotNewList($_data['list']['typeid2'],10);	
		$this->assertInternalType('array',$_data['new_list'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data['new_list']);//判断是否为空
		
		echo "\n".'testGuidePage Action Success! '.time()."\n";
		
    }
	
	
	
	
	
	
}

?>