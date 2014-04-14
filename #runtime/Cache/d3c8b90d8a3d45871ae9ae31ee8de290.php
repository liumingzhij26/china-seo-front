<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>去<?php echo ($data["obj"]["typename"]); ?>旅游攻略2014,<?php echo ($data["obj"]["typename"]); ?>旅游攻略大全,<?php echo ($data["obj"]["typename"]); ?>自助游攻略-HotelClub</title>
<meta name="keywords" content="去<?php echo ($data["obj"]["typename"]); ?>旅游,旅游攻略2014,<?php echo ($data["obj"]["typename"]); ?>旅游攻略大全,<?php echo ($data["obj"]["typename"]); ?>自助游攻略,HotelClub"> 
<meta name="description" content="2014去<?php echo ($data["obj"]["typename"]); ?>旅游实用攻略,HotelClub提供全面的<?php echo ($data["obj"]["typename"]); ?>旅游攻略,包含<?php echo ($data["obj"]["typename"]); ?>热门景点介绍、<?php echo ($data["obj"]["typename"]); ?>美食、<?php echo ($data["obj"]["typename"]); ?>购物、<?php echo ($data["obj"]["typename"]); ?>旅游酒店推荐、<?php echo ($data["obj"]["typename"]); ?>旅游注意事项等。更多<?php echo ($data["obj"]["typename"]); ?>自助游攻略信息尽在HotelClub旅游攻略。">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=8,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="__static__/css/bootstrap.min.css">
<link rel="stylesheet" href="__static__/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="__static__/css/HotelClub-CSS1.css">
<link rel="stylesheet" href="__static__/css/guide_style.css">
<link rel="stylesheet" href="__static__/css/travel.css">
<link rel="stylesheet" type="text/css" href="__static__/css/elastislide.css" />
<link rel="stylesheet" type="text/css" href="__static__/css/custom.css" />
<!--引用百度地图API-->
<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
</head>
<body>
<div class="container">
	<div class="header">
    	<div class="logo">
        	<a href="http://www.hotelclub.com/"><img src="__static__/images/logo.png" alt="logo"></a>
        </div>
        <div class="pull-right">
        	<ul class="primary">
                <li><a href="https://www.hotelclub.com/account/login" target="_blank" class="link" rel="nofollow">登录</a></li>
                <li><a href="https://www.hotelclub.com/account/registration" target="_blank" class="link" rel="nofollow">注册</a></li>
                <li><a href="https://www.hotelclub.com/account/myprofile" target="_blank" class="link" rel="nofollow">我的帐户</a></li>
                <li><a href="https://www.hotelclub.com/trips/current" target="_blank" class="link" rel="nofollow">订单查询</a></li>
                <li class="last"><a href="http://faq.hotelclub.com/" target="_blank" class="link" rel="nofollow">客户服务</a></li>
            </ul>
        </div>
        <div class="clear"></div>
        <div class="collapse navbar-collapse">
        	<ul class="navbar-left">
				<li><a href="/" class="link" rel="nofollow">首页</a> </li>
				<li><a href="http://www.hotelclub.com/club-benefits" class="link" target="_blank">好客邦会员优惠</a> </li>
                <li><a href="__HT__/guide/" class="link">旅游攻略</a> </li>
                <li><a href="/" class="link">查尔斯专家</a> </li>
			</ul>
            <ul class="navbar-right">
            	<li>
                	<div class="dropdown pull-left">
                    	<a href="#" id="drop1"  data-toggle="dropdown" class="link" rel="nofollow">简体中文<b class="caret"></b></a> 
                    	<ul id="menu1" class="dropdown-menu" style="background:#F4F4F5;width:315px;" role="menu" aria-labelledby="drop1">
						<div class="menu1_left" style="float:left;width:140px;margin:0px 0px 0px 8px;">
							<li><a href="#" rel="nofollow">简体中文</a></li>
							<li><a href="http://www.hotelclub.com/?locale=en_AU"> English </a></li>
							<li><a href="http://www.hotelclub.com/?locale=zh_TW"> 繁體中文 (台灣) </a></li>
							<li><a href="http://www.hotelclub.com/?locale=zh_HK"> 繁體中文 (香港) </a></li>
							<li><a href="http://www.hotelclub.com/?locale=ms_MY"> Bahasa Malaysia </a></li>
							<li><a href="http://www.hotelclub.com/?locale=de_DE"> Deutsch </a></li>
							<li><a href="http://www.hotelclub.com/?locale=es_ES"> Español </a></li>							
							<li><a href="http://www.hotelclub.com/?locale=fr_FR"> Français </a></li>
							<li><a href="http://www.hotelclub.com/?locale=it_IT"> Italiano </a></li>
						</div>
						<div class="menu1_right" style="float:left;width:140px;margin:0px 0px 0px 8px;">
							<li><a href="http://www.hotelclub.com/?locale=ja_JP"> 日本語 </a></li>
							<li><a href="http://www.hotelclub.com/?locale=ko_KR"> 한국어 </a></li>
							<li><a href="http://www.hotelclub.com/?locale=nl_NL"> Nederlands </a></li>
							<li><a href="http://www.hotelclub.com/?locale=pl_PL"> Polski </a></li>
							<li><a href="http://www.hotelclub.com/?locale=pt_PT"> Português </a></li>
							<li><a href="http://www.hotelclub.com/?locale=ru_RU"> Русский </a></li>
							<li><a href="http://www.hotelclub.com/?locale=sv_SE"> Svenska </a></li>
							<li><a href="http://www.hotelclub.com/?locale=th_TH"> ไทย </a></li>
						</div>
                    	</ul>
                    </div>
                    <div class="pull-left">| </div>
                    <div class="dropdown pull-right">
                 	    <a href="#" id="drop2"  data-toggle="dropdown" class="link">CNY-人民币<b class="caret hidden"></b></a>
                		<ul id="menu2" class="dropdown-menu hidden" role="menu" style="background:#F4F4F5;" aria-labelledby="drop2">
                        	<li><a href="#" value="CNY">CNY-人民币</a></li>
							<li><a href="#" value="USD">USD-美元</a></li>
						</ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <ol class="breadcrumb">
		<li><a href="__HT__/">首页</a></li>
        <li><a href="__HT__/guide/">旅游攻略</a></li>
		<li class="active"><?php echo ($data["obj"]["typename"]); ?>旅游攻略</li>
	</ol>
