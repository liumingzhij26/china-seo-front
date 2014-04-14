<?php 
class CityAction extends BaseAction{
	
	
	public function index(){
		
	}
	
	private $_arctype = null;
	private $_archives = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
 		$this->_archives = D('Archives');
	}
	
	public function getcity(){
		$_cityname = $_GET['cityname'];	
		if(preg_match('/^[\w\-]+$/', $_cityname)){			
			$_data = $this->_arctype->where("typedir = '{$_cityname}'")->Field('id,id,typedir')->find();	//查询之后返回一维数组
			$_cityname = strtolower($_cityname);	//这是一个action名称
			if(!empty($_data)){
				$_typeid = (int)$_data['id'];	
				$_data = $this->getListCity($_typeid);
				echo json_encode($_data);
			}
		}else{
			echo 'error';
		}
	}
	
	
	public function getSearchPageCity(){ 
		if($this->isPost()){
			add_slashes($_POST);
			$_POST["stars_all"] = intval($this->_post("stars_all"));
			$_POST["key_city_id"] = intval($this->_post("key_city_id"));
			$_POST["chains_all"] = intval($this->_post("chains_all"));
			$_POST["amens_all"] = intval($this->_post("amens_all"));
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀		
			$_where = "where ";				
			$_stars = "";
			if($_POST["stars_all"] != 1){	
				if(!empty($_POST["city_stars"])){
					foreach($_POST["city_stars"] as $v){
						$v = intval($v);
						if($v > 0){
							$v = str_repeat("★",$v);//重复一个字符串
							$_stars .= " a1.stars = '{$v}' or";
						}						
					}
					$_stars = substr($_stars,0,-2);
					$_stars = "({$_stars})";
				}
			}
			$_price = "";
			if($_POST["city_price"] != 1){
				if(!empty($_POST["city_price"])){
					$_price = str_replace("p","a1.price",$_POST["city_price"]);
					if(!preg_match('/^[\w\(\)\s\>\<\.]+$/',$_price)) $_price = "";
				}
			}
			$_chains = "";
			if($_POST["chains_all"] != 1){
				if(!empty($_POST["chains"])){
					foreach($_POST["chains"] as $v){
						$v = htmlspecialchars($v);
						$_chains .= " a1.trademark = '{$v}' or";
					}
					$_chains = substr($_chains,0,-2);
					$_chains = "({$_chains})";
				}
			}
			$_scenic = "";
			if($_POST["scenic_all"] != 1){
				if(!empty($_POST["scenic"])){
					foreach($_POST["scenic"] as $v){
						$v = intval($v);
						if($v > 0) $_scenic .= " a2.poi like '%{$v}%' or";						
					}
					$_scenic = substr($_scenic,0,-2);
					$_scenic = "({$_scenic})";
				}
			}
			$_amens = "";
			if($_POST["amens_all"] != 1){
				if(!empty($_POST["amens"])){
					foreach($_POST["amens"] as $vs){
						$vs = htmlspecialchars($vs);
						$_amens .= " a1.facilitys like '%{$vs}%' or";
					}
					$_amens = substr($_amens,0,-2);
					$_amens = "({$_amens})";
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
			if($_POST["key_city_id"] > 0){
				if(strlen($_stars) > 5){
					$_stars = "and {$_stars}";
				}
				if(strlen($_price) > 5){
					$_price = "and {$_price}";
				}
				if(strlen($_amens) > 5){
					$_amens = "and {$_amens}";
				}
				if(strlen($_chains) > 5){
					$_chains = "and {$_chains}";
				}
				if(strlen($_scenic) > 5){
					$_scenic = "and {$_scenic}";
				}			
				$_where .= "a1.typeid = {$_POST["key_city_id"]} and a2.typeid = {$_POST["key_city_id"]} {$_price} {$_chains} {$_amens} {$_stars} {$_scenic}";	
				$_data = array();
				$_data['count'] = $this->_archives->getSearchPageCityCount($_where);
				if($_data['count'] > 0){					
					$_citylist = $this->_archives->getSearchPageCityList($_where,$_order,$_limit);	//传入第一个城市的typeid，返回10个城市的列表数据	
					$_data['list'] = $_citylist;
					$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
					$_data['page_size'] = C("PAGE_SIZE");
					$_data['maps'] = R('Tool/getMapList',array($_data['list']));//地图列表
					echo json_encode($_data); 
				}else{
					exit('0');
				}
			}else{
				exit('0');
			}
		}else{
			exit('0');
		}			
	}
	
	/*
	 * 城市页面排序
	 *
	 */
	public function getCityPage(){
		if($this->isGet()){
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            if(!preg_match('/^([\w\-\_\/]+)$/',__INFO__)){
                exit('0');
 			}
            $_map = preg_replace('/.*\/([\w\-]+)$/',"$1",__INFO__);
 			$_map = explode("-",$_map);
 			if(count($_map) % 2 == 0){
	 			foreach ($_map as $key=>$val){
	 				if($key%2 == 0){
	 					if($_map[$key+1] != ""){
	 						$_config[strtolower($_map[$key])] = $_map[$key+1];
	 					}
	 				} 				
	 			}
 			} 			
 			if(array_key_exists("typeid", $_config)){
 				$_typeid = intval($_config['typeid']);
 			}
 			if(array_key_exists("page", $_config)){
 				$_config['page'] = intval($_config['page']);
 				if($_config['page'] <= 0) $_config['page'] = 1;
 				$_skip = ($_config['page'] - 1) * C('PAGE_SIZE');
 				$_limit = 'limit '.$_skip.','.C('PAGE_SIZE');
 			}
 			if(array_key_exists("order", $_config)){
 				$_order = trim($_config['order']);
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
			$_data = array();
			$_data['count'] = $this->_archives->getCityPageCount($_typeid);//$this->_archives			
			if($_data['count'] <= 0) exit('0');//如果没有数据
 			if(!empty($_limit) && !empty($_typeid)){
	 			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
				$_data['list'] = $this->_archives->getCityPageList($_typeid,$_order,$_limit);
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				$_data['page_size'] = C("PAGE_SIZE");
				$_data['maps'] = R('Tool/getMapList',array($_data['list']));//地图列表			
	 			echo json_encode($_data);
 			}else{
 				exit('0');
 			}
		}else{
			exit('0');
		}
	}
	
	/**
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getListCity($_typeid,$_rmlimit = false,$_limit = 'limit 10',$_order = "pubdate"){		
		return $this->_archives->getCityList($_typeid,$_rmlimit,$_limit,$_order);
	}
	
	/*
	 * 说明：获得城市中的所有酒店的总数
	 */
	public function getCityCount($_id){
		$_id = (int)$_id;
		if($_id > 0){
			$_id = $this->_archives->where("typeid = {$_id}")->count();
			return $_id;
		}
		return 0;
	}
	
    
    /**
     * 旅游模块
     */
	public function getScenic($_id){
		$_id = (int)$_id;
		$_list = array();
		if($_id > 0){
			$_Scenic = M("Scenic");
			 if(S('Scenic_'.$_id) == true){
				$_list = S('Scenic_'.$_id);
			}else{
				$_list = $_Scenic->where("cityid={$_id}")->select();
				if(!empty($_list)){
					S('Scenic_'.$_id,$_list);
				}				
			}
		}		
		return $_list;
	}
	
	
	
}