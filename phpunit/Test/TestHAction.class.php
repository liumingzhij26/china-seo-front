<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
class TestHAction extends Base{
	
	public function setUp(){
		parent::__construct();
		//$_data = $this->_db->query("select typename from dede_arctype")->fetchAll();		
	}
	
	/*
		测试大洲URL，Asia
	*/
	public function testContinentUrl() {
		$_Model_Name = 'Asia';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"asia",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		echo 'TestContinentUrl Action Success! '.time();
    }
	
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的guide
		$this->assertInternalType  为4.0新方法
	*/
	public function testCountryUrl() {
		$_Model_Name = 'China';
		$_Model_Name = strtolower($_Model_Name);
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		echo 'TestCountryUrl Action Success! '.time()."\n";
    }
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的guide
		$this->assertInternalType  为4.0新方法
	*/
	public function testCityUrl() {
		$_Model_Name = 'beijing';
		$_Model_Name = strtolower($_Model_Name);
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		//$this->assertCount(1, $_data);//判断是否返回一个数组
		echo 'TestCityUrl Action Success! '.time()."\n";
    }
	
	/*
		测试大洲URL，传入一个错误的URL : Asias
	*/
	public function testContinentUrlNull() {
		$_Model_Name = 'Asias';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);	
		echo 'TestNull Action Success! '.time();
    }
	
	/*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的guide
	*/
	public function testGuideUrl() {
		$_Model_Name = 'guide';
		$_Model_Name = strtolower($_Model_Name);
		$_name = $this->getTypeIs($_Model_Name);//为URL
		echo $_name;
		$this->assertNull($_name,'error : '.$_Model_Name);
		if(empty($_name)){			
			$this->assertRegExp('/^(^guide+$)|(guide\-[\w\-]+)$/',$_Model_Name,'Is not this URL: '.$_Model_Name);
		}
		echo 'TestGuide Action Success! '.time()."\n";
    }
	
	
	
	
}

?>