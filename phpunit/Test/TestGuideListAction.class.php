<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
class TestGuideListAction extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的 /h/Hong-Kong-city-guide-list/,程序只会获得去 guide-1258258
	*/
	public function testGuideList() {
		$_Model_Name = 'list-guide';
		$_Model_Name = strtolower($_Model_Name);
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);
		$this->assertEmpty($_name);//判断是否为空
		$this->assertRegExp('/^(^guide+$)|([\w\-]+\-guide)$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		//$this->assertRegExp('/^guide\-\d+$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		//$this->assertEquals(preg_replace('/(\D)/','',$_Model_Name),"1258258",'error : '.$_Model_Name);
		$_guide = explode("-guide",$_Model_Name);	
		
		$this->assertCount(2, $_guide);//判断是否返回一个数组
		$this->assertEquals($_guide[0],'list','Is not this URL: '.$_Model_Name);//判断是否返回一个数组
	
		$_data['count'] = $this->getGuideListPageCount();
		
		
		$_data['scriptures'] = $this->getGuideRightListPages(10,"pubdate");//获得1头条记录
		$this->assertInternalType('array',$_data['scriptures'],' type error : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['scriptures']);//判断是否返回一个数组
		
		
		echo "\n\n\n".'testGuideList Action Success! '.time()."\n";
		
    }
	
	
	
	
	
	
}

?>