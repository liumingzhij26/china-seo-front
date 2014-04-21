<?php
class Base extends PHPUnit_Framework_TestCase{
 
	public $_db;
 
	public function __construct(){
		$this->_db = $this->getDb();
	}
	
	public function getDb(){
		$db = new MedooModel(array(
					'server' => '127.0.0.1',
					'database_type' => 'mysql',
					'username' => 'netconcepts',
					'password' => 'netconcepts.cn',
					'database_name' => 'ht_cn',
					'charset' => 'utf8'
				));
		return $db;
	}
	
	public function getTypeIs($_name = ''){
		$_name = strtolower($_name);
		if(preg_match('/^[\w\-]+$/',$_name)){
			$_sql = "SELECT `id`,`picname`,`content`,`typename`,`typedir`,`keywords`,`seotitle`,`ranks`,`description`,`templist`,`weatherid`,`topid`,`reid` FROM `dede_arctype` WHERE ( typedir = '{$_name}' and ranks in (1,2,3) ) LIMIT 1";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_name;
			}
		}
		return null;
	}
	
	public function getOne($cityName = '',$_typeid = 0){
		if(!empty($cityName)){            
			$_sql = "select id,picname,content,typename,typedir,keywords,seotitle,ranks,description,templist,weatherid,reid,topid from dede_arctype where typedir = '{$cityName}' limit 1";
            $_data = $this->_db->query($_sql)->fetchAll();
		}
		if(intval($_typeid) > 0){
            $_sql = "select id,picname,content,typename,typedir,keywords,seotitle,ranks,description,templist,weatherid,reid,topid from dede_arctype where id = '{$_typeid}' limit 1";
            $_data = $this->_db->query($_sql)->fetchAll();	
		}
		if(!empty($_data)){
			$_data = $_data[0];
			return $_data;
		}
		return null;
		
	}
	
	
	/**
     *查询出10个大洲下面的国家
	 */
	public function getHotCountryList($_id = 0){
        $_id = intval($_id);
		if($_id > 0){
			$_sql = "select count(*) count,a1.typeid,a2.typename,a2.typedir from dede_addonarticle  a1 left join dede_arctype a2 on a1.typeid = a2.id where a2.topid = {$_id} group by typeid order by count(*) desc limit 10";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}
		}
		return null;
    }
	
	/**
     * 大洲与国家的列表
     */
	public function getContinentlist(){
		$_sql = "select id,typename,typedir,ranks,picname,reid,topid from dede_arctype where ranks in(1,2)";
		$_data = $this->_db->query($_sql)->fetchAll();
		if(!empty($_data)){
			return $_data;
		}
        return null;
    }
	
	/**
     * 8个热门国家列表,传入大洲ID
     */
	public function getCountryHot($_id = 0){
        $_id = intval($_id);
		if($_id > 0){
			$_sql = "select sum(c.count) count,a.id,a.typename,a.picname,a.typedir from dede_country_count c left join dede_arctype a on c.reid = a.id where c.topid = {$_id} group by c.reid order by c.count desc limit 8";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}
		}        
        return null;
    }
	
	/**
     * 8个热门国家列表,传入大洲ID
     */
	public function getCityHot($_id = 0){
        $_id = intval($_id);
        if($_id > 0){
			$_sql = "select c.count,a.id,c.typename,a.picname,a.typedir from dede_country_count c left join dede_arctype a on c.typeid = a.id where c.reid = {$_id} order by c.count desc limit 8";
            $_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}
		}              
        return null;
    }
	
	/**
      * 说明：传入一个action
	  * 用法：会返回一个路径
      */
    public function getPosition($_name){
		$_sql = "select a2.id p_id,a2.typename p_typename,a2.typedir p_typedir,a1.id s_id,a1.typename s_typename,a1.typedir s_typedir 
		from dede_arctype a1 left join dede_arctype a2 on a1.reid = a2.id where a1.typedir = '{$_name}' limit 1";
		$_data = $this->_db->query($_sql)->fetchAll();
		if(!empty($_data)){
			$_data = $_data[0];
			return $_data;
		}
        return null;
    }
	
	/**
	 *
	 * 说明：传入一个action
	 * 用法：会返回城市的路径
	 */
	public function getCityPosition($_name){//判断为公共方法
			$_sql = "select a3.id t_id,a3.typename t_typename,a3.typedir t_typedir,a2.id p_id,a2.typename p_typename,
			a2.typedir p_typedir,a1.id s_id,a1.typename s_typename,a1.typedir s_typedir 
			from dede_arctype a1 left join dede_arctype a2 on a1.reid = a2.id left join dede_arctype a3 on a2.reid = a3.id
			where a1.typedir = '{$_name}' limit 1";		
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				$_data = $_data[0];
				return $_data;
			}
        return null;
	}
    
	
	/**
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getCityList($_typeid,$_rmlimit = false,$_limit = 'limit 10',$_order = "pubdate"){
		if($_rmlimit) $_limit = '';
		$_order = "order by a2.".$_order.' desc';
		if(intval($_typeid) > 0){            
			$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
			a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
			a1.address,a2.title,a2.litpic,a2.description from dede_addonarticle a1 left join
			dede_archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ({$_typeid}) {$_order} {$_limit}";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}
		}
		return null;
	}
	
	/**
     * 旅游模块
     */
	public function getScenic($_id){
		$_id = (int)$_id;
		$_sql = "select * from dede_scenic where cityid = {$_id}";
		$_data = $this->_db->query($_sql)->fetchAll();
		if(!empty($_data)){
			return $_data;
		}
		return null;
	}
	
	/**
	 *
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getListContinent($_id = 0){
		if(intval($_id) > 0){
			$_sql = "select id,typename,typedir,ranks,picname,reid,topid from dede_arctype where ranks = {$_id} limit 8";
            $_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}
        }        
		return null;
	}
	
	
	/*
	 * 说明：攻略，获得列表
	*/
	
	public function getTypeList(){
		$_sql = "select id,typename,reid,topid,typedir,ranks,picname from dede_arctype where ranks in (1,2,3)";
		$_data = $this->_db->query($_sql)->fetchAll();
		if(!empty($_data)){
			return $_data;
		}		
		return null;
	}
	
	
	/**
	 * 说明：获得自定义属性：	头条[h]推荐[c]幻灯[f]特荐[a]滚动[s]景点[b]图片[p]概况[g],click为点击，
	*/
	public function getTypeAttribute($_flag = '',$_limit = 10,$_order = 'pubdate'){
		
		$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
		$_sql = "SELECT `id`,`title`,`litpic`,`shorttitle` FROM `dede_archives` WHERE ( flag like '%{$_flag}%' and typeid in (select id from dede_arctype where ranks = 4) ) ORDER BY {$_order} desc LIMIT {$_limit}";
		$_data = $this->_db->query($_sql)->fetchAll();
		if(!empty($_data)){
			return $_data;
		}		
		return null;		
	}
	
	
	/**
	 * 说明：获得攻略文章信息
	*/
	public function getGuideList($_order = 'pubdate',$_limit = 10){
		if(preg_match('/^pubdate|click$/',$_order)){			
			$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
			$_sql = "select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from dede_archives a left join dede_arctype t on a.typeid2 = t.id where a.typeid in(select id from dede_arctype where ranks = 4) and t.typename is not null order by a.{$_order} desc limit {$_limit};";
			$_data = $this->_db->query($_sql)->fetchAll();	
			if(!empty($_data)){
				return $_data;
			}
		}
		return null;		
	}
	
	
	/**
	 * 说明：获得攻略最新酒店信息
	*/
	public function getGuideHotelList($_order = 'pubdate',$_limit = 10){	
		if(preg_match('/^pubdate|click$/',$_order)){
			$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
			$_sql = "select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from dede_archives a left join dede_arctype t on a.typeid = t.id where a.typeid in((select id from dede_arctype where ranks = '3')) and t.typename is not null and a.channel = 1 order by a.{$_order} desc limit {$_limit};";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}	
		}		
		return null;		
	}
	
	/**
	 * 说明：获得攻略最新酒店信息
	*/
	public function getGuideHotelAttribute($_flag = '',$_limit = 10,$_order = 'pubdate'){
		if(preg_match('/^[hcfasbpg]$/',$_flag)){
			$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
			$_sql = "select a.id,a.title,a.litpic,t.stars,t.infos,t.price,a.description from dede_archives a left join dede_addonarticle t on (a.id = t.aid) where a.typeid in((select id from dede_arctype where ranks = '3')) and a.flag like '%{$_flag}%' order by a.{$_order} desc limit {$_limit};";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				return $_data;
			}
		}
		return null;		
	}
	
	/**
	 * 说明：获得攻略文章信息
	*/
	public function getGuideOne($_id = 0){
		if(intval($_id) > 0){           
			$_sql = "select a.*,d.body,t.typename,t.typedir,t.reid,t.topid,t.ranks from dede_archives a left join dede_arctype t on a.typeid2 = t.id left join dede_guide d on d.aid = a.id where a.id = {$_id} and d.aid = {$_id} limit 0,1;";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)){
				$_data = $_data[0];
			}            
			return $_data;
		}
		return null;		
	}
	
	
	  /**
	 *
	 * 说明：传入一个类型ID,获得一个路径
	 */
	public function getGuidePosition($_typeid = 0){//判断为公共方法	
        if($_typeid > 0){            
			$_sql = "select t1.typename,t2.typename p_typename,t2.typedir from dede_arctype t1 left join dede_arctype t2 on t1.reid = t2.id where t1.id = {$_typeid}";
            $_data = $this->_db->query($_sql)->fetchAll();
            if(!empty($_data)){
				$_data = $_data[0];
			}
            return $_data;
        }
        return null;
	}
    
	
	 /**
	 *
	 * 说明：传入一个类型ID
	 * 用法：会返回城市的热门信息
	 */
	public function getGuideHotList($_typeid = 0,$_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if($_typeid > 0){        
			$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
			$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
				a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
				a1.address,a2.title,a2.litpic,a2.description from dede_addonarticle a1 left join
				dede_archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ((select id from dede_arctype where reid = {$_typeid})) order by a2.{$_order} desc limit {$_limit}";
			 $_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)) {
				return $_data;
			}
        }
        return null;
	}
	
	/**
	 *
	 * 说明：传入一个类型ID
	 * 用法：会返回城市的文章信息
	 */
	public function getGuideHotNewList($_typeid = 0,$_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if($_typeid > 0){            
			$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
			$_sql = "select a.title,a.id from dede_archives a left join dede_arctype t on a.typeid2 = t.id left join dede_guide d on d.aid = a.id where a.typeid2 in ({$_typeid}) and a.channel = '17' order by a.{$_order} desc limit {$_limit};";	
			 $_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data)) {
				return $_data;
			}
        }
        return null;
	}
	
	/**
	 *
	 * 说明：获得攻略文章列表数量
	 */
	public function getGuideCityIndexPageCount($_typeid = 0){//判断为公共方法	
        if($_typeid > 0){
			$_sql = "select count(*) count from dede_archives a left join dede_arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and channel !='2'";
            $_data = $this->_db->query($_sql)->fetchAll();
            if(!empty($_data)){
                $_data = $_data[0]['count'];					
            }
            return $_data;
        }
        return null;
	}
	
	/**
	 *
	 * 说明：传入一个类型ID
	 * 用法：会返回城市的文章信息
	 */
	public function getGuideCityList($_typeid = 0,$_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if($_typeid > 0){
			$_sql = "select a.*,t.typename,t.typedir from dede_archives a left join dede_arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and a.channel ='17' order by a.{$_order} desc limit {$_limit}";
			$_data = $this->_db->query($_sql)->fetchAll();
			if(!empty($_data) && is_int($_limit)) {                    
				return $_data;
			}
        }
        return null;
	}
	
	/**
	 * 说明：获得自定义属性：	头条[h]推荐[c]幻灯[f]特荐[a]滚动[s]景点[b]图片[p]概况[g],click为点击，
	*/
	public function getCityIndexAttribute($_typeid = 0,$_flag = '',$_limit = 1,$_order = 'pubdate'){
		if(preg_match('/^[hcfasbpg]$/',$_flag)){
			if($_limit == 1){
				$_sql = "select id,title,litpic,shorttitle,flag from dede_archives where flag like '%{$_flag}%' and typeid2 in ({$_typeid}) order by {$_order} desc limit 1";
				$_data = $this->_db->query($_sql)->fetchAll();
				if(!empty($_data)) {
					return $_data[0];
				}
			}else{
				$_sql = "select id,title,litpic,shorttitle,flag from dede_archives where flag like '%{$_flag}%' and typeid2 in ({$_typeid}) order by {$_order} desc limit {$_limit}";
				$_data = $this->_db->query($_sql)->fetchAll();
				if(!empty($_data)) {
					return $_data;
				}	
			}		
		}
		return null;		
	}
	
	/**
	 *
	 * 说明：获得攻略文章列表数量
	 */
	public function getGuideCityListPageCount($_typeid = 0){//判断为公共方法	
        if($_typeid > 0){
            $_sql = "select count(*) count from dede_archives a left join dede_arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and a.channel ='17'";
			$_data = $this->_db->query($_sql)->fetchAll();
            if(!empty($_data)){
                $_data = $_data[0]['count'];					
            }
            return $_data;
        }
        return null;
	}
	
	
	 /**
	 *
	 * 说明：获得攻略文章列表数量
	 */
	public function getGuideListPageCount(){//判断为公共方法	
        $_sql = "select count(*) count from dede_archives a left join dede_arctype t on t.id = a.typeid2 where a.typeid in((select id from dede_arctype where ranks = '4')) and a.typeid2 != '0'";
		$_data = $this->_db->query($_sql)->fetchAll();
        if(!empty($_data)){
			return $_data[0]['count'];
        }
        return null;
	}
	
	/**
	 *
	 * 说明：获得攻略文章列表的右边
	 */
	public function getGuideRightListPages($_limit = 10,$_order = 'pubdate'){//判断为公共方法  
		$_sql = "select 'id,title,litpic,shorttitle' from dede_archives where flag like '%c%' and typeid in ((select id from dede_arctype where ranks = '4')) and channel !='2' order by {$_order} desc limit {$_limit}";
		$_data = $this->_db->query($_sql)->fetchAll();
		if(!empty($_data)){
			if(is_int($_limit) > 0){
				return $_data;
			}					
		}        
        return null;
	}
	
}
?>