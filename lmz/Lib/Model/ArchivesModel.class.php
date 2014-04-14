<?php

class ArchivesModel extends Model {

	/*
	 * 说明：输入一个条件，返回一行数据
	 */
	
	public function getCityListCount($_id = 0){
		$_id = intval($_id);
		if($_id > 0){
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("select count(*) count from {$_DB_PREFIX}addonarticle a1 left join {$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid = {$_id}");
			if(!empty($_data)){
				$_id = intval($_data[0]['count']);
			}
		}
		return $_id;
	}
	
	
	/**
	 * 获得城市排序页面数量
	*/
	public function getCityPageCount($_typeid = 0){
		if($_typeid > 0){
			$_count = 0;
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			$_count_sql = "select count(*) count from {$_DB_PREFIX}addonarticle a1 left join
	 			{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid = {$_typeid} and a2.title is not null";	
			$_data = $this->query($_count_sql);
			if(!empty($_data)){
				$_count = intval($_data[0]['count']);
			}
		}
		return $_count;
	}
	
	/**
	 * 获得城市排序页面列表数据
	*/
	public function getCityPageList($_typeid = 0,$_order = '',$_limit = ''){
		if($_typeid > 0){
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
	 			a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
	 			a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
	 			{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid = {$_typeid} and a2.title is not null {$_order} {$_limit}";
			$_data = $this->query($_sql);
			if(!empty($_data)){
				return $_data;
			}
		}
		return null;
	}
	
	/**
	 * 获得搜索城市页面列表数量
	 */
	public function getSearchPageCityCount($_where = ''){
		$_count = 0;
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_sql = "select count(*) count from {$_DB_PREFIX}addonarticle a1 left join {$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id {$_where}";
		$_data = $this->query($_sql);
		if(!empty($_data)){
			$_count = intval($_data[0]['count']);
		}		
		return $_count;
	}
	
	/**
	 * 获得城市排序页面列表数据
	*/
	public function getSearchPageCityList($_where = '',$_order = '',$_limit = ''){
		if(!empty($_where)){
			$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
					a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
					a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
					{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id {$_where} {$_order} {$_limit}";
			$_data = $this->query($_sql);
			if(!empty($_data)){
				return $_data;
			}
		}
		return null;
	}
	
	
	/**
	 * 说明：传入城市的Id
	 * 返回：城市的酒店列表
	 */
	public function getCityList($_typeid,$_rmlimit = false,$_limit = 'limit 10',$_order = "pubdate"){
		$_typeid = (int)$_typeid;
		if($_rmlimit) $_limit = '';
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_order = "order by a2.".$_order.' desc';
		if(intval($_typeid) > 0){
            if(S('CityList_'.$_typeid) == true){            
                $_data = S('CityList_'.$_typeid);
            }else{
                $_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
                a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
                a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
                {$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ({$_typeid}) {$_order} {$_limit}";
                $_data = $this->query($_sql);
                if(!empty($_data)){
                    S('CityList_'.$_typeid,$_data,1800);
                }
            }
			return $_data;
		}
		return null;
	}
	
	
	/**
	 * 说明：获得自定义属性：	头条[h]推荐[c]幻灯[f]特荐[a]滚动[s]景点[b]图片[p]概况[g],click为点击，
	*/
	public function getTypeAttribute($_flag = '',$_limit = 10,$_order = 'pubdate'){
		if(preg_match('/^[hcfasbpg]$/',$_flag)){
			if(S('Attribute_'.$_flag) == true){
				$_data = S('Attribute_'.$_flag);
			}else{
				$_limit = intval($_limit) > 0 ? intval($_limit) : 10;
				$_data = $this->where("flag like '%{$_flag}%' and typeid in (select id from dede_arctype where ranks = 4)")->Field('id,title,litpic,shorttitle')->order("{$_order} desc")->limit($_limit)->select();
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
	 * 说明：获得攻略文章列表的右边
	 */
	public function getGuideRightListPages($_limit = 10,$_order = 'pubdate'){//判断为公共方法	
        if(S('GuideRightListPages_'.$_order) == true && is_int($_limit)){
            $_data = S('GuideRightListPages_'.$_order);
        }else{
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->where("flag like '%c%' and typeid in ((select id from {$_DB_PREFIX}arctype where ranks = '4')) and channel !='2'")->Field('id,title,litpic,shorttitle')->order("{$_order} desc")->limit($_limit)->select();
            if(!empty($_data)){
                if(is_int($_limit) > 0){
                    S('GuideRightListPages_'.$_order,$_data);
                }					
            }
        }
        return $_data;
	}
    
    /**
	 *
	 * 说明：获得攻略文章城市首页图片列表
	 */
	public function getGuideCityIndexScenic($_typeid = 0){//判断为公共方法	
        if(S('GuideCityIndexScenic_'.$_typeid) == true){
            $_data = S('GuideCityIndexScenic_'.$_typeid);
        }else{
            $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
            $_data = $this->query("SELECT i.aid,i.typeid,i.imgurls,a.id,a.typeid2,u.url,u.title,u.arcid,u.aid FROM {$_DB_PREFIX}addonimages i,{$_DB_PREFIX}archives a,{$_DB_PREFIX}uploads u where i.aid = a.id and u.arcid = a.id and a.typeid2={$_typeid} and a.channel='2' group by i.imgurls;");
            if(!empty($_data)){
                S('GuideCityIndexScenic_'.$_typeid,$_data);
                					
            }
        }
        return $_data;
	}
    
    /**
	 * 说明：获得自定义属性：	头条[h]推荐[c]幻灯[f]特荐[a]滚动[s]景点[b]图片[p]概况[g],click为点击，
	*/
	public function getCityIndexAttribute($_typeid = 0,$_flag = '',$_limit = 1,$_order = 'pubdate'){
		if(preg_match('/^[hcfasbpg]$/',$_flag)){
			if(S('CityIndexAttribute_'.$_typeid.$_flag) == true){
				$_data = S('CityIndexAttribute_'.$_typeid.$_flag);
			}else{
                $_DB_PREFIX = C('DB_PREFIX');//取得表前缀
                if($_limit == 1){
                    $_data = $this->where("flag like '%{$_flag}%' and typeid2 in ({$_typeid})")->Field('id,title,litpic,shorttitle,flag')->order("{$_order} desc")->limit($_limit)->find();
                }else{
                    $_data = $this->where("flag like '%{$_flag}%' and typeid2 in ({$_typeid})")->Field('id,title,litpic,shorttitle,flag')->order("{$_order} desc")->limit($_limit)->select();
                }				
				if(!empty($_data)) {
					S('CityIndexAttribute_'.$_typeid.$_flag,$_data);
				}
			}
			return $_data;
		}
		return null;		
	}
}

?>