</div>


<div class="hidden" style="position:fixed; right:0; bottom:30%; z-index:9999; width:130px; height:133px; background:none;">
	<a><img src="__static__/images/travel/download.jpg"></a>
</div>


<div class="container">
	<div style="position:fixed; right:18%; bottom:7%; z-index:9999; width:35px; height:35px; background:none;">
        <div class="go-top">
        	<a id="showmessage" class="lijibaomin clearliji"  style="visibility: visible;" target="_blank"></a>
            <a id="goTop" class="gototopws" href="javascript:;" target="_self" monkey="gotop" style="display: block; visibility: visible;"></a>
        </div>
        <div id="hide" style="display:none;"></div>
    </div>
    

	<div class="row">
    	<div class="col-md-8">
        	<div class="slides">
            <div id="carousel-example-generic" class="carousel slide <?php if(($data['auto'] == '')): ?>hidden<?php endif; ?>" data-ride="carousel">
              <!-- Indicators -->
              <div class="heads">
              	<h1><?php echo ($data["obj"]["typename"]); ?>旅游攻略2014</h1>
              </div>
              <ol class="carousel-indicators">
              	<?php if(is_array($data["auto"])): foreach($data["auto"] as $key=>$val): ?><li data-target="#carousel-example-generic" data-slide-to="<?php echo ($key); ?>" <?php if(($key == 0)): ?>class="active"<?php endif; ?>><img src="<?php echo ($val['litpic']); ?>" width="70px" height="70px"></li><?php endforeach; endif; ?>		
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php if(is_array($data["auto"])): foreach($data["auto"] as $key=>$val): ?><div class="item <?php if(($key == 0)): ?>active<?php endif; ?>">
						<a href="__HT__/guide-<?php echo ($val['id']); ?>.html"><img src="<?php echo ($val['litpic']); ?>" alt="<?php echo ($val['title']); ?>" width="656px" height="375px"></a>
					</div><?php endforeach; endif; ?>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
              </a>
			  <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
			  </a>
              <a class="travelgallery"><img src="__static__/images/travel/p.png"></a>
            </div>

            </div>
        	<div class="panel">
            	<div class="head1">
                    <h2><?php echo ($data["obj"]["typename"]); ?>旅游攻略概述</h2>
                </div>
                <p class="pintro">
				<?php if(($data['obj']['content'] != 'content')): echo ($data["obj"]["content"]); else: ?>2014去<?php echo ($data["obj"]["typename"]); ?>旅游实用攻略,HotelClub提供全面的<?php echo ($data["obj"]["typename"]); ?>旅游攻略,包含<?php echo ($data["obj"]["typename"]); ?>热门景点介绍、<?php echo ($data["obj"]["typename"]); ?>美食、<?php echo ($data["obj"]["typename"]); ?>购物、<?php echo ($data["obj"]["typename"]); ?>旅游酒店推荐、<?php echo ($data["obj"]["typename"]); ?>旅游注意事项等。更多<?php echo ($data["obj"]["typename"]); ?>自助游攻略信息尽在HotelClub旅游攻略。<?php endif; ?>
				</p>
            </div>
            <div class="panel <?php if(($img_lists == null)): ?>hidden<?php endif; ?>">
            	<div class="head1">
                    <h2><?php echo ($data["obj"]["typename"]); ?>热门旅游景点</h2>
                </div>
            	<ul id="carousel" class="elastislide-list">				
					<?php if(is_array($img_lists)): foreach($img_lists as $key=>$val): ?><li><a><img src="<?php echo ($val['url']); ?>" alt="<?php echo ($val['title']); ?>" width="141px" height="98px" /><span><?php echo ($val['title']); ?></span></a></li><?php endforeach; endif; ?>
				</ul>     
            </div>
            <div class="panel">
            	<div class="head1">
                    <h2>去<?php echo ($data["obj"]["typename"]); ?>旅游攻略2014</h2>
                    <ul class="nav nav-tabs">
						<input type="hidden" name="guide_form" value="click" />	
						<li class="active"><a href="#hot" value='click' data-toggle="tab">热门</a></li>
						<li><a href="#new" value='pubdate' data-toggle="tab">最新</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane active" id="hot">
                    	<?php if(is_array($data["list"])): foreach($data["list"] as $key=>$val): ?><div class="posts">
                            <div class="thumbnail">
								<?php if(($val['litpic'] == '')): ?><a href="__HT__/guide-<?php echo ($val['id']); ?>.html"><img src="__static__/images/travel/screenshoot.jpg" /></a>
								<?php else: ?>
								<a href="__HT__/guide-<?php echo ($val['id']); ?>.html"><img src="<?php echo ($val['litpic']); ?>" width='178px' height='115px' /></a><?php endif; ?>
                            </div>
                            <div class="posts_cont">
                                <h3><a href="__HT__/guide-<?php echo ($val['id']); ?>.html"><?php echo ($val['title']); ?></a></h3>
                                <div class="views">浏览<span><?php echo ($val['click']); ?></span></div>
                                <div><span>作者：<?php echo ($val['writer']); ?></span><span>发表时间：<?php echo (date("Y-m-d",$val['pubdate'])); ?></span><span>分类：<a href="__HT__/<?php echo ($val['typedir']); ?>-guide/"><?php echo ($val['typename']); ?></a></span></div>
                                <p><?php echo ($val['description']); ?>...<a>查看全文>></a></p>
                            </div>
                        </div><?php endforeach; endif; ?> 
                    </div>                	
                </div>
                <div class="paginations">
                    <div class="pagination"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 left-clear">
        	<div class="sidemenu">
            	<ul>
	            	<li class="sl_1"><a <?php if(($data["explain"] != '')): ?>href="__HT__/guide-<?php echo ($data["explain"]["id"]); ?>.html"<?php endif; ?> class="btn btn-default"><?php echo ($data["obj"]["typename"]); ?>概况<i></i></a></li>
                    <li class="sl_2"><a <?php if(($data["scene"] != '')): ?>href="__HT__/guide-<?php echo ($data["scene"]["id"]); ?>.html"<?php endif; ?> class="btn btn-default"><?php echo ($data["obj"]["typename"]); ?>景点<i></i></a></li>
                    <li class="sl_3"><a href="__HT__/<?php echo ($data["obj"]["typedir"]); ?>-guide-list/" class="btn btn-default"><?php echo ($data["obj"]["typename"]); ?>游记<i></i></a></li>
                    <li class="sl_4"><a href="__HT__/<?php echo ($data["obj"]["typedir"]); ?>/" class="btn btn-default"><?php echo ($data["obj"]["typename"]); ?>酒店<i></i></a></li>
                    <li class="sl_5"><a class="btn btn-default get_map<?php echo ($data['hot_list'][0]['aid']); ?>" title="<?php echo ($val["title"]); ?>" onclick="getMap_list('<?php echo ($data['hot_list'][0]['aid']); ?>');" url="http://www.hotelclub.com/GetGMap.asp?lon=<?php echo ($data['hot_list'][0]['map_x']); ?>&lat=<?php echo ($data['hot_list'][0]['map_y']); ?>&h=800&w=800" target="_blank"><?php echo ($data["obj"]["typename"]); ?>地图<i></i></a></li>
            	</ul>
            </div>
            <div style="width:276px;height:210px;border:#ccc solid 1px; margin-bottom:10px;" id="dituContent">
			<iframe width="276px" height="210px" style="margin-bottom:5px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.hotelclub.com/GetGMap.asp?lon=<?php echo ($data['hot_list'][0]['map_x']); ?>&lat=<?php echo ($data['hot_list'][0]['map_y']); ?>&h=210&w=276"></iframe>			
			</div>
			
            <div class="panel">
            	<h2><?php echo ($data["obj"]["typename"]); ?>最新自助游攻略</h2>
                <span class="more_right"><a href="__HT__/<?php echo ($data["obj"]["typedir"]); ?>-guide-list/">更多&gt;&gt;</a></span>
                <ul class="lists">
                	<?php if(is_array($scriptures)): foreach($scriptures as $key=>$val): ?><li><a class="lists_a" href="__HT__/guide-<?php echo ($val['id']); ?>.html"><span class="glyphicon glyphicon-play"></span><?php echo ($val['title']); ?></a></li><?php endforeach; endif; ?> 
                </ul>
            </div>
            <div class="panel">
            	<h2><?php echo ($data["obj"]["typename"]); ?>最新预订酒店</h2>
                <span class="more_right"><a href="__HT__/<?php echo ($data["obj"]["typedir"]); ?>/">更多&gt;&gt;</a></span>
                <?php if(is_array($data["hot_list"])): foreach($data["hot_list"] as $key=>$val): ?><div class="hlists">
                	<a class="deletes"></a>
                	<div class="thumbnail">
                    	<img src="<?php echo ($val['litpic']); ?>" width="56px" height="42px" />
                    </div>
                    <h4><span><a href="#"><?php echo ($val['title']); ?></a></span></h4>
                    <p><?php echo ($val['stars']); ?></p>
                    <div class="timelast hidden"><i></i>上次预订为23小时前</div>
                </div><?php endforeach; endif; ?>                  
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel padding dlists">
				<?php if(($data["city_list"] != '')): ?><h4><?php echo ($data["obj"]["typename"]); ?>城市导航</h4>
                <p>
				<?php if(is_array($data["city_list"])): foreach($data["city_list"] as $key=>$val): ?><span><a href="__HT__/<?php echo ($val['typedir']); ?>-guide/"><?php echo ($val['typename']); ?></a></span><?php endforeach; endif; ?></p><?php endif; ?>
                <h4>亚洲热门国家</h4>
                <p><?php if(is_array($data["country_list"])): foreach($data["country_list"] as $key=>$val): ?><span><a href="__HT__/<?php echo ($val['typedir']); ?>-guide/"><?php echo ($val['typename']); ?></a></span><?php endforeach; endif; ?></p>
	</div>
