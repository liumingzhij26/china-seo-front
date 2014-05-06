<?php
	
	/**
     * User: lmz
     * Date: 14-01-07
     * Time: 上午10:42
     */
	header ( "Content-Type: text/html; charset=utf-8" );
	error_reporting (E_ALL);
	set_time_limit(0);
	date_default_timezone_set ( "Asia/chongqing" );
	require "medoo.class.php";
	require 'hotels.curl.php';
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
	
	
	$_country_str = file_get_contents('country.txt');
	
	$_country_data = explode("\n", $_country_str);
	
	$_country_list = array();

	foreach ($_country_data as $kc=>$vc){
		if($_country_data[$kc] != ""){
			$_countrys = explode(",", $_country_data[$kc]);
			$_country_list[$kc]['id'] = $_countrys[0];
			$_country_list[$kc]['name'] = $_countrys[1];
		}
	}
	
	$_city_list = $database->select("dede_scenic",array("*"));	
	
	foreach($_city_list as $k=>$v){
		if($k < 1000000){
			echo $k.' = '.$v['id'].'<br/>';
			ex_query($v['id'],'CNY');//CNY
		}		
	}

	function ex_query($_city_name = '',$_price_type = ''){			
		$_get_data_zh = get_curl($_city_name,'zh_CN','CNY');//zh_CN  zh_CN
		dump($_get_data_zh);
		echo "<hr/>";
		if($_get_data_zh == null){
			continue;
		}
		echo memory_get_usage() . "\n";
	
	}