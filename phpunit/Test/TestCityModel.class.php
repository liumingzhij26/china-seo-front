<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
/*
	城市
*/
class TestCityModel extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	/*
		测试城市URL，Beijing
	*/
	public function testCityUrl() {
		$_Model_Name = 'Beijing';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"beijing",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$_data_id = intval($_data['id']);
		$this->assertInternalType('integer',$_data_id,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(26, $_data);//判断是否返回一个数组
		$this->assertEmpty(!$_data);//判断是否为空
		$_data = $this->getCityPosition($_Model_Name);
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		$_data = $this->getCityList($_data_id);//传入第一个城市的typeid，返回10个城市的列表数据
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertCount(10, $_data);//判断是否返回一个数组
		$this->assertEmpty(!$_data);//判断是否为空
		
		echo 'testCityUrl Action Success! '.time();
    }
	
	
	/*
		测试城市URL，Beijing
	*/
	public function testCityScenic() {
		$_Model_Name = 'Beijing';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"beijing",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$_data_id = intval($_data['id']);
		$this->assertInternalType('integer',$_data_id,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$_data = $this->getScenic($_data_id);
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		echo 'testCityScenic Action Success! '.time();
    }
	
	
	/*
		测试城市URL，Beijing
	*/
	public function testCityWeatherid() {
		$_Model_Name = 'Beijing';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"beijing",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$_data_id = intval($_data['id']);
		$this->assertInternalType('integer',$_data_id,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		//$_data = $this->getScenic($_data_id);
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		$_weatherid = $_data['weatherid'];
		$this->assertInternalType('integer',intval($_weatherid),' type error : '.$_Model_Name);//判断是否为数组
		$_tool = new ToolAction();
		$_data = $_tool->getWeatherid($_weatherid);
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data['weatherid']);//判断是否为空
		echo 'testCityScenic Action Success! '.time();
    }
}

?>