</div>
<div class="container">
	<div class="panel padding">
    	<p style="margin-bottom:0;">HotelClub国际酒店预订网为您提供泰国、新加坡、马尔代夫、欧洲、美国等国外旅游攻略信息，包括自助游、自由行攻略指南，您可以在这里查询最新出国旅游攻略，境外热门旅游景点，酒店推荐信息，了解中外文化差异，国外风俗习惯等。旅游是一种心情，也是一种态度。携手Hotelclub，出国旅游，感受别样的异域风情！</p>
        <a style="font-size:14px;">HotelClub服务热线：4001202945</a>
    </div>
</div>
<!--[if lt IE 9]>
<script src="__static__/js/html5shiv.min.js"></script>
<script src="__static__/js/respond.min.js"></script>
<![endif]-->
<script src="__static__/js/jquery.min.js"></script>
<script src="__static__/js/jquery.cookie.js"></script>
<script src="__static__/js/bootstrap.min.js"></script>
<script src="__static__/js/bootstrap-paginator.js"></script>
<script src="__static__/js/bootstrap-datetimepicker.min.js"></script>
<script src="__static__/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="__static__/js/common.js"></script>
<script src="__static__/js/modernizr.custom.17475.js"></script>
<script src="__static__/js/base.js"></script>
<style>.modal-dialog{width:730px;}</style>
<!-- Modal -->
<div class="modal fade" id="Modal_MAP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="map_title"></h4>
	  </div>
	  <div class="modal-body">
		<iframe width="665" height="440" frameborder="0"  scrolling="no" marginheight="0" marginwidth="0" id="map_address"></iframe>
	  </div>
	  <div class="modal-footer">
		<button type="button" class="btn" style="text-shadow:none;" data-dismiss="modal">关闭</button>
	  </div>
	</div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="container">
	<div class="links">
    	<p>
    	<a href="http://www.hotelclub.com/trips/current" target="_blank" class="link" rel="nofollow">HotelClub国际酒店预订</a>
    	<a href="http://www.hotelclub.com/info/page?id=PrivacyPolicy" target="_blank" class="link" rel="nofollow">隐私政策</a>
    	<a href="http://www.hotelclub.com/info/page?id=TermsAndConditions" target="_blank" class="link" rel="nofollow">使用条款</a>
    	<a href="http://corp.orbitz.com/supplier/contact-us" target="_blank" class="link" rel="nofollow">酒店加盟</a>
    	<a href="http://partner.isango.com/hotelclub" target="_blank" class="link" rel="nofollow">旅游商店</a>
    	<a href="http://www.cartrawler.com/hotelclub/?lang=ZH" target="_blank" class="link" rel="nofollow">汽车承租</a>
    	<a href="http://www.hotelclub.com/TravelAgent.asp?lc=CS" target="_blank" class="link" rel="nofollow">旅行社</a>
    	<a href="http://www.hotelclub.com/info/page?id=AboutUs" target="_blank" class="link" rel="nofollow">关于我们</a>
    	<a href="http://www.hotelclub.cn/World-Page/" target="_blank" class="link" rel="nofollow">网站地图</a>
    	</p>
    </div>
    <div class="footicon center-block text-center">
    	<a><img src="__static__/images/5.jpg"></a>
        <a><img src="__static__/images/4.jpg"></a>
        <a><img src="__static__/images/3.jpg"></a>
        <a><img src="__static__/images/2.jpg"></a>
        <a><img src="__static__/images/1.jpg"></a>
    </div>
    <p class="center-block footwidth">
    <span class="pull-left">HotelClub为HotelClub Pty Ltd所属注册商标。 </span><br>
