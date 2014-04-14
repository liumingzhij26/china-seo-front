<?php
return array(
		/* 项目设定 */
		'SHOW_PAGE_TRACE' => false,//调试信息
		//'APP_STATUS' => 'debug', // 应用调试模式状态 调试模式开启后有效 默认为debug 可扩展 并自动加载对应的配置文件
		'APP_FILE_CASE' => true, // 是否检查文件的大小写 对Windows平台有效
		'APP_TAGS_ON' => true, // 系统标签扩展开关
		'url_model' => '2', // URL模式,
		'URL_CASE_INSENSITIVE' =>true,//URL访问不再区分大小写
		//'URL_PATHINFO_DEPR' => '-',
		'URL_ROUTER_ON'   => true, //开启路由
		'URL_ROUTE_RULES' => array( //定义路由规则
				'/^city\/(\w+)$/'        => 'city/index?name=:1',	
				'/^h\/([\w\-\s\_]+)$/'        => 'h/index?name=:1',	
		),
		'DATA_CACHE_TYPE' => 'Memcache',
		'MEMCACHE_HOST' => 'tcp://127.0.0.1:11211',
        'DB_SQL_BUILD_CACHE' => true,//开启SQL解析缓存
        'DB_SQL_BUILD_QUEUE' => 'apc',//支持xcache和apc方式缓存
		'DEFAULT_FILTER'=>'htmlspecialchars,strip_tags',
        'DB_SQL_BUILD_LENGTH' => 20, // SQL缓存的队列长度
        'DATA_CACHE_TIME' => 3600,  //数据缓存有效期3600秒，0为永久
		'LOG_RECORD' => false, //开启日志记录
		/* SESSION相关设置 */
		'SESSION_AUTO_START' => true, // 开启会话
		'SESSION_TYPE' => '', // session hander类型 默认无需设置 除非扩展了session hander驱动
		//'VAR_SESSION_ID' => 'session_id', // sessionID的提交变量
		/* 默认设定 */
		'DEFAULT_APP' => '@', // 默认项目名称，@表示当前项目
		'DEFAULT_MODULE' => 'Index', // 默认模块名称
		'DEFAULT_ACTION' => 'index', // 默认操作名称
		'DEFAULT_CHARSET' => 'utf-8', // 默认输出编码
		/* 语言时区设置 */
		'TIME_ZONE'  => 'PRC',           // 默认时区
		'LANG_SWITCH_ON' => false,   // 默认关闭多语言包功能
		'DEFAULT_LANGUAGE' => 'zh-cn',         // 默认语言
		'AUTO_DETECT_LANG' => false,     // 自动侦测语言
		/* 模板引擎设置 */
		'TMPL_FILE_DEPR' => '/',
		"DEFAULT_THEME" => "", // 默认的模板主题名
		"TMPL_STRIP_SPACE" => false, // 是否去除模板文件里面的html空格与换行
		'TMPL_TEMPLATE_SUFFIX' => '.php',  // 模板后缀
		/* 数据库配置 */
		'DB_TYPE' => 'mysql',
		'DB_HOST' => '127.0.0.1',
		'DB_NAME' => 'ht_cn',
		'DB_USER' => 'root',
		'DB_PWD' => '123456',
		'DB_PORT' => '3306',
		'DB_PREFIX' => 'dede_',
		'TMPL_PARSE_STRING'  =>array(
				'__static__' => '/static', // 更改默认的__PUBLIC__ 替换规则			
				'__HT__' => '/h', // 更改默认的__PUBLIC__ 替换规则			
		),	
		'PAGE_SIZE' => 10,
		'GET_SQL_CONDITION' => array("page","typeid","order"),
);

?>