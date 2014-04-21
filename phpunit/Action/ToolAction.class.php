<?php 
class ToolAction{
	
	
	
	public function getDate_one(){		
		$start_name = $_GET['start_name'];
		if(preg_match('/^[\d\-]+$/',$start_name)){
			echo date('Y-m-d', strtotime ("+1 day", strtotime($start_name)));
		}else{
			exit("");
		}		
	}
	
	public function getWeatherid($_id = 0){
		$_data = array();
		$_data['weatherid'] = intval($_id);
		$url = "http://weather.yahooapis.com/forecastrss?w={$_data['weatherid']}&u=c";
		$yweather = "http://xml.weather.yahoo.com/ns/rss/1.0";  //命名空间
		$res = new DOMDocument();
		$res->load($url);				
		$node = $res->getElementsByTagNameNS($yweather, 'atmosphere');
		if($node->length >= 1){
			$humi = $node->item(0)->attributes->item(0)->nodeValue;     //获取湿度08
			$node = $res->getElementsByTagNameNS($yweather, 'forecast');
			$_data['low'] = $node->item(0)->attributes->item(2)->nodeValue;     //获取天气代码
			$_data['high'] = $node->item(0)->attributes->item(3)->nodeValue;     //获取温度
			$description = $res->getElementsByTagName('description');			
			$_data['wdescription'] = $description->item(1)->nodeValue;     //获取温度
			preg_match_all("/src\=\"(.*)\"\/>/",$_data['wdescription'],$arr);
			$_data['w_pic'] = $arr[1][0];
		}
		return $_data;
	}
	
	public function getMapList($_citylist){
		$_maps = array();
		foreach($_citylist as $k=>$v){
			$_maps[$k]['lat'] =  $v['map_y'];
			$_maps[$k]['lon'] =  $v['map_x'];
			$_maps[$k]['title'] =  $v['title'];
			$_maps[$k]['html'] =  "{$v['title']}-￥{$v['price']}";
			$_maps[$k]['icon'] =  '/static/images/hc-mapPointer.png';
			$_maps[$k]['zoom'] =  16;
		}
		$_maps = json_encode($_maps);
		return $_maps;
	}
}