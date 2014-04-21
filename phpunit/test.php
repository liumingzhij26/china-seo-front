<?php
require dirname(__FILE__)."/Conf/config.php";
class TestHAction extends Base{
	
	public function setUp(){
		parent::__construct();
		//$_data = $this->_db->query("select typename from dede_arctype")->fetchAll();		
	}
	
	public function testTypeAction () {  
		$_name = $this->getTypeIs('Beijing');//为URL
		$_guide = $this->getTypeIs('guide-list');//为URL
		$this->assertEquals($_name,"beijing",'error : '.$_name);
		$this->assertNull($_guide,'error : '.$_guide);
		echo time();
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
}

?>