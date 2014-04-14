<?php

class ArctypeModel extends Model {

    
	/*
	 * 说明：输入一个条件，返回一行数据
	 */
	
	public function getOne($cityName = '',$_typeid = 0){
		if(!empty($cityName)){
            if(S('typedir_'.$cityName) == true){
                $_data = S('typedir_'.$cityName);
            }else{
                $_data = $this->where("typedir = '{$cityName}'")->Field('id,picname,content,typename,typedir,keywords,seotitle,ranks,description,templist,weatherid,reid,topid')->find();			
            }
		}
		if(intval($_typeid) > 0){
            if(S('typedir_'.$_typeid) == true){
                $_data = S('typedir_'.$_typeid);
            }else{
                $_data = $this->where("id = '{$_typeid}'")->Field('id,picname,content,typename,typedir,keywords,seotitle,ranks,description,templist,weatherid,reid,topid')->find();		
				if(!empty($_data)){
					S('typedir_'.$_typeid,$_data);
				}
            }
		}
		return $_data;
	}
	
	/*
	 * 说明：攻略，获得列表
	*/
	
	public function getTypeList(){
		$_type_list = array();
		if(S('type_list') == true){
			$_type_list = type_list(S('type_list'),0);
		}else{
			$_type_list = $this->where("ranks in (1,2,3)")->Field('id,typename,reid,topid,typedir,ranks,picname')->select();
			if(!empty($_type_list)){
				S('type_list',$_type_list);	
			}					
		}
		return $_type_list;
	}
	
	/*
	 * 说明：验证china这个模块是否是一个国家，ranks为2
	 * 用法：http://ht.lmz.com/china/shanghai，应该为china为一个国家
	 * 错误：http://ht.lmz.com/Asia/china，Asia为大洲或地区
	 */
	public function checkAM($_m,$_a){//m为module,a为action
		$_m_data = $this->where("typedir = '$_m' and ranks = 2")->Field('id,typename,typedir,ranks')->find();
		if(empty($_m_data)) return false;
		$_a_data = $this->where("typedir = '$_a' and reid = '$_m_data[id]'")->Field('id,typename,typedir,ranks')->find();
		if(!empty($_a_data)) return true;
		return false;
	}
	
	
	public function getList($_where = ''){
		if(!empty($_where)){
			return $this->where($_where)->Field('id,typename,typedir,ranks,picname')->limit('8')->select();
		}
		return null;
	}
	
    /*
     * 说明：输入一个模块名
	 * 用法：如果有就到模块名，没有就不返回数据
     */    
    public function getTypeIs($_name = ''){
        $_name = strtolower($_name);
        if(S('typedir_'.$_name) == true){
			$_data = S('typedir_'.$_name);
		}else{//查询之后返回一维数组
			$_data = $this->where("typedir = '{$_name}' and ranks in (1,2,3)")->Field('`id`,`picname`,`content`,`typename`,`typedir`,`keywords`,`seotitle`,`ranks`,`description`,`templist`,weatherid,topid,reid')->find();
            if(!empty($_data)){
                S('typedir_'.$_name,$_data);
            }else{
                return "";
            }
		}
        return $_name;
    }
	
	
	/**
     *查询出10个大洲下面的国家
	 */
	public function getHotCountryList($_id = 0){
        $_id = intval($_id);
        $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
        $_PAGE_SIZE = C('PAGE_SIZE');
        if(S('typedir_'.$_id) == true){
            $_data = S('typedir_'.$_id);
        }else{
            $_data = $this->query("select count(*) count,a1.typeid,a2.typename,a2.typedir from {$_DB_PREFIX}addonarticle  a1 left join {$_DB_PREFIX}arctype a2 on a1.typeid = a2.id where a2.topid = {$_id} group by typeid order by count(*) desc limit {$_PAGE_SIZE}");
            if(!empty($_data)){
                S('typedir_'.$_id,$_data);
            }else{
                return null;
            }
            
        }
        return $_data;
    }
	
	/**
     * 大洲与国家的列表
     */
	public function getContinentlist(){
        if(S('Continentlist') == true){
            $_data = S('Continentlist');
        }else{
            $_data = $this->where('ranks in(1,2)')->Field('id,typename,typedir,ranks,picname,reid,topid')->select();
            if(!empty($_data)){
                S('Continentlist',$_data);
            }
        }
        return $_data;
    }
    
    /**
     * 8个热门国家列表,传入大洲ID
     */
	public function getCountryHot($_id = 0){
        $_id = intval($_id);
        $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		if($_id > 0){
			if(S('CountryHot_'.$_id) == true){
				$_data = S('CountryHot_'.$_id);
			}else{
				$_data = $this->query("select sum(c.count) count,a.id,a.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.topid = {$_id} group by c.reid order by c.count desc limit 8");
				if(!empty($_data)){
					
					S('CountryHot_'.$_id,$_data);
				}
			}
			return $_data;
		}        
        return null;
    }
    
