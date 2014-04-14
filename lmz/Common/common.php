<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

/**
 * Think 基础函数库
 * @category   Think
 * @package  Common
 * @author   liu21st <liu21st@gmail.com>
 */

function type_list($arr,$IDs = 3,$lev = 1){
	$sons = array();
	foreach($arr as $k => $v){		
		if($arr[$k]['reid'] == $IDs)
		{
			$v['lev'] = $lev;
			$sons[] = $v;	
			$sons = array_merge($sons,type_list($arr,$arr[$k]['id'],$lev+1));
		}
	}
	return $sons;
}

function add_slashes($string) {    
	if (is_array($string)){    
		foreach ($string as $key => $value) {    
			$string[$key] = add_slashes($value);    
		}    
	}else{    
		$string = addslashes($string);    
	}  
	return $string;    
}  

//编码
function htmlencode($str) {     
      if(empty($str)) return;
      if($str=="") return $str;      
      $str=trim($str);
      $str=str_replace("&amp;","&amp;amp;",$str);
      $str=str_replace("&gt;","&amp;gt;",$str);
      $str=str_replace("&lt;","&amp;lt;",$str);
      $str=str_replace(chr(32),"&amp;nbsp;",$str);
      $str=str_replace(chr(9),"&amp;nbsp;",$str);
      $str=str_replace(chr(34),"&amp;",$str);
      $str=str_replace(chr(39),"&amp;#39;",$str);
      $str=str_replace(chr(13),"&lt;br /&gt;",$str);
      $str=str_replace("'","''",$str);
      $str=str_replace("select","sel&amp;#101;ct",$str);
      $str=str_replace("join","jo&amp;#105;n",$str);
      $str=str_replace("union","un&amp;#105;on",$str);
      $str=str_replace("where","wh&amp;#101;re",$str);
      $str=str_replace("insert","ins&amp;#101;rt",$str);
      $str=str_replace("delete","del&amp;#101;te",$str);
      $str=str_replace("update","up&amp;#100;ate",$str);
      $str=str_replace("like","lik&amp;#101;",$str);
      $str=str_replace("drop","dro&amp;#112;",$str);
      $str=str_replace("create","cr&amp;#101;ate",$str);
      $str=str_replace("modify","mod&amp;#105;fy",$str);
      $str=str_replace("rename","ren&amp;#097;me",$str);
      $str=str_replace("alter","alt&amp;#101;r",$str);
      $str=str_replace("cast","ca&amp;#115;",$str);      
      return $str; 
}
//解码
function htmldecode($str) {     
      if(empty($str)) return;
      if($str=="")  return $str;
      $str=str_replace("sel&amp;#101;ct","select",$str);
      $str=str_replace("jo&amp;#105;n","join",$str);
      $str=str_replace("un&amp;#105;on","union",$str);
      $str=str_replace("wh&amp;#101;re","where",$str);
      $str=str_replace("ins&amp;#101;rt","insert",$str);
      $str=str_replace("del&amp;#101;te","delete",$str);
      $str=str_replace("up&amp;#100;ate","update",$str);
      $str=str_replace("lik&amp;#101;","like",$str);
      $str=str_replace("dro&amp;#112;","drop",$str);
      $str=str_replace("cr&amp;#101;ate","create",$str);
      $str=str_replace("mod&amp;#105;fy","modify",$str);
      $str=str_replace("ren&amp;#097;me","rename",$str);
      $str=str_replace("alt&amp;#101;r","alter",$str);
      $str=str_replace("ca&amp;#115;","cast",$str);
      $str=str_replace("&amp;amp;","&amp;",$str);
      $str=str_replace("&amp;gt;","&gt;",$str);
      $str=str_replace("&amp;lt;","&lt;",$str);
      $str=str_replace("&amp;nbsp;",chr(32),$str);
      $str=str_replace("&amp;nbsp;",chr(9),$str);
      $str=str_replace("&amp;",chr(34),$str);
      $str=str_replace("&amp;#39;",chr(39),$str);
      $str=str_replace("&lt;br /&gt;",chr(13),$str);
      $str=str_replace("''","'",$str);      
      return $str;
}

function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true)
{
	if(function_exists("mb_substr")){
		if ($suffix && strlen($str)>$length)
			return mb_substr($str, $start, $length, $charset)."...";
		else
			return mb_substr($str, $start, $length, $charset);
	}
	elseif(function_exists('iconv_substr')) {
		if ($suffix && strlen($str)>$length)
			return iconv_substr($str,$start,$length,$charset)."...";
		else
			return iconv_substr($str,$start,$length,$charset);
	}
	$re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
	$re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
	$re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
	$re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
	preg_match_all($re[$charset], $str, $match);
	$slice = join("",array_slice($match[0], $start, $length));
	if($suffix) return $slice."…";
	return $slice;
}