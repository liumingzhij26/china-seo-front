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
	
	$_city_list = $database->select("dede_arctype",array("*"),array("ranks"=>3));
	
	
	$_vals = "";
	$i=0;
	foreach($_city_list as $v){	
		echo $i."<br/>";
		$_values = str_replace('-city','',$v['typedir']);
		//ex_query($_values,'CNY');//CNY
		ex_query($v['typedir'],'USD');//USD
		//$_get_data_zh = get_curl($v['typedir'],'zh_CN');//en_AU  zh_CN
		$i++;
		//$_vals .= "'{$v['typedir']}',";
	}
	//echo $_vals;
	function ex_query($_city_name = '',$_price_type = ''){
	global $database;
	
	$_get_data_zh = get_curl($_city_name,'en_AU',$_price_type);//zh_CN  zh_CN
	if($_get_data_zh == null){
		continue;
	}
	
	phpQuery::newDocumentFile("{$_get_data_zh['filename']}");
	//phpQuery::$documents = array();解决内存多的问题
	$_Location = pq('HotelShoppingResponse > Location');	//城市节点
	$_Hotels = pq('HotelShoppingResponse > Hotels');		//酒店列表属性
	$_Hotel = pq('HotelShoppingResponse > Hotels > Hotel');	//单个酒店
	
	/*--------------------------为城市的基础数据-Start-------------------------------*/
	$_Location_data['id'] = $_Location->find('Id')->html();	
	$_Location_data['name'] = $_Location->find('Name')->html();	
	$_Location_data['type'] = $_Location->find('Type')->attr("code");	
	$_Location_data['cityName'] = $_Location->find('CityName')->html();	
	$_Location_data['country'] = $_Location->find('Country')->html();	
	$_Location_data['country_code'] = $_Location->find('Country')->attr("code");	
	/*--------------------------为城市的基础数据-End-------------------------------*/
	
	
	/*--------------------------为酒店列表的数据-Start-------------------------------*/	
	$_Hotels_data['href'] = $_Hotels->attr('href');
	$_Hotels_data['count'] = $_Hotels->attr('count');
	/*--------------------------为酒店列表的数据-End-------------------------------*/
	dump($_get_data_zh);
	dump($_Location_data);
	dump($_Hotels_data);
	/*
	$_get_data_zh['name_en'] = str_replace("-"," ",$_get_data_zh['name']);
	
	$_sql = "INSERT INTO `dede_arctype` VALUES ('{$_Location_data['id']}', '1', '/uploads/131223/1-1312231521355D.jpg', '{$_get_data_zh['name_en']}', '54154', '4', '50', '{$_Location_data['name']}', '{$_get_data_zh['name']}', '-1', 'index.html', '1', '1', '-1', '0', '0', '{style}/index_article.htm', 'content/citypage', '{style}/article_article.htm', '{typedir}/{Y}/{M}{D}/{aid}.html', '{typedir}/list_{tid}_{page}.html', 'default', '', '', '', '0', 'North-America', '', '0', '0', '', '', '')";
	$_flag = $database->select("dede_arctype",array("id"),array("id"=>$_Location_data['id']));
	if(empty($_flag)){
		//$database->query($_sql);
		echo $_sql;
		echo "成功<br/>";		
	}
	*/
	$database->query("ALTER TABLE `dede_arctiny` CHANGE `id` `id` INT( 8 ) UNSIGNED NOT NULL");
	/*--------------------------为酒店的数据-Start-------------------------------*/
	foreach($_Hotel as $k=>$v){
		if($_Hotel->eq($k)->attr('name') != ""){
			$_data = array();
			$_data['name'] = $_Hotel->eq($k)->attr('name');
			$_data['id'] = $_Hotel->eq($k)->attr('id');
			$_data['chainCode'] = $_Hotel->eq($k)->attr('chainCode');
			$_data['starRating'] = $_Hotel->eq($k)->attr('starRating');
			$_data['phoneNumber'] = $_Hotel->eq($k)->attr('phoneNumber');
			$_data['Address_Street1'] = $_Hotel->eq($k)->find("Address")->find('Street1')->html();
			$_data['Address_City'] = $_Hotel->eq($k)->find("Address")->find('City')->html();
			$_data['Address_PostalCode'] = $_Hotel->eq($k)->find("Address")->find('PostalCode')->html();
			$_data['Address_Country'] = $_Hotel->eq($k)->find("Address")->find('Country')->html();
			$_data['TotalCostOfRooms'] = $_Hotel->eq($k)->find("TotalCostOfRooms")->html();
			$_data['TotalCostOfRooms_currency'] = $_Hotel->eq($k)->find("TotalCostOfRooms")->attr("currency");
			$_data['Rates_href'] = $_Hotel->eq($k)->find("Rates")->find('Rate')->attr('href');
			$_data['AverageNightlyRate'] = $_Hotel->eq($k)->find("Rates")->find('Rate')->find('AverageNightlyRate')->html();
			$_data['Rates_amount'] = $_Hotel->eq($k)->find("Rates")->find('Rate')->find('PromotionalInfo:eq(1)')->attr('amount');
			$_data['Rates_startDate'] = $_Hotel->eq($k)->find("Rates")->find('Rate')->find('PromotionalInfo:eq(1)')->attr('startDate');
			$_data['Rates_endDate'] = $_Hotel->eq($k)->find("Rates")->find('Rate')->find('PromotionalInfo:eq(1)')->attr('endDate');
			$_data['shortMarketingText'] = $_Hotel->eq($k)->find("Rates")->find('Rate')->find('PromotionalInfo:eq(1)')->attr('shortMarketingText');
			$_data['Description'] = $_Hotel->eq($k)->find("Content")->find('Description')->html();
			$_data['thumbnail'] = $_Hotel->eq($k)->find("Content")->find('Media[type="thumbnail"]')->html();
			$_data['Longitude'] = $_Hotel->eq($k)->find("Geocode")->find('Longitude')->html();
			$_data['Latitude'] = $_Hotel->eq($k)->find("Geocode")->find('Latitude')->html();
			$_data['NumberOfReviews'] = $_Hotel->eq($k)->find("UserReviews")->attr('NumberOfReviews');
			$_data['UserScore'] = $_Hotel->eq($k)->find("UserReviews")->attr('UserScore');
			$_data['Amenity'] = "";
			if(count($_Hotel->eq($k)->find("Content")->find('Amenities')) > 0){
                $_am_count = count($_Hotel->eq($k)->find("Content")->find('Amenities')->find('Amenity')).' : ';				
                foreach($_Hotel->eq($k)->find("Content")->find('Amenities')->find('Amenity') as $am_k=>$am_v){
					$_join = "";
					if($_am_count != ($am_k+1) ){
                       $_join = ','; 
                    }
					$_data['Amenity'] .= $_Hotel->eq($k)->find("Content")->find('Amenities')->find("Amenity:eq({$am_k})")->attr('code').$_join;
                }
				//echo $_data['Amenity'];
				//echo "<br/>";
			}
			$_pic = '/static/images/nopic.jpg';
			if($_data['thumbnail'] != null && $_data['thumbnail'] != ""){
				//$_pic = getDownFile($_data['thumbnail'],$_data['Address_City']);
				$_pic = $_data['thumbnail'];
			}
			$_data['time'] = time();
			$_data['click'] = rand(100,99999);			
			if($_data['starRating'] == 1){
				$_data['starRating'] = '★';
			}
			if($_data['starRating'] == 2){
				$_data['starRating'] = '★★';
			}
			if($_data['starRating'] == 3){
				$_data['starRating'] = '★★★';
			}
			if($_data['starRating'] == 4){
				$_data['starRating'] = '★★★★';
			}
			if($_data['starRating'] == 5){
				$_data['starRating'] = '★★★★★';
			}
			
			if($_data['starRating'] == ""){
				$_data['starRating'] = '★';
			}
			
			$_data['infos'] = preg_replace('/<\/b><br\s\/>(.*?)<\/p><p><b>.*/','$1',htmlspecialchars_decode($_data['Description']));
			$_data['infos'] = strip_tags(str_replace("位置","",$_data['infos']));
			
			$_data = array_map("get_addcslashes", $_data);


			$dede_arctiny = "INSERT INTO `dede_arctiny` VALUES ('{$_data['id']}', '{$_Location_data['id']}', '0', '0', '1', '{$_data['time']}', '{$_data['time']}', '1')";
			
			$dede_archives = "INSERT INTO `dede_archives` VALUES ('{$_data['id']}', '{$_Location_data['id']}', '0', '{$_data['time']}', 'p', '-1', '1', '0', '{$_data['click']}', '0', '{$_data['name']}', '', '', '管理员', '管理员', '{$_pic}', '{$_data['time']}', '{$_data['time']}', '1', '', '0', '0', '0', '0', '0', '0', '', '', '1', '0', '0', '2')";
			
			if($_price_type == 'CNY'){
				$dede_addonarticle = "INSERT INTO `dede_addonarticle` VALUES ('{$_data['id']}', '{$_Location_data['id']}', '{$_data['Description']}', '', '', '127.0.0.1', '', '{$_data['starRating']}', '{$_data['Longitude']}', '{$_data['Latitude']}', '{$_data['AverageNightlyRate']}', '{$_data['Rates_href']}', '{$_data['UserScore']}', '{$_data['NumberOfReviews']}', '{$_data['Address_Street1']}', '{$_data['infos']}', '1005','{$_data['Amenity']}','{$_data['chainCode']}','')";
			}else{
				$dede_addonarticle = "INSERT INTO `dede_addonarticle` VALUES ('{$_data['id']}', '{$_Location_data['id']}', '{$_data['Description']}', '', '', '127.0.0.1', '', '{$_data['starRating']}', '{$_data['Longitude']}', '{$_data['Latitude']}', '', '{$_data['Rates_href']}', '{$_data['UserScore']}', '{$_data['NumberOfReviews']}', '{$_data['Address_Street1']}', '{$_data['infos']}', '1005','{$_data['Amenity']}','{$_data['chainCode']}','{$_data['AverageNightlyRate']}')";
			}
			
			
			
			$_flag_1 = $database->select("dede_archives",array("id"),array("id"=>$_data['id']));
			$_flag_2 = $database->select("dede_arctiny",array("id"),array("id"=>$_data['id']));
			$_flag_3 = $database->select("dede_addonarticle",array("aid"),array("aid"=>$_data['id']));
			if(empty($_flag_1) && empty($_flag_2) && empty($_flag_3)){
				$database->query($dede_arctiny);
				$database->query($dede_archives);
				$database->query($dede_addonarticle);
				echo $k.' '.$_data['id'];
				echo '<br/>';
				echo $dede_arctiny;
				echo '<br/>';
				echo $dede_archives;
				echo '<br/>';
				echo $dede_addonarticle;
				echo "<hr/>";
			}else{
				$database->query("update dede_addonarticle set price_usd = '{$_data['AverageNightlyRate']}' where aid = {$_data['id']};");	
				echo "update dede_addonarticle set price_usd = '{$_data['AverageNightlyRate']}' where aid = {$_data['id']};";				
			}
		}
		
	}
	echo memory_get_usage() . "\n";
	/*--------------------------为酒店的数据-End-------------------------------*/
	
	$database->query("ALTER TABLE `dede_arctiny` CHANGE `id` `id` INT( 8 ) UNSIGNED NOT NULL AUTO_INCREMENT");
	$database->query("ALTER TABLE `dede_arctiny` AUTO_INCREMENT = 81112;");
	}