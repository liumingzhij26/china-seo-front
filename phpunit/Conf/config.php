<?php
session_start();
//错误级别
error_reporting(E_ALL);
//创建一个实际路径
define('ROOT_PATH',substr(dirname(__FILE__),0,-5));
//设置编码
header('Content-Type:text/html;charset=utf-8');
//设置时区
date_default_timezone_set('Asia/Shanghai');
//引入系统配置文件
@spl_autoload_register('__autoload');
//自动加载类
function __autoload($_className) {
	if (substr($_className, -6) == 'Action') {
		require ROOT_PATH.'/Action/'.$_className.'.class.php';
	} elseif (substr($_className, -5) == 'Model') {
		require ROOT_PATH.'/Model/'.$_className.'.class.php';
	} else {
		require ROOT_PATH.'/Conf/'.$_className.'.class.php';
	}
	echo $_className.'.class.php';
}
?>