HotelClub隶属HotelClub Limited，是Orbitz Worldwide Inc'的一部份，由HotelClub Pty Ltd.所有并运营。</p>
	<p  class="center-block text-center">**1会员奖励=1美元，今日可兑换为USD。详情请参阅<a>会员条款与条件</a>。</p>
</div>


<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"slide":{"type":"slide","bdImg":"0","bdPos":"right","bdTop":"200"}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
<!-- START OF SmartSource Data Collector TAG -->
<!-- Copyright (c) 1996-2011 WebTrends Inc.  All rights reserved. -->
<!-- Version: 9.3.0 -->
<!-- Tag Builder Version: 3.1  -->
<!-- Created: 2/24/2011 3:50:56 PM -->
<!-- ----------------------------------------------------------------------------------- -->
<!-- Warning: The two script blocks below must remain inline. Moving them to an external -->
<!-- JavaScript include file can cause serious problems with cross-domain tracking.      -->
<!-- ----------------------------------------------------------------------------------- -->
<script type="text/javascript">
var gFpcDom = ".hotelclub.com";
var gDomain = "ctix8.cheaptickets.com";
var gDcsId = "dcscfchfzvz5bdrpz13vsgjna_9r8u";
var gFpc = "WT_FPC";
var gTrackEvents = true; // enables event tracking on all a, image map, form button, and enter key presses (that submit form)
var gConvert = true;
if ((typeof(gConvert)!="undefined")&&gConvert&&(document.cookie.indexOf(gFpc+"=")==-1)&&(document.cookie.indexOf("WTLOPTOUT=")==-1)){
      document.write("<SCR"+"IPT TYPE='text/javascript' SRC='"+"http"+(window.location.protocol.indexOf('https:=')==0?'s':'')+"://"+gDomain+"/"+gDcsId+"/wtid.js"+"'><\/SCR"+"IPT>");
     }
