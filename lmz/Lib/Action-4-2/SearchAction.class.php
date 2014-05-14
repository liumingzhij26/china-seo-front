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
		$_POST["keys_country"] = intval($_POST["keys_country"]);
		$_POST["keys_city"] = intval($_POST["keys_city"]);
		$_stars = intval($_POST["stars"]);
		$_POST["city_name"] = htmlspecialchars(trim($_POST["city_name"]));
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_date_id = intval($_POST["keys_country"]);		
		$_where = "where ";
		if($_date_id <= 0){				
			exit;
		}		
		switch ($_stars) {
			case 1:
				$_stars = "";
				break;
			case 2:
				$_stars = "★★";
				break;
			case 3:
				$_stars = "★★★";
				break;
			case 4:
				$_stars = "★★★★";
				break;
			case 5:
				$_stars = "★★★★★";
				break;
		}

		
		if($_POST["keys_city"] > 0){
			$_date_id = $_POST["keys_city"];
			$_data = $this->_arctype->where("id = {$_date_id}")->find();
			$_hotcity = $this->_m->query("select c.count,a.id,c.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.typeid = a.id where c.typeid = {$_date_id} order by c.count desc");
			//$_data['count'] = intval(R('City/getCityCount',array($_data['id'])));	//获得总的酒店数
			$_country_hot = $this->_m->query("select sum(c.count) count,a.picname from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.typeid = {$_date_id} group by c.reid order by c.count");
					
			
			$_where .= "a1.typeid = {$_POST["keys_city"]} and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
		}else{
			$_data = $this->_arctype->where("id = {$_date_id}")->find();
			$_hotcity = $this->_m->query("select c.count,a.id,c.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.typeid = a.id where c.reid = {$_date_id} order by c.count desc limit 8");
			$_country_hot = $this->_m->query("select sum(c.count) count,a.picname from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.reid = {$_date_id} group by c.reid order by c.count");			
			$_data_list = $this->_arctype->where("reid = {$_date_id}")->select();
			$_in_list = '';
			foreach($_data_list as $k=>$v){
				$_in_list .= $v['id'].',';
			}
			$_in_list = $_in_list.$_date_id;	
			$_where .= "a1.typeid in({$_in_list}) and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
			
		}
		
		$_CountryList = $_data = $this->_arctype->where("reid = {$_data['topid']} and ranks = 2")->Field('id,typename,typedir')->select();	//查询之后返回一维数组);
		
		$_citylist = $this->getListCity($_where,false);	//传入第一个城市的typeid，返回10个城市的列表数据		//传入第一个城市的typeid，返回10个城市的列表数据
		$_getCount = $this->getCountCity($_where);	//传入第一个城市的typeid，返回10个城市的列表数据		//传入第一个城市的typeid，返回10个城市的列表数据	
		$_data = array_merge($_data,$_country_hot[0]);//合并数组
		$_data = array_merge($_data,$_POST);//合并数组
		if(!empty($_getCount))  $_data['count'] = intval($_getCount[0]['count']);		
		$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
		$_data['page_size'] = C("PAGE_SIZE");
		$this->assign('data',$_data);
		$this->assign('countryList',$_CountryList);
		$this->assign('citylist',$_citylist);
		$this->assign('hotcity',$_hotcity);
		$this->assign('date',date('Y-m-d'));			//为酒店入住日期加一个开始时间.	
		$this->display('content/search');
	}
	
	public function getSearchPage(){ 
		$_POST["keys_country"] = intval($_POST["p_keys_country"]);
		$_POST["keys_city"] = intval($_POST["p_keys_city"]);
		$_stars = intval($_POST["p_stars"]);
		$_POST["city_name"] = htmlspecialchars(trim($_POST["p_city_name"]));
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_date_id = $_POST["keys_country"];
		
		$_where = "where ";
		
		if($_date_id <= 0){				
			exit;
		}		
		switch ($_stars) {
			case 1:
				$_stars = "";
				break;
			case 2:
				$_stars = "★★";
				break;
			case 3:
				$_stars = "★★★";
				break;
			case 4:
				$_stars = "★★★★";
				break;
			case 5:
				$_stars = "★★★★★";
				break;
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
			$_date_id = $_POST["keys_city"];
			$_data = $this->_arctype->where("id = {$_date_id}")->find();
			$_hotcity = $this->_m->query("select c.count,a.id,c.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.typeid = a.id where c.typeid = {$_date_id} order by c.count desc");
			//$_data['count'] = intval(R('City/getCityCount',array($_data['id'])));	//获得总的酒店数
			$_country_hot = $this->_m->query("select sum(c.count) count,a.picname from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.typeid = {$_date_id} group by c.reid order by c.count");	
			$_where .= "a1.typeid = {$_POST["keys_city"]} and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
		}else{
			$_data = $this->_arctype->where("id = {$_date_id}")->find();
			$_hotcity = $this->_m->query("select c.count,a.id,c.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.typeid = a.id where c.reid = {$_date_id} order by c.count desc limit 8");
			$_country_hot = $this->_m->query("select sum(c.count) count,a.picname from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.reid = {$_date_id} group by c.reid order by c.count");			
			$_data_list = $this->_arctype->where("reid = {$_date_id}")->select();
			$_in_list = '';
			foreach($_data_list as $k=>$v){
				$_in_list .= $v['id'].',';
			}
			$_in_list = $_in_list.$_date_id;	
			$_where .= "a1.typeid in({$_in_list}) and a2.title like '%{$_POST["city_name"]}%' and a1.stars like '%{$_stars}%'";
			
		}
		$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
		a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
		a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
		{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id {$_where} {$_order} {$_limit}";	
		$_citylist = $this->_m->query($_sql);	//传入第一个城市的typeid，返回10个城市的列表数据			
		echo json_encode($_citylist);
		
 			
	}
	
	/**
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getListCity($_where = '',$_rmlimit = false,$_limit = 'limit 10',$_order = "pubdate"){

		if($_rmlimit) $_limit = '';
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_order = "order by a2.".$_order.' desc';		
		$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
		a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
		a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
		{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id {$_where} {$_order} {$_limit}";
		$_data = $this->_m->query($_sql);
		return $_data;
	}
	
	/**
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getCountCity($_where = ''){
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_order = "order by a2.".$_order.' desc';		
		$_sql = "select count(*) count from {$_DB_PREFIX}addonarticle a1 left join
		{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id {$_where}";
		$_data = $this->_m->query($_sql);
		return $_data;
	}
	
	/**
	 *
	 * 说明：传入一个action
	 * 用法：会返回城市的路径
	 */
	protected function getcityposition($name){//判断为公共方法
		if(empty($name)) return null;
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_sql = "select a3.id t_id,a3.typename t_typename,a3.typedir t_typedir,a2.id p_id,a2.typename p_typename,
		a2.typedir p_typedir,a1.id s_id,a1.typename s_typename,a1.typedir s_typedir 
		from {$_DB_PREFIX}arctype a1 left join {$_DB_PREFIX}arctype a2 on a1.reid = a2.id left join {$_DB_PREFIX}arctype a3 on a2.reid = a3.id
		where a1.typedir = '$name' limit 1";		
		$_position = $this->_m->query($_sql);
		return $_position;
	}
	
}