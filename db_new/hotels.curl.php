<?php
/**
 *
 * @param 大洲名称  $_name
 * @param 语言 $_language    en_AU zh_CN
 * @param 最后时间 $_end_data
 */
function get_curl($_name = '', $_language = '' , $_Purchase = '')
{
	$ch = null;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://ws.orbitzworldwide.com/xml/service");
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 300); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // 对认证证书来源的检查
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_ENCODING , "gzip");
    curl_setopt(
        $ch, CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/xml',
            'Authorization: Basic VEVTVDpwYXNzd29yZA=='
        )
    );

    $_data = array();
    $_data['name']       = $_name;
    $_data['language']   = $_language;
    $_data['purchase']   = $_Purchase;
    $_data['start_date'] = date('Y-m-d', time());
    $_data['end_date']   = date('Y-m-d', strtotime("{$_data['start_date']} + 7 day"));
    $_data['result']     = '';

	//<LocationKeyword></LocationKeyword><PointOfSale>HAA</PointOfSale>
    $_xml_new = <<<_en
<?xml version="1.0" encoding="UTF-8"?>
<HotelShoppingRequest xmlns="http://ws.orbitz.com/schemas/2008/Hotel" xmlns:ns2="http://ws.orbitz.com/schemas/2008/Common">
    <PointOfSale>HCL</PointOfSale>
    <Locale>zh_CN</Locale>
    <PurchaseCurrency>CNY</PurchaseCurrency>
    <LocationId>{$_data['name']}</LocationId>
    <OccupantDetails>
        <Adult count="2"/>
        <Children count="0"/>
    </OccupantDetails>
    <NumberOfRooms>1</NumberOfRooms>
</HotelShoppingRequest>
_en;

    curl_setopt($ch, CURLOPT_POSTFIELDS, $_xml_new); // 提交数据
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 将curl_exec()获取的信息以文件流的形式返回，而不是直接输出。

    $_data['filename'] = "data/{$_data['name']}/{$_data['name']}_{$_data['language']}_{$_data['start_date']}.xml";
	if (file_exists("data\/{$_data['name']}")) {
        curl_close($ch);
        return $_data;
    }
    if (file_exists($_data['filename'])) {
        curl_close($ch);
        return $_data;
    }
	try{
		
		$response = curl_exec($ch);
		
	}catch(Exception $e){
		return null;
	}
    $_data['result'] = $response;
    curl_close($ch);

    if (!empty($_data['name']) && $_data['name'] != '') {
        if (!file_exists("data\/{$_data['name']}")) {
            @mkdir("data\/{$_data['name']}", 777);
        }
        if (!empty($_data['result']) && strlen($_data['result']) > 0) {
            $_sxe = new SimpleXMLElement($_data['result']);
            $_sxe->asXML($_data['filename']);            
        }

    }

    return $_data;
}

/**
 * 浏览器友好的变量输出
 * @param mixed $var 变量
 * @param boolean $echo 是否输出 默认为True 如果为false 则返回输出字符串
 * @param string $label 标签 默认为空
 * @param boolean $strict 是否严谨 默认为true
 * @return void|string
 */
function dump($var, $echo=true, $label=null, $strict=true) {
	$label = ($label === null) ? '' : rtrim($label) . ' ';
	if (!$strict) {
		if (ini_get('html_errors')) {
			$output = print_r($var, true);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		} else {
			$output = $label . print_r($var, true);
		}
	} else {
		ob_start();
		var_dump($var);
		$output = ob_get_clean();
		if (!extension_loaded('xdebug')) {
			$output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', $output);
			$output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
		}
	}
	if ($echo) {
		echo($output);
		return null;
	}else
		return $output;
}

function getDownFile($_url,$_name){
	try{
		$opts = array(
			'http'=>array(
			'method'=>'GET',
			'timeout'=>30 //设置超时，单位是秒，可以试0.1之类的float类型数字
			)
		);
		$context = stream_context_create($opts);
		$_getname = preg_replace('/.*\/([\w\.\-]+)$/','$1',$_url);
		$data = file_get_contents($_url,false,$context); //读文件内容 
		$filetime = time(); //得到时间戳
		$filepath = $_SERVER['DOCUMENT_ROOT'].'/uploads/'.$_name.'_'.date("Ymd",$filetime)."/";//图片保存的路径目录 
		if(!is_dir($filepath)){
			mkdir($filepath,0777, true);
		}
		$filename = date("Ymd",$filetime).$_getname; //生成文件名
		$fp = @fopen($filepath.$filename,"w"); //以写方式打开文件
		@fwrite($fp,$data); 
		fclose($fp);//完工，哈
		$_file = '/uploads/'.$_name.'_'.date("Ymd",$filetime)."/".$filename;
		return $_file;
	}catch(Exception $e){
		return "/static/images/nopic.jpg";
	}
}


function get_addcslashes($_str){
	return addcslashes($_str,"'");
} 