</script>
<script src="/common/webtrends.js" type="text/javascript"></script>
<script type="text/javascript">
  /* see wrapper.tag for call to wtInit() */
  wtInit();
</script>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-13168674-1']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

<script type="text/javascript" src="__static__/js/jquerypp.custom.js"></script>
<script type="text/javascript" src="__static__/js/jquery.elastislide.js"></script>
<script type="text/javascript">
$(function(){
    $(".start_date").datetimepicker({
    	language:  'zh-CN',
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startDate: get_Date(),//当前时间开始
		startView: 2,
		minView: 4,
		forceParse: 0,
    	format: 'yyyy-mm-dd'
    });
    $(".end_date").datetimepicker({
    	language:  'zh-CN',
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startDate: get_Date(),//当前时间开始
		startView: 2,
		minView: 2,
		forceParse: 0,
    	format: 'yyyy-mm-dd'
    });
	$( '#carousel' ).elastislide();
	var guide_form = $("input[name='guide_form']");
	var options = {
            currentPage: 1,
            totalPages: <?php echo ($data["total"]); ?>,
            itemTexts : function(type, page,
					current) {
				switch (type) {
				case "first":
					return "首页";
				case "prev":
					return "上一页";
				case "next":
					return "下一页";
				case "last":
					return "尾页";
				case "page":
					return page;
				}
			},
			tooltipTitles : function(type, page,
					current) {
				switch (type) {
				case "first":
					return "跳转到首页";
				case "prev":
					return "跳转到上一页";
				case "next":
					return "跳转到下一页";
				case "last":
					return "跳转到尾页";
				case "page":
					return "跳转到第  "
							+ page
							+ " 页";
				}
			},
			 onPageChanged: function(e,oldPage,Page){				
				getPage(guide_form.val(),Page);
	         }
        }
    $('.pagination').bootstrapPaginator(options);
	$('.nav').find('a').click(function(){
		var _this = $(this);		
		guide_form.val(_this.attr('value'));		
		$.post("/<?php echo ($data["obj"]["typedir"]); ?>-guide/",{"order":guide_form.val()},function(data){
			if(data == 0){	
				return;
			}else{
				var obj = eval('(' + data + ')');
				$('.tab-pane').empty();
				guide_obj(obj.list);
				$('.pagination').bootstrapPaginator({
					currentPage: 1
				});	
			}
		});
	});
	
});


