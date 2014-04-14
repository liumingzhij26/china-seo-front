<?php

class GuideModel extends Model {

		
	/**
	 * 说明：获得自定义属性：	头条[h]推荐[c]幻灯[f]特荐[a]滚动[s]景点[b]图片[p]概况[g],click为点击，
	*/
	public function getTypeAttribute($_flag = '',$_limit = 10,$_order = 'pubdate'){
		if(preg_match('/^[hcfasbpg]$/',$_flag)){
			if(S('Attribute_'.$_flag) == true){
				$_data = S('Attribute_'.$_flag);
			}else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
				$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
				$_data = $this->where("flag like '%{$_flag}%' and typeid in (select id from {$_DB_PREFIX}arctype where ranks = 4)")->Field('id,title,litpic,shorttitle')->order("{$_order} desc")->limit($_limit)->select();
				if(!empty($_data)) {
					S('Attribute_'.$_flag,$_data);
				}
			}
			return $_data;
		}
		return null;		
	}
	
	
	/**
	 * 说明：获得攻略文章信息
	*/
	public function getGuideList($_order = 'pubdate',$_limit = 10){
		if(preg_match('/^pubdate|click$/',$_order)){
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			if(S('GuideList_'.$_order) == true){
				$_data = S('GuideList_'.$_order);
			}else{
				$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
				$_data = $this->query("select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in(select id from dede_arctype where ranks = 4) and t.typename is not null order by a.{$_order} desc limit {$_limit};");
				if(!empty($_data)) {
					S('GuideList_'.$_order,$_data);
				}
			}
			return $_data;
		}
		return null;		
	}
	
	
	/**
	 * 说明：获得攻略文章信息
	*/
	public function getGuideOne($_id = 0){
		if(intval($_id) > 0){
            if(S('GuideOne_'.$_id) == true){
                $_data = S('GuideOne_'.$_id);
            }else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
                $_data = $this->query("select a.*,d.body,t.typename,t.typedir,t.reid,t.topid,t.ranks from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id left join {$_DB_PREFIX}guide d on d.aid = a.id where a.id = {$_id} and d.aid = {$_id} limit 0,1;");
                if(!empty($_data)){
                    $_data = $_data[0];
                    S('GuideOne_'.$_id,$_data,1800);
                }
            }
			return $_data;
		}
		return null;		
	}
	
	/**
	 * 说明：获得攻略最新酒店信息
	*/
	public function getGuideHotelList($_order = 'pubdate',$_limit = 10){
		if(preg_match('/^pubdate|click$/',$_order)){
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			if(S('GuideHotelList_'.$_order) == true){
				$_data = S('GuideHotelList_'.$_order);
			}else{
				$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
				$_data = $this->query("select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid = t.id where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '3')) and t.typename is not null and a.channel = 1 order by a.{$_order} desc limit {$_limit};");
				if(!empty($_data)) {
					S('GuideHotelList_'.$_order,$_data);
				}
			}
			return $_data;
		}
		return null;		
	}
	
	/**
	 * 说明：获得攻略最新酒店信息
	*/
	public function getGuideHotelAttribute($_flag = '',$_limit = 10,$_order = 'pubdate'){
		if(preg_match('/^[hcfasbpg]$/',$_flag)){
			if(S('GuideHotelAttribute_'.$_flag) == true){
				$_data = S('GuideHotelAttribute_'.$_flag);
			}else{
				$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
				$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
				$_data = $this->query("select a.id,a.title,a.litpic,t.stars,t.infos,t.price,a.description from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}addonarticle t on (a.id = t.aid) where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '3')) and a.flag like '%{$_flag}%' order by a.{$_order} desc limit {$_limit};");
				if(!empty($_data)) {
					S('GuideHotelAttribute_'.$_flag,$_data);
				}				
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
            if(S('GuideHotList_'.$_typeid) == true){
                $_data = S('GuideHotList_'.$_typeid);
            }else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
                $_limit = intval($_limit) > 0 ? intval($_limit) : 10;
                $_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
                    a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
                    a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
                    {$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ((select id from {$_DB_PREFIX}arctype where reid = {$_typeid})) order by a2.{$_order} desc limit {$_limit}";
                $_data = $this->query($_sql);
                if(!empty($_data)) {
					S('GuideHotList_'.$_typeid,$_data);
				}
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
	public function getGuideHotNewList($_typeid = 0,$_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if($_typeid > 0){
            if(S('getGuideHotNewList_'.$_typeid.$_order) == true){
                $_data = S('getGuideHotNewList_'.$_typeid.$_order);
            }else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
                $_limit = intval($_limit) > 0 ? intval($_limit) : 10;
                $_data = $this->query("select a.title,a.id from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id left join {$_DB_PREFIX}guide d on d.aid = a.id where a.typeid2 in ({$_typeid}) and a.channel = '17' order by a.{$_order} desc limit {$_limit};");	
                if(!empty($_data)) {
					S('getGuideHotNewList_'.$_typeid.$_order,$_data);
				}
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
            if(S('GuideCityList_'.$_typeid.$_order) == true && is_int($_limit)){
                $_data = S('GuideCityList_'.$_typeid.$_order);
            }else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
                $_data = $this->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and a.channel ='17' order by a.{$_order} desc limit {$_limit}");	
                if(!empty($_data) && is_int($_limit)) {                    
					S('GuideCityList_'.$_typeid.$_order,$_data);
				}
            }
            return $_data;
        }
        return null;
	}
    
    /**
	 *
	 * 说明：传入一个类型ID
	 * 用法：会返回城市的分页文章信息列表
	 */
	public function getGuideCityPageList($_typeid = 0,$_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if($_typeid > 0){            
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and a.channel ='17' order by a.{$_order} desc limit {$_limit}");	
            return $_data;
        }
        return null;
	}
    
    /**
	 *
	 * 说明：传入一个类型ID
	 * 用法：会返回城市的最新的相关文章信息，如果不足10篇，就调用其他
	 */
	public function getGuideHeadlinePubdate($_typeid = 0,$_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if($_typeid > 0){
            if(S('GuideHeadlinePubdate_'.$_typeid) == true){
                $_data = S('GuideHeadlinePubdate_'.$_typeid);
            }else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
                $_limit = intval($_limit) > 0 ? intval($_limit) : 10;
                $_data = $this->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id and a.channel !='2' where a.typeid2 in({$_typeid}) and t.typename is not null order by a.pubdate desc limit {$_limit};");
                $_limit = 10 - count($_data);
                if($_limit > 0){
                    $_list = $this->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '4')) and t.typename is not null order by a.pubdate desc limit {$_limit};");
                    $_data = array_merge($_data,$_list);			
                }
                if(!empty($_data)) {
					S('GuideHeadlinePubdate_'.$_typeid,$_data);
				}
            }
            return $_data;
        }
        return null;
	}
    
    /**
	 *
	 * 说明：传入一个类型ID,与文章ID，取上页下页
	 */
	public function getGuidePageNext($_id = 0,$_typeid = 0,$_size = ''){//判断为公共方法	
        if($_id > 0 && $_typeid > 0){            
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select a.* from {$_DB_PREFIX}archives a where a.id {$_size} {$_id} and a.typeid2 in ({$_typeid})  limit 1;");
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
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select t1.typename,t2.typename p_typename,t2.typedir from {$_DB_PREFIX}arctype t1 left join {$_DB_PREFIX}arctype t2 on t1.reid = t2.id where t1.id = {$_typeid}");
            if(!empty($_data)){
				$_data = $_data[0];
			}
            return $_data;
        }
        return null;
	}
    
    
     /**
	 *
	 * 说明：获得攻略文章列表
	 */
	public function getGuideListPages($_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if(S('GuideListPages_'.$_order) == true && is_int($_limit)){
            $_data = S('GuideListPages_'.$_order);
        }else{
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '4')) and a.typeid2 != 0 and a.channel ='17' order by a.{$_order} desc limit {$_limit}");	
            if(!empty($_data)){
                if(is_int($_limit) > 0){
                    S('GuideListPages_'.$_order,$_data);
                }					
            }
        }
        return $_data;
	}

    
    /**
	 *
	 * 说明：获得攻略文章列表数量
	 */
	public function getGuideCityListPageCount($_typeid = 0){//判断为公共方法	
        if($_typeid > 0){
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select count(*) count from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and a.channel ='17'");
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
	public function getGuideCityIndexPageCount($_typeid = 0){//判断为公共方法	
        if($_typeid > 0){
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select count(*) count from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_typeid}) and a.typeid2 != 0 and channel !='2'");
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
        $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
        $_data = $this->query("select count(*) count from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '4')) and a.typeid2 != '0'");
        if(!empty($_data)){
            $_data = $_data[0]['count'];					
        }
        return $_data;
	}
    
    
}

?>