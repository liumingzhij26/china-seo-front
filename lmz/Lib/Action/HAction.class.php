<?php
/*
 * @author : lmz
 * @date : 2013-12-26
 */
class HAction extends BaseAction{
	
	private $_arctype = null;
	private $_archives = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
		$this->_archives = D('Archives');
	}
	
	public function index(){
		$_MODULE_NAME = $_GET['name'];
		$cityName = $this->_arctype->getTypeIs($_MODULE_NAME);//验证这个action是否存在
		if(empty($cityName)){	
			$cityName = strtolower($_MODULE_NAME);
			if(preg_match('/^guide\-[\w-\-]+$/',$cityName)){
				$_guide = explode("-",$cityName);
				if($_guide[0] == 'guide' && preg_match('/^\d+$/',$_guide[1])){
					R('/Guide/page',array(intval($_guide[1])));
					exit;
				}
			}elseif(preg_match('/^[\w-\-]+\-guide$/',$cityName)){
				$_guide = explode("-guide",$cityName);				
				if(count($_guide) == 2 && $_guide[1] == ""){
					if(preg_match('/^[\w-\-]+$/',$_guide[0])){
						$cityName = $this->_arctype->getTypeIs($_guide[0]);//验证这个action是否存在
						if(empty($cityName)){
							if($_guide[0] == 'list'){
								R('/Guide/list_page',array(strip_tags($cityName)));
								exit;
							}
						}else{							
							R('/Guide/city_index',array(strip_tags($cityName)));
							exit;
						}											
					}
				}		
			}elseif(preg_match('/^[\w-\-]+\-guide\-list$/',$cityName)){
				$_guide = explode("-guide-",$cityName);
				if(count($_guide) == 2 && $_guide[1] == "list"){
					if(preg_match('/^[\w-\-]+$/',$_guide[0])){
						$cityName = $this->_arctype->getTypeIs($_guide[0]);//验证这个action是否存在
						R('/Guide/city_list',array(strip_tags($cityName)));							
					}
				}				
				exit;
			}elseif($cityName == 'guide'){
				R('/Guide/index',array(strip_tags($cityName)));
				exit;
			}elseif($cityName == 'search'){
				R('/Search/index',array(strip_tags($cityName)));
				exit;
			}else{
				header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
				$this->display("Public:404"); 
                exit;
			}            
		}        
        $_data = $this->_arctype->getOne($cityName);
		$_data_id = intval($_data['id']);
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		if($_data['ranks'] == 1){//当是大洲是，就判断
			$_hotcity = $this->_arctype->getHotCountryList($_data_id);//通过ID获得10热门城市         
			$_continentlist = $this->_arctype->getContinentlist();
			$_country_hot = $this->_arctype->getCountryHot($_data_id);
			$_continentlist = type_list($_continentlist,0);
			$this->assign('continentlist',$_continentlist);
			$this->assign('country_hot',$_country_hot);	
            $this->assign('hotcity',$_hotcity);            
		}		
		if($_data['ranks'] == 2){//当是国家是，就判断一下
			$_position = $this->_arctype->getPosition($_MODULE_NAME);//获得当前位置	
			$_hotcity = $this->_arctype->getCityHot($_data_id);//获得热门城市
			$_citylist = R('City/getListCity',array($_hotcity[0]['id'],false));	//传入第一个城市的typeid，返回10个城市的列表数据
			$_continentlist = R('Continent/getListContinent',array($_position['p_id']));	//传入当前国家所在大洲的ID，返回国家的列表数据
			$this->assign('citylist',$_citylist);
			$this->assign('position',$_position);
			$this->assign('continentlist',$_continentlist);
            $this->assign('hotcity',$_hotcity);
		}
		if($_data['ranks'] == 3){//当是城市是，就判断一下
			$cityName = $this->_arctype->getTypeIs($_MODULE_NAME);//验证这个action是否存在
            $name = $_MODULE_NAME;
			if(empty($cityName)) {//如果返回空，就跳转到首页
				header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
				$this->display("Public:404");
			} 
			$_position = $this->_arctype->getCityPosition($name);//传入一个当前的城市
			$_citylist = R('City/getListCity',array($_data['id'],false,'limit 0,'.C("PAGE_SIZE"),'pubdate'));		//传入第一个城市的typeid，返回10个酒店的列表数据		
			$_data['scenic'] = R('City/getScenic',array($_data['id']));//景点列表			
			$_maps = R('Tool/getMapList',array($_citylist));//地图列表
			$_data['count'] = $this->_archives->getCityListCount($_data_id);
			$_CountryList = $this->_arctype->getCountryList($_data['topid']);//获得搜索城市列表				
			$_continentlist = R('Continent/getListContinent',array($_position['t_id']));	//传入当前国家所在大洲的ID，返回国家的列表数据
			$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
			$_data['page_size'] = C("PAGE_SIZE");
			if(!empty($_data['weatherid'])){//天气			
				$_Weatherid = R('Tool/getWeatherid',array($_data['weatherid']));
				$_data = array_merge($_data,$_Weatherid);
			}
			$this->assign('continentlist',$_continentlist);
			$this->assign('countryList',$_CountryList);
			$this->assign('citylist',$_citylist);
			$this->assign('date',date('Y-m-d'));			//为酒店入住日期加一个开始时间.
			$this->assign('position',$_position);
			$this->assign('datamaps',$_maps);
			
		}	        
		$this->assign('data',$_data);					//把查询到的数据给模板页
		$this->assign('date',date('Y-m-d'));			//为酒店入住日期加一个开始时间
		$this->display($_data['templist']);				//公共的模板
	}

	
}