function getPage(order_val,page){
	
	$.post("/<?php echo ($data["obj"]["typedir"]); ?>-guide/",{"order":order_val,"page":page},function(data){
		if(data == 0){	
			return;
		}else{
			var obj = eval('(' + data + ')');
			$('.tab-pane').empty();
			guide_obj(obj.list);			
		}
	});
}
(function(){var G=function(H){return document.getElementById(H)};var F=function(K,J){for(var I=0,H=K.length;I<H;I++){J.apply(K[I],[I,K[I]])}};var D=function(K,J,I,H){F(I,function(L,M){if(L!=H){M.className=J}});I[H].className=K};var C=function(J){var H=[];for(var I=0;I<20;I++){if(G(J+"-"+I)){H.push(G(J+"-"+I))}else{return H}}return H};var A=function(H,J){var K=C(J.tabctrl+H);var I=C(J.tab+H);if(H==1){F(K,function(L,M){M.onclick=function(){D("","hide",I,L);D("on","",K,L);return false;}})}else{F(K,function(L,M){M.onclick=function(){D("","hide",I,L);D("on","",K,L)}})}};var B={tabctrl:"tbc",tab:"tb",num:6};for(var E=0;E<B.num;E++){A(E,B)}})();

var ele=document.getElementById("goTop");
var hide = document.getElementById('hide');
var sde=document.getElementById("showmessage");
function goTop(){    
	if(ele){
		ele.onclick = function(){
		  var doc = (document.documentElement.scrollTop) ? document.documentElement : document.body;
		  var time;
		  time = setInterval(function(){								  
		  doc.scrollTop -= Math.ceil(doc.scrollTop * 0.7);
		  if(doc.scrollTop <= 0)  clearInterval(time);
		  }, 1);
		}
	}
}
goTop();
window.onscroll = function(){
			if(ele && hide && sde){
			  var doc = (document.documentElement.scrollTop) ? document.documentElement : document.body;
			  ele.style.visibility = doc.scrollTop ? 'visible' : 'hidden';
			  sde.style.visibility = doc.scrollTop ? 'visible' : 'hidden';
			  hide.innerHTML = '';  
			}    
}

$(function(){
		$("a.travelgallery").click(function(){
		  $("ol.carousel-indicators").fadeToggle();
		  $("a.carousel-control").fadeToggle();
		});
});
</script>
</body>
</html>