    /**
      * 说明：传入一个action
	  * 用法：会返回一个路径
      */
    public function getPosition($_name){
        if(S('Position_'.$_name) == true){
            $_position = S('Position_'.$_name);
        }else{
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀	
            $_sql = "select a2.id p_id,a2.typename p_typename,a2.typedir p_typedir,a1.id s_id,a1.typename s_typename,a1.typedir s_typedir 
            from {$_DB_PREFIX}arctype a1 left join {$_DB_PREFIX}arctype a2 on a1.reid = a2.id where a1.typedir = '{$_name}' limit 1";
            $_position = $this->query($_sql); 
            if(!empty($_position)) $_position = $_position[0];
            S('Position_'.$_name,$_position);
        }
        return $_position;
    }
    
	/**
	 *
	 * 说明：传入一个action
	 * 用法：会返回城市的路径
	 */
	public function getCityPosition($_name){//判断为公共方法
		if(S('CityPosition_'.$_name) == true){
            $_position = S('CityPosition_'.$_name);
        }else{
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			$_sql = "select a3.id t_id,a3.typename t_typename,a3.typedir t_typedir,a2.id p_id,a2.typename p_typename,
			a2.typedir p_typedir,a1.id s_id,a1.typename s_typename,a1.typedir s_typedir 
			from {$_DB_PREFIX}arctype a1 left join {$_DB_PREFIX}arctype a2 on a1.reid = a2.id left join {$_DB_PREFIX}arctype a3 on a2.reid = a3.id
			where a1.typedir = '{$_name}' limit 1";		
			$_position = $this->query($_sql);
			if(!empty($_position)) $_position = $_position[0];
			S('CityPosition_'.$_name,$_position);
		}
		return $_position;
	}
    
    /**
     * 8个热门国家列表,传入大洲ID
     */
	public function getCityHot($_id = 0){
        $_id = intval($_id);
        $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
        if(S('CityHot_'.$_id) == true){
            $_data = S('CityHot_'.$_id);
        }else{
            $_data = $this->query("select c.count,a.id,c.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.typeid = a.id where c.reid = {$_id} order by c.count desc limit 8");
            if(!empty($_data)){
                S('CityHot_'.$_id,$_data);
            }
        }               
        return $_data;
    }
    
	/**
     * 获得城市搜索列表
     */
	public function getCountryList($_id = 0){
        $_id = intval($_id);
        $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
        if(S('CountryList_'.$_id) == true){
            $_data = S('CountryList_'.$_id);
        }else{
            $_data = $this->where("reid = {$_id} and ranks = 2")->Field('id,typename,typedir')->select();	
			if(!empty($_data)){
                S('CountryList_'.$_id,$_data);
            }
        }               
        return $_data;
    }
    
	/**
     * 获得城市搜索列表
     */
	public function getCityIndexList($_typeid = 0){
        $_typeid = intval($_typeid);
        if($_typeid > 0){
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            if(S('CityIndexList_'.$_typeid) == true){
                $_data = S('CityIndexList_'.$_typeid);
            }else{
                $_data =  $this->where("reid = '{$_typeid}'")->select();	
                if(!empty($_data)){
                    S('CityIndexList_'.$_typeid,$_data);
                }
            }
            return $_data;
        }
        return null;    
    }
	
	/*
		搜索页
	*/
	public function getSearchCountryCount($_typeid = 0,$_where = ''){
        $_typeid = intval($_typeid);
        if($_typeid > 0){
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			if($_where == 'reid'){
				$_data = $this->query("select sum(c.count) count,a.picname from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.reid = {$_typeid} group by c.reid order by c.count");
			}
			if($_where == 'typeid'){
				$_data = $this->query("select sum(c.count) count,a.picname from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.typeid = {$_typeid} group by c.reid order by c.count");
			}
            return $_data;
        }
        return null;    
    }
	
	/**
     * 8个热门国家列表,传入大洲ID
     */
	public function getSearchCountryHot($_id = 0){
        $_id = intval($_id);
        $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		if($_id > 0){
			if(S('SearchCountryHot_'.$_id) == true){
				$_data = S('SearchCountryHot_'.$_id);
			}else{
				$_data = $this->query("select sum(c.count) count,a.id,a.typename,a.picname,a.typedir from {$_DB_PREFIX}country_count c left join {$_DB_PREFIX}arctype a on c.reid = a.id where c.reid = {$_id} group by c.reid order by c.count desc limit 8");
				if(!empty($_data)){
					
					S('SearchCountryHot_'.$_id,$_data);
				}
			}
			return $_data;
		}        
        return null;
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
		$_data = $this->query($_sql);
		return $_data;
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
		$_data = $this->query($_sql);
		return $_data;
	}
	
	/**
	 * 说明：传入城市的Id
	 * 返回：城市的搜索酒店列表
	 */
	public function getSearchListCity($_where = '',$_rmlimit = false,$_limit = 'limit 10',$_order = "order by a2.id desc"){
		if($_rmlimit) $_limit = '';
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀	
		$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
		a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
		a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
		{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id {$_where} {$_order} {$_limit}";
		$_data = $this->query($_sql);
		return $_data;
	}
}

?>