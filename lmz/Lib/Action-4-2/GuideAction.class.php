<?php 
class GuideAction extends BaseAction{
	
	private $_arctype = null;
	private $_archives = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
 		$this->_archives = D('Archives');
	}
	
	public function index(){	
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		if(S('type_list') == true){
			$_type_list = type_list(S('type_list'),0);
		}else{
			$_type_list = $this->_arctype->where("ranks in (1,2,3)")->Field('id,typename,reid,topid,typedir,ranks,picname')->select();
			S('type_list',$_type_list);			
		}
		$_scriptures = $this->_archives->where("flag like '%c%' and typeid in (54175,54174)")->Field('id,title,litpic,shorttitle')->order("pubdate desc")->limit('8')->select();
		
		$_data['auto'] = $this->_archives->where("flag like '%f%' and typeid in (54175,54174)")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('4')->select();
		
		$_data['headline'] = $this->_archives->where("flag like '%h%' and typeid in (54175,54174)")->Field('id,title,litpic,shorttitle')->order("pubdate desc")->limit('3')->select();
		$_data['headline_one'] = $this->_archives->where("flag like '%a%' and typeid in (54175,54174)")->Field('id,title,litpic,shorttitle')->order("pubdate desc")->limit('1')->find();
		
		$_data['headline_pubdate'] = $this->_m->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in(54175,54174) and t.typename is not null and a.channel !='2' order by a.pubdate desc limit 10;");
		
		$_data['headline_click'] = $this->_m->query("select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in(54175,54174) and t.typename is not null order by a.click desc limit 8;");
		
		
		$_data['hotel_click'] = $this->_m->query("select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid = t.id where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '3')) and t.typename is not null and a.channel = 1 order by a.click desc limit 9;");
		$_data['hotel_pubdate'] = $this->_m->query("select a.id,a.title,a.litpic,a.description,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid = t.id where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '3')) and t.typename is not null and a.channel = 1 order by a.pubdate desc limit 9;");
		
		$_data['hotel_hot'] = $this->_m->query("select a.id,a.title,a.litpic,t.stars,t.infos,t.price,a.description from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}addonarticle t on (a.id = t.aid) where a.typeid in((select id from {$_DB_PREFIX}arctype where ranks = '3' and topid != '54173')) and a.flag like '%c%' order by a.pubdate desc limit 3;");
		
		$this->assign('type_list',$_type_list);		
		$this->assign('data',$_data);	
		$this->assign('scriptures',$_scriptures);	
		$this->display("guide/index");	
	}
	
	public function page($_id = 0){	
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		if(S('type_list') == true){
			$_type_list = type_list(S('type_list'),0);
		}else{
			$_type_list = $this->_arctype->where("ranks in (1,2,3)")->Field('id,typename,reid,topid,typedir,ranks,picname')->select();
			S('type_list',$_type_list);			
		}
		
		$_scriptures = $this->_archives->where("flag like '%c%' and typeid in (54175,54174)")->Field('id,title,litpic')->limit('8')->select();
				
		$_data['list'] = $this->_m->query("select a.*,d.body,t.typename,t.typedir,t.reid,t.topid,t.ranks from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id left join {$_DB_PREFIX}guide d on d.aid = a.id where a.id = {$_id} and d.aid = {$_id} limit 0,1;");
		
		if(count($_data['list']) > 0){
			$_data['list'] = $_data['list'][0];
			
			if($_data['list']['ranks'] == 3){
				$_data['position'] = $this->_m->query("select t1.typename,t2.typename p_typename,t2.typedir from {$_DB_PREFIX}arctype t1 left join {$_DB_PREFIX}arctype t2 on t1.reid = t2.id where t1.id = {$_data['list']['typeid2']}");
				if($_data['position'] != null){
					$_data['position'] = $_data['position'][0];
				}				
				$_data['hot_list'] = R('City/getListCity',array($_data['list']['typeid2'],false,'limit 8'));//热门酒店 
				$_data['explain'] = $this->_archives->where("flag like '%g%' and typeid2 in ({$_data['list']['typeid2']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				$_data['scene'] = $this->_archives->where("flag like '%b%' and typeid2 in ({$_data['list']['typeid2']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				
			}else{
				$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
				a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
				a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
				{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ((select id from {$_DB_PREFIX}arctype where reid = {$_data['list']['typeid2']})) order by a2.pubdate desc limit 0,8";
				$_data['hot_list'] = $this->_m->query($_sql);
				$_data['explain'] = $this->_archives->where("flag like '%g%' and typeid2 in ({$_data['list']['typeid2']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				$_data['scene'] = $this->_archives->where("flag like '%b%' and typeid2 in ({$_data['list']['typeid2']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();				
			}
			
		}
		
		$_data['headline_pubdate'] = $this->_m->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id and a.channel !='2' where a.typeid2 in({$_data['list']['typeid2']}) and t.typename is not null order by a.pubdate desc limit 10;");
		$_limit = 10 - count($_data['headline_pubdate']);
		if($_limit > 0){
			$_data['headline_pubdate_news'] = $this->_m->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in(54175,54174) and t.typename is not null order by a.pubdate desc limit {$_limit};");
			$_data['headline_pubdate'] = array_merge($_data['headline_pubdate'],$_data['headline_pubdate_news']);			
		}
		
		$_data['pre'] = $this->_m->query("select a.* from {$_DB_PREFIX}archives a where a.id > {$_id} and a.typeid2 = {$_data['list']['typeid2']}  limit 1;");
		
		$_data['next'] = $this->_m->query("select a.* from {$_DB_PREFIX}archives a where a.id < {$_id} and a.typeid2 = {$_data['list']['typeid2']} limit 1;");
		
		if($_data['next'] != null) $_data['next'] = $_data['next'][0];

		if($_data['pre'] != null) $_data['pre'] = $_data['pre'][0];
		
		
		
		$_data['new_list'] = $this->_m->query("select a.title,a.id from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id left join {$_DB_PREFIX}guide d on d.aid = a.id where a.typeid2 = '{$_data['list']['typeid2']}' and a.id != '{$_data['list']['id']}' order by a.pubdate desc limit 0,10;");
		
		$this->assign('type_list',$_type_list);		
		$this->assign('data',$_data);	
		$this->assign('scriptures',$_scriptures);	
		$this->display("guide/page");
		//dump($_data['headline_pubdate']);	
	}
	
	
	public function city_index($_typedir = ""){	
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			//$_data['list'] = $this->_archives->where("typeid in (54175,54174)")->order("click desc")->limit("10")->select();
		$_data['obj'] = $this->_arctype->where("typedir = '$_typedir'")->find();	
		$_data['count'] = $this->_m->query("select count(*) count from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_data['obj']['id']}) and a.typeid2 != 0 and channel !='2'");
		
		if($_data['count'] != null){
			$_data['count'] = intval($_data['count'][0]['count']);
		}
		$_scriptures = $this->_archives->where("typeid2 in ({$_data['obj']['id']}) and channel !='2'")->Field('id,title,litpic,shorttitle')->order("pubdate desc")->limit('10')->select();
		if(empty($_POST) && $_POST == null){	
			$_data['list'] = $this->_m->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_data['obj']['id']}) and a.typeid2 != 0 and a.channel !='2' order by a.click desc limit 0,10");	
			if($_data['obj']['ranks'] == 3){
				$_data['hot_list'] = R('City/getListCity',array($_data['obj']['id'],false,'limit 10'));//热门酒店	
				$_data['explain'] = $this->_archives->where("flag like '%g%' and typeid2 in ({$_data['obj']['id']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				$_data['scene'] = $this->_archives->where("flag like '%b%' and typeid2 in ({$_data['obj']['id']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				$_data['city_list'] = '';
				$_data['auto'] = $this->_archives->where("flag like '%f%' and typeid2 in ({$_data['obj']['id']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('5')->select();
				//$_data['scenic'] = $this->_m->query("select u.aid,u.arcid,u.title,u.url,a.typeid2,a.title tit from {$_DB_PREFIX}uploads u left join {$_DB_PREFIX}archives a on u.arcid = a.id where a.typeid2='{$_data['obj']['id']}' and a.channel='2' and mediatype = 0 order by a.pubdate desc;");
				
			}else{
				$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
				a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
				a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
				{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ((select id from {$_DB_PREFIX}arctype where reid = {$_data['obj']['id']})) order by a2.pubdate desc limit 0,10";				
				$_data['hot_list'] = $this->_m->query($_sql);
				$_data['city_list'] = $this->_arctype->where("reid = '{$_data['obj']['id']}'")->select();	
				$_data['explain'] = $this->_archives->where("flag like '%g%' and typeid2 in ({$_data['obj']['id']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				$_data['scene'] = $this->_archives->where("flag like '%b%' and typeid2 in ({$_data['obj']['id']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('1')->find();
				$_data['auto'] = $this->_archives->where("flag like '%f%' and typeid2 in ({$_data['obj']['id']})")->Field('id,title,litpic,shorttitle,flag')->order("pubdate desc")->limit('5')->select();
			}
			$_data['scenic'] = $this->_m->query("SELECT
						i.aid,
						i.typeid,
						i.imgurls,
						a.id,
						a.typeid2,
						u.url,
						u.title,
						u.arcid,
						u.aid
						FROM
						{$_DB_PREFIX}addonimages i,
						{$_DB_PREFIX}archives a,
						{$_DB_PREFIX}uploads u where i.aid = a.id and u.arcid = a.id and a.typeid2={$_data['obj']['id']} and a.channel='2' group by i.imgurls;");
			$_img_count = count($_data['scenic']);
			if($_img_count > 0){
				$_img_list = "";
				foreach($_data['scenic'] as $imgv){
					$_img_list .= $imgv['imgurls'];
				}
			}
			$_img_list = preg_replace("/(\{dede:pagestyle(.*)?\/\})(.*)/","$3",$_img_list);
			$_img_list = explode("{/dede:img}",$_img_list);
			$_img_lists = array();
			foreach($_img_list as $key=>$val){
				if(trim($val) != ""){				
					$_img_lists[$key]['title'] = trim(preg_replace("/(.*)text=\'(.*)?\'\s(.*)?(width=\'\d+\'\sheight=\'\d+\'\})(.*)/","$2",$val));
					$_img_lists[$key]['url'] = trim(preg_replace("/(.*)text=\'(.*)?\'\s(.*)?(width=\'\d+\'\sheight=\'\d+\'\})(.*)/","$5",$val));
				}
			}
			if(!empty($_img_lists)){
				$this->assign('img_lists',$_img_lists);	
				//dump($_img_lists);
			}
			$_data['country_list'] = $this->_arctype->where("topid = '{$_data['obj']['topid']}' and ranks = 2")->select();
			$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数			
			$this->assign('data',$_data);	
			$this->assign('scriptures',$_scriptures);	
			$this->display("guide/city_index");			
		}else{
			$_order = $_POST['order'];
			if(preg_match('/^click|pubdate$/',$_order)){
				$_data['page'] = intval($_POST['page']);
				if($_data['page'] <= 0) $_data['page'] = 1;
 				$_skip = ($_data['page'] - 1) * C('PAGE_SIZE');
 				//$_limit = 'limit '.$_skip.','.C('PAGE_SIZE');
 				$_limit = 'limit '.$_skip.','.C('PAGE_SIZE');
				$_data['list'] = $this->_m->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_data['obj']['id']}) and a.channel !='2' and  a.typeid2 != 0 order by a.{$_order} desc {$_limit}");	
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				echo json_encode($_data);
			}else{
				exit(0);
			}			
		}
		
		
	}
	
	public function city_list($_typedir = ""){
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			//$_data['list'] = $this->_archives->where("typeid in (54175,54174)")->order("click desc")->limit("10")->select();
		$_data['obj'] = $this->_arctype->where("typedir = '$_typedir'")->find();	
		$_data['count'] = $this->_m->query("select count(*) count from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_data['obj']['id']}) and a.typeid2 != 0 and a.channel !='2'");
		
		if($_data['count'] != null){
			$_data['count'] = intval($_data['count'][0]['count']);
		}
		$_scriptures = $this->_archives->where("typeid2 in ({$_data['obj']['id']}) and channel !='2' ")->Field('id,title,litpic,shorttitle')->order("pubdate desc")->limit('10')->select();
		if(empty($_POST) && $_POST == null){			
			//$_data['headline_pubdate'] = $this->_m->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in(54175,54174) and t.typename is not null order by a.pubdate desc limit 10;");
			$_data['list'] = $this->_m->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_data['obj']['id']}) and a.typeid2 != 0 and a.channel !='2' order by a.click desc limit 0,10");	
			if($_data['obj']['ranks'] == 3){
				$_data['hot_list'] = R('City/getListCity',array($_data['obj']['id'],false,'limit 8'));//热门酒店 				
			}else{
				$_sql = "select a1.aid,a1.typeid,a1.body,a1.templet,a1.userip,a1.en_title,
				a1.stars,a1.map_x,a1.map_y,a1.price,a1.linkurl,a1.grade,a1.numbers,a1.infos,a1.map_x,a1.map_y,
				a1.address,a2.title,a2.litpic,a2.description from {$_DB_PREFIX}addonarticle a1 left join
				{$_DB_PREFIX}archives a2 on a1.typeid=a2.typeid and a1.aid=a2.id where a1.typeid in ((select id from {$_DB_PREFIX}arctype where reid = {$_data['obj']['id']})) order by a2.pubdate desc limit 0,8";
				$_data['hot_list'] = $this->_m->query($_sql);
			}
			$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数			
			$this->assign('data',$_data);	
			$this->assign('scriptures',$_scriptures);	
			$this->display("guide/city_list");			
		}else{
			$_order = $_POST['order'];
			if(preg_match('/^click|pubdate$/',$_order)){
				$_data['page'] = intval($_POST['page']);
				if($_data['page'] <= 0) $_data['page'] = 1;
 				$_skip = ($_data['page'] - 1) * 1;
 				$_limit = 'limit '.$_skip.','.C('PAGE_SIZE');
				$_data['list'] = $this->_m->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid2 in({$_data['obj']['id']}) and a.typeid2 != 0 and a.channel !='2' order by a.{$_order} desc {$_limit}");	
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				echo json_encode($_data);
			}else{
				exit(0);
			}			
		}
			
	}
	
	public function list_page($_typedir = ""){
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
			//$_data['list'] = $this->_archives->where("typeid in (54175,54174)")->order("click desc")->limit("10")->select();
		$_data['count'] = $this->_m->query("select count(*) count from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid in(54175,54174) and a.typeid2 != 0");
		$_scriptures = $this->_archives->where("flag like '%c%' and typeid in (54175,54174) and channel !='2'")->Field('id,title,litpic,shorttitle')->order("pubdate desc")->limit('10')->select();
		if($_data['count'] != null){
			$_data['count'] = intval($_data['count'][0]['count']);
		}
		if(empty($_POST) && $_POST == null){			
			//$_data['headline_pubdate'] = $this->_m->query("select a.id,a.title,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on a.typeid2 = t.id where a.typeid in(54175,54174) and t.typename is not null order by a.pubdate desc limit 10;");
			$_data['list'] = $this->_m->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid in(54175,54174) and a.typeid2 != 0 and a.channel !='2' order by a.click desc limit 0,10");	
			if(S('type_list') == true){
				$_type_list = type_list(S('type_list'),0);
			}else{
				$_type_list = $this->_arctype->where("ranks in (1,2,3)")->Field('id,typename,reid,topid,typedir,ranks,picname')->select();
				S('type_list',$_type_list);			
			}
			$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数	
			$this->assign('type_list',$_type_list);	
			$this->assign('data',$_data);	
			$this->assign('scriptures',$_scriptures);	
			$this->display("guide/list_guide");	
		}else{
			$_order = $_POST['order'];
			if(preg_match('/^click|pubdate$/',$_order)){
				$_data['page'] = intval($_POST['page']);
				if($_data['page'] <= 0) $_data['page'] = 1;
 				$_skip = ($_data['page'] - 1) * C('PAGE_SIZE');
 				$_limit = 'limit '.$_skip.','.C('PAGE_SIZE');
				$_data['list'] = $this->_m->query("select a.*,t.typename,t.typedir from {$_DB_PREFIX}archives a left join {$_DB_PREFIX}arctype t on t.id = a.typeid2 where a.typeid in(54175,54174) and a.typeid2 != 0 and a.channel !='2' order by a.{$_order} desc {$_limit}");
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				echo json_encode($_data);
			}else{
				exit(0);
			}
			
		}
			
	}
	
}