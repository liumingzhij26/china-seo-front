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
		
		echo "\n".'testCityUrl Action Success! '.time();
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
		echo "\n".'testCityScenic Action Success! '.time();
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
		echo "\n".'testCityScenic Action Success! '.time();
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
		echo "\n".'testContinentUrl Action Success! '.time();
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
		echo "\n".'testHotCountryList Action Success! '.time();
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
		echo "\n".'testCountryUrl Action Success! '.time();
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
		echo "\n".'testCountryPath Action Success! '.time();
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
		echo "\n".'testCountryListCity Action Success! '.time();
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
		echo "\n".'testGuideUrl Action Success! '.time()."\n";
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
    
    
    /*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的guide
		$this->assertInternalType  为4.0新方法
	*/
	public function testGuideCountryUrl() {
		$_Model_Name = 'China';
		$_Model_Name = strtolower($_Model_Name);
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		echo "\n".'TestCountryUrl Action Success! '.time()."\n";
    }
    
    /*
		测试大洲URL，传入一个错误的URL : 旅游攻略模块的guide
		$this->assertInternalType  为4.0新方法
	*/
	public function testGuideCityUrl() {
		$_Model_Name = 'beijing';
		$_Model_Name = strtolower($_Model_Name);
		$_data = $this->getOne($_Model_Name);//为URL
		$this->assertInternalType('array',$_data,' type error : '.$_Model_Name);//判断是否为数组
		//$this->assertCount(1, $_data);//判断是否返回一个数组
		echo "\n".'TestCityUrl Action Success! '.time()."\n";
    }
    
    
    
    /*
		测试大洲URL，传入一个错误的URL : Asias
	*/
	public function testContinentUrlNull() {
		$_Model_Name = 'Asias';
		$_name = $this->getTypeIs($_Model_Name);//为URL
		$this->assertNull($_name,'error : '.$_Model_Name);	
		echo "\n".'TestNull Action Success! '.time();
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
		echo "\n".'TestGuide Action Success! '.time()."\n";
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
		
		
		echo "\n".'testGuideCityIndex Action Success! '.time()."\n";
		
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
		
		echo "\n".'testGuideCityList Action Success! '.time()."\n";
		
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
		
		
		echo "\n".'testGuideList Action Success! '.time()."\n";
		
    }
    
    
    
    
    
    
	
}

?>