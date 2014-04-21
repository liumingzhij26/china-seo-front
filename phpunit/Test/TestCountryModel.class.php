<?php
define("ROOT_PATH",substr(dirname(__FILE__),0,-5));
require ROOT_PATH."/Conf/config.php";
/*
	国家
*/
class TestCountryModel extends Base{
	
	public function setUp(){
		parent::__construct();
	}
	
	/*
		测试国家URL，China
	*/
	public function testCountryUrl() {
		$_Model_Name = 'China';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"china",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		if($_data['ranks'] == 2){
			$_data_id = intval($_data['id']);
			$this->assertInternalType('integer',intval($_data['ranks']),' type error : '.$_Model_Name);//判断是否为数组
			$this->assertInternalType('integer',$_data_id,' type error : '.$_Model_Name);//判断是否为数组
			$_data = $this->getCityHot($_data_id);//8个热门国家列表,传入大洲ID
			$this->assertCount(8, $_data);//判断是否返回一个数组
			$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组.
		}				
		echo 'testCountryUrl Action Success! '.time();
    }
	
	/*
		测试国家URL，China
	*/
	public function testCountryPath() {
		$_Model_Name = 'China';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"china",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		$this->assertEmpty(!$_data['typedir']);//判断是否为空
		$_data = $this->getPosition($_Model_Name);//获得面包路径
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		echo 'testCountryPath Action Success! '.time();
    }
	
	/*
		测试国家URL，China
	*/
	public function testCountryListCity() {
		$_Model_Name = 'China';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertEquals($_name,"china",'error : '.$_name);
		$this->assertInternalType('string',$_name,' type error : '.$_Model_Name);//判断是否为string类型		
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		if($_data['ranks'] == 2){
			$_data_id = intval($_data['id']);
			$this->assertInternalType('integer',intval($_data['ranks']),' type error : '.$_Model_Name);//判断是否为数组
			$this->assertInternalType('integer',$_data_id,' type error : '.$_Model_Name);//判断是否为数组
			$_data = $this->getCityHot($_data_id);//8个热门国家列表,传入大洲ID
			$this->assertCount(8, $_data);//判断是否返回一个数组
			$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组.
			$_data = $this->getCityList($_data[0]['id'],false);//传入第一个城市的typeid，返回10个城市的列表数据
			$this->assertCount(10, $_data);//判断是否返回一个数组
			$_Position = $this->getPosition($_Model_Name);//获得面包路径
			$this->assertInternalType('array',$_Position,' type error : '.$_Model_Name);//判断是否为数组
			$this->assertEmpty(!$_Position);//判断是否为空
			$this->assertInternalType('integer',intval($_Position['p_id']),' type error : '.$_Model_Name);//判断是否为数组
			$_data = $this->getListContinent(intval($_Position['p_id']));
			$this->assertCount(8, $_data);//判断是否返回一个数组
		}			
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		$this->assertEmpty(!$_data);//判断是否为空
		echo 'testCountryListCity Action Success! '.time();
    }
	
	
}

?>