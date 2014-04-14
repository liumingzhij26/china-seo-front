<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php echo ($data["list"]["title"]); ?>-HotelClub</title>
<meta name="keywords" content="<?php if(($data['list']['keywords'] == '')): echo ($data["list"]["title"]); ?>,出国旅游攻略,HotelClub<?php else: echo ($data["list"]["keywords"]); endif; ?>"> 
<meta name="description" content="<?php echo ($data["list"]["description"]); ?>">
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
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
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
		<?php if(($data['position'] != null)): ?><li><a href="__HT__/<?php echo ($data['position']['typedir']); ?>-guide/"><?php echo ($data['position']['p_typename']); ?>攻略</a></li>
        <li><a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>-guide/"><?php echo ($data['position']['typename']); ?>攻略</a></li>
		<?php else: ?>
		<li><a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>-guide/"><?php echo ($data["list"]["typename"]); ?>攻略</a></li><?php endif; ?>
		<li class="active"><?php echo ($data["list"]["title"]); ?></li>
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
        	<div class="panel">
            	<div class="post_head">
                	<h1><?php echo ($data["list"]["title"]); ?></h1>
                    <div class="namex"><span class="name"><?php echo ($data["list"]["writer"]); ?></span><span><?php echo (date("Y-m-d H:m:s",$data["list"]["pubdate"])); ?></span>   <span>浏览：<?php echo ($data["list"]["click"]); ?></span> </p></div>
                    <div class="namex namey hidden"><span>标签：<a>蜜月</a> <a>自驾</a></span><span>分类：<a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>-guide"><?php echo ($data["list"]["typename"]); ?></a></span></div>
                </div>
                <div class="conts" style="line-height:26px;padding-bottom:10px;">
					<div class="thumbnail">
                    	<img src="<?php echo ($data["list"]["litpic"]); ?>" width="550px" alt="<?php echo ($data["list"]["title"]); ?>" />
                        <div class="caption">
                            <p><?php echo ($data["list"]["shorttitle"]); ?></p>
						</div>
                    </div>					
                	<?php echo ($data["list"]["body"]); ?>               		
                </div>
                <div class="prenext">
                	<span class="pull-left">上一篇：<?php if(($data['pre'] != null)): ?><a href="__HT__/guide-<?php echo ($data['pre']['id']); ?>.html"><?php echo ($data['pre']['title']); ?></a><?php else: ?>没有数据<?php endif; ?></span>
					<span class="pull-right">下一篇：<?php if(($data['next'] != null)): ?><a href="__HT__/guide-<?php echo ($data['next']['id']); ?>.html"><?php echo ($data['next']['title']); ?></a><?php else: ?>没有数据<?php endif; ?></span>
                </div>
            </div>
            <div class="panel panelx ">
            	<div id="feed_list">                	
                </div>
				               
            </div>
            <div class="panel panelx overflows">
            	<div class="panel-heading">
                	发表评论<span class="pull-right hidden">共0条评论</span>
                </div>
                <div class="panel-body">
					<form action="#" method="post" name="feedback" id='form_feedback' onsubmit="return false;">
					<input type="hidden" name="dopost" value="send" />
					<input type="hidden" name="comtype" value="comments">
					<input type="hidden" name="aid" value="<?php echo ($data["list"]["id"]); ?>" />
					<input type="hidden" name="typeid" value="<?php echo ($data["list"]["typeid"]); ?>" />
					<input type="hidden" name="fid" id='feedbackfid' value="0" />
					<p style="line-height:20px;">标  题：
					<input type="text" name="titles" id="titles" value="" size="22" style="line-height:22px;height:22px;"/> * </p>
					<textarea style="width:625px;height:120px;line-height:20px" name="msg" id="msg"></textarea>
					<p style="line-height:40px;">验证码：<input type="text" name="validate" size="6" maxlength="4" class="ipt-txt" style="text-transform:uppercase;margin:0px;height:22px;"/>
					<img src="/include/vdimgck.php" id="validateimg" style="cursor:pointer;margin:0px;" onclick="this.src=this.src+'?'" class="vdimg"/>
					</p>
					<input class="btn btn-purpright" type='submit' id="submit" value='发表评论' /> 
					</form>
                    
                </div>
            </div>
            
            <div class="panel">
            	<div class="head1">
                    <h2>相关文章</h2>
                </div>
           		<ul class="lists_post">
					<?php if(is_array($data["headline_pubdate"])): foreach($data["headline_pubdate"] as $key=>$val): ?><li><a href="__HT__/guide-<?php echo ($val['id']); ?>.html"><?php echo ($val['title']); ?></a></li><?php endforeach; endif; ?>      
                </ul>
            </div>
        </div>
        <div class="col-md-4 left-clear">
        	<div class="sidemenu">
            	<ul>
	            	<li class="sl_1"><a <?php if(($data["explain"] != '')): ?>href="__HT__/guide-<?php echo ($data["explain"]["id"]); ?>.html"<?php endif; ?> class="btn btn-default"><?php echo ($data["list"]["typename"]); ?>概况<i></i></a></li>
                    <li class="sl_2"><a <?php if(($data["scene"] != '')): ?>href="__HT__/guide-<?php echo ($data["scene"]["id"]); ?>.html"<?php endif; ?> class="btn btn-default"><?php echo ($data["list"]["typename"]); ?>景点<i></i></a></li>
                    <li class="sl_3"><a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>-guide-list/" class="btn btn-default"><?php echo ($data["list"]["typename"]); ?>游记<i></i></a></li>
                    <li class="sl_4"><a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>/" class="btn btn-default"><?php echo ($data["list"]["typename"]); ?>酒店<i></i></a></li>
                    <li class="sl_5"><a class="btn btn-default get_map<?php echo ($data['hot_list'][0]['aid']); ?>" title="<?php echo ($val["title"]); ?>" onclick="getMap_list('<?php echo ($data['hot_list'][0]['aid']); ?>');" url="http://www.hotelclub.com/GetGMap.asp?lon=<?php echo ($data['hot_list'][0]['map_x']); ?>&lat=<?php echo ($data['hot_list'][0]['map_y']); ?>&h=800&w=800" target="_blank"><?php echo ($data["list"]["typename"]); ?>地图<i></i></a></li>
            	</ul>
            </div>
            <div class="panel">
            	<h2><?php echo ($data["list"]["typename"]); ?>最新自助游攻略</h2>
                <span class="more_right"><a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>-guide-list/">更多&gt;&gt;</a></span>
                <ul class="lists">
				<?php if(is_array($data["new_list"])): foreach($data["new_list"] as $key=>$val): if(($val['id'] != $data['list']['id'])): ?><li><a href="__HT__/guide-<?php echo ($val['id']); ?>.html" class="lists_a"><span class="glyphicon glyphicon-play"></span><?php echo ($val['title']); ?></a></li><?php endif; endforeach; endif; ?>               
                </ul>
            </div>
            <div class="panel">
            	<h2><?php echo ($data["list"]["typename"]); ?>最新预订酒店</h2>				
                <span class="more_right"><a href="__HT__/<?php echo ($data["list"]["typedir"]); ?>/">更多&gt;&gt;</a></span>
				<?php if(is_array($data["hot_list"])): foreach($data["hot_list"] as $key=>$val): ?><div class="hlists">
                	<a class="deletes"></a>
                	<div class="thumbnail">
                    	<img src="<?php echo ($val['litpic']); ?>" width="56px" height="42px" />
                    </div>
                    <h4><span><a href="#" class="get_map<?php echo ($val['aid']); ?>"><?php echo ($val['title']); ?></a></span></h4>
                    <p><?php echo ($val['stars']); ?></p>
                    <div class="timelast hidden"><i></i>上次预订为23小时前</div>
                </div><?php endforeach; endif; ?>                
                <div class="clearfix"></div>
            </div>
        </div>
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
	$('#submit').click(function() {
        var _form = $("#form_feedback");
        var validate = $('input[name="validate"]');
        var title = $('input[name="titles"]');
        var msg = $("#msg");
        if (!/^[\u4E00-\u9FA5\uf900-\ufa2d\w\.\,\。\，\?\s]{2,18}$/.test(title.val())) {
            alert('标题格式错误！');
            title.focus();
            return false
        }
        if (!/^[\u4E00-\u9FA5\uf900-\ufa2d\w\.\,\。\，\?\s]{5,500}$/.test(msg.val())) {
            alert('内空格式能大于500个字或少于5个字！');
            msg.focus();
            return false
        }
        if (!/^[a-zA-Z]{4}$/.test(validate.val())) {
            alert('验证验格式错误！');
            validate.focus();
            return false
        }
        $.ajax({
            type: "POST",
            url: "/plus/nc_gook.php",
            data: _form.serialize(),
            success: function(msg) {
                alert(msg);
				$("#validateimg").attr("src","/include/vdimgck.php?T="+Math.random());
            }
        });
        return false
    });
	LoadCommets(1);
});
function LoadCommets(page)
{
		$.get('/plus/nc_gook.php',{"dopost":"getlist","aid":"<?php echo $data['list']['id']; ?>","page":page},function(data){
			//alert(data);
			$("#feed_list").html(data);
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
</script>
</body>
</html>