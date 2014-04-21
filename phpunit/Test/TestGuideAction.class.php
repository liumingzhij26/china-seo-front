<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
class TestGuideAction extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的 /h/guide
	*/
	public function testGuideIndex() {
		$_Model_Name = 'guide';
		$_Model_Name = strtolower($_Model_Name);
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);
		$this->assertEmpty($_name);//判断是否为空
		$this->assertRegExp('/^(^guide+$)|(guide\-[\w\-]+)$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		$_data = $this->getTypeList();//获得导航列表
		$this->assertEmpty(!$_data);//判断是否为空
		$this->assertEquals($_Model_Name,"guide",'error : '.$_Model_Name);
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$_data['scriptures'] = $this->getTypeAttribute('c',8);//获得8推荐记录
		$this->assertInternalType('array',$_data['scriptures'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(8, $_data['scriptures']);//判断是否返回一个数组
		$_data['auto'] = $this->getTypeAttribute('f',4);//获得4幻灯记录		
		$this->assertInternalType('array',$_data['auto'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(4, $_data['auto']);//判断是否返回一个数组
		$_data['headline'] = $this->getTypeAttribute('h',3);//获得特荐记录	
		$this->assertInternalType('array',$_data['headline'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(3, $_data['headline']);//判断是否返回一个数组		
		$_data['headline_one'] = $this->getTypeAttribute('a',"1");//获得1头条记录
		$this->assertInternalType('array',$_data['headline_one'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(1, $_data['headline_one']);//判断是否返回一个数组
		$_data['headline_pubdate'] = $this->getGuideList('pubdate',10);//获得10最新记录	
		$this->assertInternalType('array',$_data['headline_pubdate'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(10, $_data['headline_pubdate']);//判断是否返回一个数组		
		$_data['headline_click'] = $this->getGuideList('click',8);//获得8条点击最高记录
		$this->assertInternalType('array',$_data['headline_click'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(8, $_data['headline_click']);//判断是否返回一个数组	
		$_data['hotel_click'] = $this->getGuideHotelList('pubdate',9);//获得9条酒店最新记录	
		$this->assertInternalType('array',$_data['hotel_click'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(9, $_data['hotel_click']);//判断是否返回一个数组			
		$_data['hotel_pubdate'] = $this->getGuideHotelList('click',9);//获得9条酒店最新记录
		$this->assertInternalType('array',$_data['hotel_pubdate'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(9, $_data['hotel_pubdate']);//判断是否返回一个数组				
		$_data['hotel_hot'] = $this->getGuideHotelAttribute('c',3,'pubdate');//获得3条酒店推荐最新记录
		$this->assertInternalType('array',$_data['hotel_hot'],' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(3, $_data['hotel_hot']);//判断是否返回一个数组	
		//print_r($_data);
		echo 'testGuideUrl Action Success! '.time()."\n";
    }
	

	
	
}

?>