<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
class TestGuideCityIndexAction extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的 /h/Hong-Kong-city-guide/,程序只会获得去 guide-1258258
	*/
	public function testGuideCityIndex() {
		$_Model_Name = 'Hong-Kong-city-guide';
		$_Model_Name = strtolower($_Model_Name);
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);
		$this->assertEmpty($_name);//判断是否为空
		$this->assertRegExp('/^(^guide+$)|([\w\-]+\-guide)$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		//$this->assertRegExp('/^guide\-\d+$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		//$this->assertEquals(preg_replace('/(\D)/','',$_Model_Name),"1258258",'error : '.$_Model_Name);
		$_guide = explode("-guide",$_Model_Name);	
		$this->assertCount(2, $_guide);//判断是否返回一个数组
		$this->assertEmpty($_guide[1]);//判断是否返回一个数组
		$_typedir = $this->getTypeIs($_guide[0]);//为URL
		$this->assertEquals($_typedir,strtolower('Hong-Kong-city'),'error : '.$_Model_Name);
		
		$_data['obj'] = $this->getOne($_typedir);
		$this->assertInternalType('array',$_data['obj'],' type error : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['obj']);//判断是否返回一个数组
		
		$_data['count'] = $this->getGuideCityIndexPageCount($_data['obj']['id']);
		
		$this->assertEmpty(!$_data['count']);//判断是否返回一个数组
		
		$_data['scriptures'] = $this->getGuideHotNewList($_data['obj']['id'],10);
		$this->assertInternalType('array',$_data['scriptures'],' type error : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['scriptures']);//判断是否返回一个数组
		
		$_data['list'] = $this->getGuideCityList($_data['obj']['id'],10,'click');
		
		$this->assertEquals($_data['obj']['ranks'],'3','error : '.$_Model_Name);
		
		
		$_data['hot_list'] = $this->getCityList($_data['obj']['id'],false,'limit 8');//热门酒店
		$this->assertInternalType('array',$_data['hot_list'],' type error1 : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['hot_list']);//判断是否返回一个数组
		
		$_data['explain'] = $this->getCityIndexAttribute($_data['obj']['id'],'g',1);
		$this->assertInternalType('array',$_data['explain'],' type error2 : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['explain']);//判断是否返回一个数组
		
		
		$_data['scene'] = $this->getCityIndexAttribute($_data['obj']['id'],'d',1);
		//$this->assertEmpty($_data['scene']);//判断是否返回一个数组
		
		
		
		$_data['auto'] = $this->getCityIndexAttribute($_data['obj']['id'],'f',5);
		$this->assertInternalType('array',$_data['auto'],' type error4 : '.$_Model_Name);//判断是否为array类型	
		$this->assertEmpty(!$_data['auto']);//判断是否返回一个数组
		
		
		echo "\n\n\n".'testGuideCityIndex Action Success! '.time()."\n";
		
    }
	
	
	
	
	
	
}

?>