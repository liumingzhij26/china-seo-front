<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
/*
	大洲测试页面
*/
class TestContinentModel extends Base{
	
	public function setUp(){
		parent::__construct();//初始化数据连接
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
		echo 'testContinentUrl Action Success! '.time();
    }
	
	/*
		测试大洲URL，Asia
	*/
	public function testHotCountryList() {//通过ID获得10热门城市
		$_Model_Name = 'Asia';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"asia",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		//$this->assertCount(1, $_data);//判断是否返回一个数组
		$this->assertEmpty(!$_data);//判断是否为空
		if($_data['ranks'] == 1){
			$_data_id = intval($_data['id']);
			$this->assertInternalType('integer',intval($_data['ranks']),' type error : '.$_Model_Name);//判断是否为数组
			$this->assertInternalType('integer',$_data_id,' type error : '.$_Model_Name);//判断是否为数组
			$_data = $this->getHotCountryList($_data_id);//通过ID获得10热门城市     
			$this->assertCount(10, $_data);//判断是否返回一个数组
			$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
			$_data = $this->getContinentlist();//大洲与国家的列表
			$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组.
			$_data = $this->getCountryHot($_data_id);//8个热门国家列表,传入大洲ID
			$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组.
			$this->assertCount(8, $_data);//判断是否返回一个数组
			//print_r($_data);
		}		
		echo 'testHotCountryList Action Success! '.time();
    }
	
	
}

?>