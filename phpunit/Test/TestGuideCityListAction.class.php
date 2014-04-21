<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
class TestGuideCityListAction extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的 /h/Hong-Kong-city-guide-list/,程序只会获得去 guide-1258258
	*/
	public function testGuideCityList() {
		$_Model_Name = 'Hong-Kong-city-guide-list';
		$_Model_Name = strtolower($_Model_Name);
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);
		$this->assertEmpty($_name);//判断是否为空
		$this->assertRegExp('/^(^guide+$)|([\w\-]+\-guide\-list)$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		//$this->assertRegExp('/^guide\-\d+$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		//$this->assertEquals(preg_replace('/(\D)/','',$_Model_Name),"1258258",'error : '.$_Model_Name);
		$_guide = explode("-guide-",$_Model_Name);	
		
		$this->assertCount(2, $_guide);//判断是否返回一个数组
		$this->assertEquals($_guide[1],'list','Is not this URL: '.$_Model_Name);//判断是否返回一个数组
	
		$_data['obj'] = $this->getOne($_guide[0]);	
		
		$this->assertInternalType('array',$_data['obj'],' type error : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['obj']);//判断是否返回一个数组
		
		
		$_data['count'] = $this->getGuideCityListPageCount($_data['obj']['id']);
		$this->assertEmpty(!$_data['count']);//判断是否返回一个数组
		
		
		$_data['scriptures'] = $this->getGuideHotNewList($_data['obj']['id'],10);	
		
		$this->assertInternalType('array',$_data['scriptures'],' type error : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['scriptures']);//判断是否返回一个数组
		
		$_data['hot_list'] = $this->getCityList($_data['obj']['id'],false,'limit 8');
		$this->assertInternalType('array',$_data['hot_list'],' type error1 : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['hot_list']);//判断是否返回一个数组
		
		print_r($_guide);
		echo "\n\n\n".'testGuideCityList Action Success! '.time()."\n";
		
    }
	
	
	
	
	
	
}

?>