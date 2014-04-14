<?php 
class GuideAction extends BaseAction{
	
	private $_arctype = null;
	private $_archives = null;
	private $_guide = null;
	
	protected function _initialize(){
		parent::_initialize();
		$this->_arctype = D('Arctype');
 		$this->_archives = D('Archives');
 		$this->_guide = D('Guide');
	}
	
	/**
	 * 说明：攻略首页
	*/
	public function index(){	
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀			
		$_type_list = $this->_arctype->getTypeList();//获得导航列表
		$_data['scriptures'] = $this->_archives->getTypeAttribute('c',8);//获得8推荐记录		
		$_data['auto'] = $this->_archives->getTypeAttribute('f',4);//获得4幻灯记录		
		$_data['headline'] = $this->_archives->getTypeAttribute('h',3);//获得特荐记录		
		$_data['headline_one'] = $this->_archives->getTypeAttribute('a',"1");//获得1头条记录
		if(!empty($_data['headline_one'])) $_data['headline_one'] = $_data['headline_one'][0];
		$_data['headline_pubdate'] = $this->_archives->getGuideList('pubdate',10);//获得10最新记录		
		$_data['headline_click'] = $this->_archives->getGuideList('click',8);//获得8条点击最高记录		
		$_data['hotel_click'] = $this->_archives->getGuideHotelList('pubdate',9);//获得9条酒店最新记录		
		$_data['hotel_pubdate'] = $this->_archives->getGuideHotelList('click',9);//获得9条酒店最新记录			
		$_data['hotel_hot'] = $this->_archives->getGuideHotelAttribute('c',3,'pubdate');//获得3条酒店推荐最新记录	
		$this->assign('type_list',$_type_list);	
		$this->assign('data',$_data);	
		$this->display("guide/index");
	}
	
	public function page($_id = 0){	
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀					
		$_data['list'] = $this->_guide->getGuideOne($_id);		
		if(count($_data['list']) > 0){
			if($_data['list']['ranks'] == 3){
				$_data['position'] = $this->_guide->getGuidePosition($_data['list']['typeid2']);           
				$_data['hot_list'] = $this->_archives->getCityList($_data['list']['typeid2'],false,'limit 8');
			}else{
				$_data['hot_list'] = $this->_guide->getGuideHotList($_data['list']['typeid2'],8);
			}
            $_data['explain'] = $this->_archives->getCityIndexAttribute($_data['list']['typeid2'],'g',1);
			$_data['scene'] = $this->_archives->getCityIndexAttribute($_data['list']['typeid2'],'d',1);
		}
		$_data['headline_pubdate'] = $this->_guide->getGuideHeadlinePubdate($_data['list']['typeid2']);		
		$_data['pre'] = $this->_guide->getGuidePageNext($_id,$_data['list']['typeid2'],'>');		
		$_data['next'] =$this->_guide->getGuidePageNext($_id,$_data['list']['typeid2'],'<');		
		$_data['new_list'] = $this->_guide->getGuideHotNewList($_data['list']['typeid2'],10);			
		$this->assign('data',$_data);		
		$this->display("guide/page");
	}
	
	
	public function city_index($_typedir = ""){	
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_data['obj'] = $this->_arctype->getOne($_typedir);
		$_data['count'] = $this->_guide->getGuideCityIndexPageCount($_data['obj']['id']);
		$_scriptures = $this->_guide->getGuideHotNewList($_data['obj']['id'],10);
		if(empty($_POST) && $_POST == null){	
			$_data['list'] = $this->_guide->getGuideCityList($_data['obj']['id'],10,'click');	
			if($_data['obj']['ranks'] == 3){
				$_data['hot_list'] = $this->_archives->getCityList($_data['obj']['id'],false,'limit 8');//热门酒店 
				$_data['explain'] = $this->_archives->getCityIndexAttribute($_data['obj']['id'],'g',1);
				$_data['scene'] = $this->_archives->getCityIndexAttribute($_data['obj']['id'],'d',1);
				$_data['auto'] = $this->_archives->getCityIndexAttribute($_data['obj']['id'],'f',5);			
			}else{				
				$_data['hot_list'] = $this->_guide->getGuideHotList($_data['obj']['id'],8); 
				$_data['city_list'] = $this->_arctype->getCityIndexList($_data['obj']['id']);	
				$_data['explain'] = $this->_archives->getCityIndexAttribute($_data['obj']['id'],'g',1);
				$_data['scene'] = $this->_archives->getCityIndexAttribute($_data['obj']['id'],'d',1);
				$_data['auto'] = $this->_archives->getCityIndexAttribute($_data['obj']['id'],'f',5);
			}
			$_data['scenic'] = $this->_archives->getGuideCityIndexScenic($_data['obj']['id']);
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
			}
			$_data['country_list'] = $this->_arctype->getCountryList($_data['obj']['topid']);
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
 				$_limit = $_skip.','.C('PAGE_SIZE');
				$_data['list'] = $this->_guide->getGuideCityList($_data['obj']['id'],$_limit,$_order);	
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				echo json_encode($_data);
			}else{
				exit(0);
			}			
		}
		
		
	}
	
	public function city_list($_typedir = ""){
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_data['obj'] = $this->_arctype->getOne($_typedir);	
		$_data['count'] = $this->_guide->getGuideCityListPageCount($_data['obj']['id']);
		$_scriptures = $this->_guide->getGuideHotNewList($_data['obj']['id'],10);	
		if(empty($_POST) && $_POST == null){			
			$_data['list'] = $this->_guide->getGuideCityList($_data['obj']['id'],10,'click');	
			if($_data['obj']['ranks'] == 3){
				$_data['hot_list'] = $this->_archives->getCityList($_data['obj']['id'],false,'limit 8');//热门酒店                
			}else{
				$_data['hot_list'] = $this->_guide->getGuideHotList($_data['obj']['id'],8); 
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
 				$_limit = $_skip.','.C('PAGE_SIZE');
				$_data['list'] = $this->_guide->getGuideCityPageList($_data['obj']['id'],$_limit,$_order);                
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				echo json_encode($_data);
			}else{
				exit(0);
			}			
		}
			
	}
	
	public function list_page($_typedir = ""){
		$_DB_PREFIX = C('DB_PREFIX');//取得表前缀
		$_data['count'] = $this->_guide->getGuideListPageCount();
		$_scriptures = $this->_archives->getGuideRightListPages(10,"pubdate");//获得1头条记录
		if(empty($_POST) && $_POST == null){			
			$_data['list'] = $this->_guide->getGuideListPages(10,'click');	
			$_type_list = $this->_arctype->getTypeList();//获得导航列表
            $_type_list = type_list($_type_list,0);
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
 				$_limit = $_skip.','.C('PAGE_SIZE');
				$_data['list'] = $this->_guide->getGuideListPages($_limit,$_order);
				$_data['total'] = intval(ceil($_data['count']/C("PAGE_SIZE")));     //总页数
				echo json_encode($_data);
			}else{
				exit(0);
			}			
		}
	}
	
}