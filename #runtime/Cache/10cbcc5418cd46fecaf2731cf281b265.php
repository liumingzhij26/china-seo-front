<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>HotelClub</title>
<meta name="keywords" content="酒店预订,酒店推荐,住宿攻略,HotelClub"> 
<meta name="description" content="在HotelClub,我们帮助您以优惠的价格预订性价比高的酒店，2-7折在线预订，现在就来体验吧！">
<meta name="DCSext.pos" content="HCLC" /> 
<meta name="DCSext.LNG" content="zh_CN"/> 
<meta name="WT.pn_sku" content="HOT"/> 
<meta name="WT.si_n" content="HOT"/>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=9,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="__static__/css/bootstrap.min.css">
<link rel="stylesheet" href="__static__/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="__static__/css/HotelClub-CSS1.css">
<link rel="stylesheet" href="__static__/css/style.css">
<!--[if lt IE 9]>
<script src="__static__/js/html5shiv.min.js"></script>
<script src="__static__/js/respond.min.js"></script>
<![endif]-->
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
    <p align="center"><a href="/"><img src="__static__/images/404.jpg" alt="404" /></a></p>
</div>

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

</body>
</html>