 <?php
	
	/**
     * User: lmz
     * Date: 14-01-07
     * Time: 上午10:42
     */
	header ( "Content-Type: text/html; charset=utf-8" );
	error_reporting (E_ALL);
	date_default_timezone_set ( "Asia/chongqing" );
	require "medoo.class.php";
	require 'curl.php';
	include 'phpQuery.php';
	$config = array (
			'server' => '127.0.0.1',
			'database_type' => 'mysql',
			'username' => 'root',
			'password' => '123456',
			'database_name' => 'ht_cn',
			'charset' => 'utf8' 
	);
	
	$database = new medoo ($config);
	
	//$_list ="'Hong-Kong-city','Phuket','Boracay','Venice','Bangkok','Samui','Chiang-Mai','Melbourne','Seoul','Pattaya','Los-Angeles','Langkawi','Hawaii-Hawaii-Big-Island','Sao-Paulo','San-Francisco','Berlin','Taoyuan','Milan','Sydney','Frankfurt','Rome','Nice','Manila','Busan','Cairns'";
	
	$_list = "'Sao-Paulo'";
	
	$_sql = "SELECT id,typedir,typename FROM dede_arctype WHERE typedir in({$_list});";

	$_sql_list = "SELECT s.name,s.id,s.cityid,t.typename from dede_scenic s left join dede_arctype t on s.cityid = t.id where cityid in((SELECT id FROM dede_arctype WHERE typedir in({$_list})))";
	
	echo $_sql_list;
	
	echo '<hr/>';
	
	$_data = $database->query($_sql_list)->fetchAll();
	//$_data = $database->query($_sql)->fetchAll();
	foreach($_data as $k=>$v){
		echo $v['id'].' = '.$v['cityid'].' = '.$v['name'].' = '.$v['typename'].'<br/>';
	}
	
	

	
	

	
	
	
	
	
	