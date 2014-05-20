<?php
// 开启调试模式
define ( 'APP_DEBUG', false);
define ( 'SITE_PATH', getcwd () );
define ( 'APP_NAME', 'NC_CMS' );
define ( 'APP_PATH', SITE_PATH . '/lmz/' );
define ( 'TMPL_PATH', APP_PATH . 'Tpl_HT/' );
define ( "RUNTIME_PATH", SITE_PATH . "/#runtime/" );

require APP_PATH . 'Core/ThinkPHP/ThinkPHP.php';
