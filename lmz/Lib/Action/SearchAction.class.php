<?php 
class SearchAction extends BaseAction{
	
	
	
	private $_arctype = null;
	private $_archives = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
 		$this->_archives = D('Archives');
	}
	
	public function index(){
		if($this->isPost()){
			$_POST["keys_country"] = intval($_POST["keys_country"]);
			$_POST["keys_city"] = intval($_POST["keys_city"]);
			$_stars = intval($_POST["stars"]);
			$_POST["city_name"] = htmlspecialchars(trim($_POST["city_name"]));
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			$_data_id = intval($_POST["keys_country"]);		
			$_country_id = intval($_POST["keys_country"]);		
			$_where = "where ";
			if($_data_id <= 0) exit('0');
			$_stars = str_repeat ("★",$_stars);//重复一个字符串 
            $_checkin = $_POST['start_date'];
            $_checkout = $_POST['end_date'];
            if(!empty($_checkin)){
                if(preg_match('/^[\d\-]+$/',$_checkin) && preg_match('/^[\d\-]+$/',$_checkout)){
                    $_check_date = " (a2.checkin >= '{$_checkin}' and a2.checkout <='{$_checkout}') ";
                    $_where .= $_check_date.' and ';
                }else{
                    $_checkin = "";
                    $_checkout = "";
                }
            }
			if($_POST["keys_city"] > 0){
				$_data_id = $_POST["keys_city"];
				$_data = $this->_arctype->getOne('',$_data_id);
				$_country_hot = $this->_arctype->getSearchCountryCount($_data_id,'typeid');
				$_where .= "a1.typeid = {$_POST["keys_city"]} and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
			}else{
				$_data = $this->_arctype->getOne('',$_data_id);				
				$_country_hot = $this->_arctype->getSearchCountryCount($_data_id,'reid');			
				$_where .= "a1.typeid in((select id from {$_DB_PREFIX}arctype where reid = '{$_data_id}')) and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
			}
			$_CountryList = $this->_arctype->getCountryList($_data['topid']);	//查询之后返回一维数组;		
			$_citylist = $this->_arctype->getListCity($_where,false);	//传入第一个城市的typeid，返回10个城市的列表数据		//传入第一个城市的typeid，返回10个城市的列表数据
			$_getCount = $this->_arctype->getCountCity($_where);	//传入第一个城市的typeid，返回10个城市的列表数据		//传入第一个城市的typeid，返回10个城市的列表数据
			$_data = array_merge($_data,$_country_hot[0]);//合并数组
			$_data = array_merge($_data,$_POST);//合并数组
			if(!empty($_getCount))  $_data['count'] = intval($_getCount[0]['count']);		
			$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
			$_data['page_size'] = C("PAGE_SIZE");
            $_city = $this->_arctype->where("reid = {$_country_id}")->select();
			$this->assign('data',$_data);
			$this->assign('city',$_city);
			$this->assign('countryList',$_CountryList);
			$this->assign('citylist',$_citylist);			
			$this->assign('date',date('Y-m-d'));			//为酒店入住日期加一个开始时间.	
			$this->display('content/search');
			
		}else{
			header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
			$this->display("Public:404"); 
		}
	}
	
	public function getSearchPage(){ 
		if($this->isPost()){
			$_POST["keys_country"] = intval($_POST["p_keys_country"]);
			$_POST["keys_city"] = intval($_POST["p_keys_city"]);
			$_stars = intval($_POST["p_stars"]);
			$_POST["city_name"] = htmlspecialchars(trim($_POST["p_city_name"]));
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			$_data_id = $_POST["keys_country"];		
			$_where = "where ";		
			if($_data_id <= 0){				
				exit;
			}	
			$_stars = str_repeat ("★",$_stars);//重复一个字符串
            $_checkin = $_POST['p_start_date'];
            $_checkout = $_POST['p_end_date'];
            if(!empty($_checkin)){
                if(preg_match('/^[\d\-]+$/',$_checkin) && preg_match('/^[\d\-]+$/',$_checkout)){
                    $_check_date = " (a2.checkin >= '{$_checkin}' and a2.checkout <='{$_checkout}') ";
                    $_where .= $_check_date.' and ';
                }else{
                    $_checkin = "";
                    $_checkout = "";
                }
            }
			if(array_key_exists("page", $_POST)){
				$_POST['page'] = intval($_POST['page']);
				if($_POST['page'] <= 0) $_POST['page'] = 1;
				$_skip = ($_POST['page'] - 1) * C('PAGE_SIZE');
				$_limit = 'limit '.$_skip.','.C('PAGE_SIZE');
			}            
			if(array_key_exists("order", $_POST)){
				$_order = trim($_POST['order']);
				if(preg_match("/^\w+$/",$_order)){			 				
					switch ($_order) {
						case "recommend"://推荐酒店
							$_order = "order by a2.id desc";
							break;
						case "good"://好评
							$_order = "order by a1.grade desc";
							break;
						case "names"://酒店名称
							$_order = "order by a2.title asc";
							break;
						case "prices"://价格
							$_order = "order by a1.price asc";
							break;
						case "stars"://星级
							$_order = "order by a1.stars desc";
							break;
						default:
							$_order = "order by a2.id desc";
					} 					
				} 				
			}else{
				$_order = '';
			}
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀	
			if($_POST["keys_city"] > 0){
				$_data_id = $_POST["keys_city"];
				$_data = $this->_arctype->getOne('',$_data_id);				
				$_where .= "a1.typeid = {$_POST["keys_city"]} and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
			}else{
				$_data = $this->_arctype->getOne('',$_data_id);	
				$_where .= "a1.typeid in((select id from {$_DB_PREFIX}arctype where reid = '{$_data_id}')) and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";			
			}
			$_citylist = $this->_arctype->getSearchListCity($_where,false,$_limit,$_order);	//传入第一个城市的typeid，返回10个城市的列表数据			
			echo json_encode($_citylist);
		}else{
			header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
			$this->display("Public:404"); 
		}
	}
	
}