<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php if(($data["seotitle"] == '')): echo ($data["typename"]); ?>酒店预订, <?php echo ($data["typename"]); ?>酒店排名, <?php echo ($data["typename"]); ?>酒店比价 - HotelClub<?php else: echo ($data["seotitle"]); ?> - HotelClub<?php endif; ?></title>
<meta name="keywords" content="<?php if(($data["keywords"] == '')): echo ($data["typename"]); ?>酒店预订,<?php echo ($data["typename"]); ?>酒店排名,<?php echo ($data["typename"]); ?>酒店比价,HotelClub<?php else: echo ($data["keywords"]); endif; ?>"> 
<meta name="description" content="<?php if(($data["description"] == '')): ?>HotelClub提供高性价比的<?php echo ($data["typename"]); ?>酒店预订服务，精选<?php echo ($data["typename"]); ?>酒店排名，比价，评论，优惠等信息. HotelClub海量<?php echo ($data["typename"]); ?>酒店，让您出行无忧!<?php else: echo ($data["description"]); endif; ?>">
<meta name="DCSext.seopage" content="NC|<?php echo ($data["id"]); ?>|<?php echo ($data["typedir"]); ?>/"/>
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
    <ol class="breadcrumb">
		<li><a href="/">首页</a></li>
		<li class="active"><?php echo ($data["typename"]); ?>酒店预订</li>
	</ol>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">
			<div></div>
        	<div class="panel order panelsmall">
	<h2>酒店预订</h2>
	<form class="form-horizontal" role="form" id="search_from" method="post" action="/Search/">
	  <div class="form-group">
		<label for="inputEmail3" class="labell control-label">入住国家:</label>
		<div class="labelw">
			<select class="form-control" name="keys_country"></select>
		</div>
		<font class="msginfo">*</font>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">入住城市:</label>
		<div class="labelw">
			<select class="form-control" name="keys_city" datatype="*" nullmsg="*" errormsg="请选择城市">
			  <option value="">请选择城市</option>
			</select>                        
		</div>
		<font class="msginfo">*</font>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">入住日期:</label>
		<div class="labelw">
			<input type="text" name="start_date" class="start_date form-control" style="cursor: pointer;" datatype="/^[\d\-]+$/" nullmsg="*"  placeholder="入住日期" value="" readonly>       
		</div>
		<font class="msginfo">*</font>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">退房日期:</label>
		<div class="labelw">
			<input type="text" name="end_date" class="end_date form-control" style="cursor: pointer;" datatype="/^[\d\-]+$/" nullmsg="*" placeholder="退房日期" value="" readonly>                        
		</div>
		<font class="msginfo">*</font>
	  </div>                
	  <div class="form-group groupperson">
		<label for="inputPassword3" class="labell control-label">入住人员:</label>
		<div class="labelw">
			<a class="link addroom">添加房间</a>
			<div class="smallp">
				<span class="pull-left">成人（18岁以上）</span>                            
				<select id="adults1" name="room1.adults" class="form-control selectsmall">
					<option value="1">1</option>
					<option selected=selected value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
				</select>
			</div>
			<div class="smallp">
				<span class="pull-left">儿童（18岁以上）</span>
				<select id="children1" name="room1.children" class="form-control selectsmall">
					<option value="0" selected=selected>0</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
			</div>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">酒店星级:</label>
		<div class="labelw">
			<select name="stars" class="form-control" id="starRating">
				<option value="1">没有特别偏好</option>
				<option value="2">两星级或以上酒店</option>
				<option value="3">三星级或以上酒店</option>
				<option value="4">四星级或以上酒店</option>
				<option value="5">仅限5星级酒店</option>
			</select>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="labell control-label">酒店名称:</label>
		<div class="labelw">
			<input type="text" name="city_name" class="form-control" placeholder="选填" >
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-xs-offset-3 col-xs-8">
		  <button type="button" class="btn btn-purp" id="search_btn">查&nbsp;&nbsp;&nbsp;询</button>
		</div>
	  </div>
	</form>
</div>
            <div class="panel panelsmall">
            	<h2><?php echo ($data["typename"]); ?>热门城市</h2>
                <ul class="lists">
                	<?php if(is_array($hotcity)): foreach($hotcity as $key=>$vo): ?><li><a class="lists_a" href="__HT__/<?php echo ($vo["typedir"]); ?>/"><span class="glyphicon glyphicon-play"></span><?php echo ($vo["typename"]); ?>酒店<span class="pull-right"><?php if(($vo["count"] == null)): ?>0<?php endif; echo ($vo["count"]); ?>家酒店</span></a></li><?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 left-clear">
        	<div class="panel intro panelbig">
            	<h1><?php echo ($data["typename"]); ?>酒店预订</h1>
                <img src="<?php echo ($data["picname"]); ?>" width="247px" height="143px" class="pull-right">
                <p><?php echo ($data["content"]); ?></p>           
                <div class="baidu">
                <!-- Baidu Button BEGIN -->
                        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare pull-right">
                        <span class="bds_more">分享到：</span>
                        <a class="bds_tsina"></a>
                        <a class="bds_qzone"></a>
                        <a class="bds_tqq"></a>
                        <a class="bds_renren"></a>
                        <a class="bds_t163"></a>
                        <a class="bds_baidu"></a>
                        <a class="shareCount"></a>
                        </div>
                        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;mini=1&amp;uid=437308" ></script>
                        <script type="text/javascript" id="bdshell_js"></script>
                        <script type="text/javascript">
                       		document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
                        </script>
				<!-- Baidu Button END -->
                </div>
            </div>
            <div class="panel panelbig">
            	<h2><?php echo ($data["typename"]); ?>热门国家</h2>
                <div class="row">
                <?php if(is_array($country_hot)): foreach($country_hot as $key=>$vo): ?><div class="col-xs-3">
                    <div class="thumbnail">
                      <img src="<?php echo ($vo["picname"]); ?>" style="width:120px;height:120px" alt="<?php echo ($vo["typename"]); ?>">
                      <div class="captiontop">
                        <h3><a href="__HT__/<?php echo ($vo["typedir"]); ?>/"><?php echo ($vo["typename"]); ?></a></h3>
                      </div>
                      <div class="caption">
                        <h3><a href="__HT__/<?php echo ($vo["typedir"]); ?>/"><?php if(($vo["count"] == null)): ?>0<?php else: echo ($vo["count"]); endif; ?>家酒店</a></h3>
                      </div>
                    </div>
                  </div><?php endforeach; endif; ?>     
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel panelfull">
		<h2><?php echo ($data["typename"]); ?>酒店导航</h2>
        <div class="clearfix"></div>
        <div class="maps">
			<img src="__static__/images/maps.png" class="worldmap">
        	<a href="#North-America" data-toggle="tab" class="state state1">北美洲</a>
            <a href="#midamerica" data-toggle="tab" class="state state2">中美洲</a>
            <a href="#South-America" data-toggle="tab" class="state state3">南美洲</a>
            <a href="#Europe" data-toggle="tab" class="state state4">欧洲</a>
            <a href="#middleeast" data-toggle="tab" class="state state5">中东</a>
            <a href="#Africa" data-toggle="tab" class="state state6">非洲</a>
            <a href="#Asia" data-toggle="tab" class="state state7">亚洲</a>
            <a href="#Oceania" data-toggle="tab" class="state state8">大洋洲</a>
        </div>
        <div class="maps_tab">
            <ul class="state_nav">
              <li>大洲酒店：</li>				
				<?php if(is_array($continentlist)): foreach($continentlist as $key=>$v): if(($v["lev"] == 1)): ?><li class="<?php if(($key == 0)): ?>active<?php endif; ?>"><a href="#<?php echo ($v["typedir"]); ?>" data-toggle="tab"><?php echo ($v["typename"]); ?></a></li><?php endif; endforeach; endif; ?>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
			<?php if(is_array($continentlist)): foreach($continentlist as $key=>$v): if(($v["lev"] == 1)): ?><div class="tab-pane <?php if(($key == 0)): ?>active<?php endif; ?>" id="<?php echo ($v["typedir"]); ?>">
              	<ul class="state_country">
					<?php if(is_array($continentlist)): foreach($continentlist as $ks=>$vs): if(($vs["lev"] == 2 and $v['id'] == $vs['reid'])): ?><li><a href="__HT__/<?php echo ($vs["typedir"]); ?>/"><?php echo ($vs["typename"]); ?></a></li><?php endif; endforeach; endif; ?>
                </ul>
              </div><?php endif; endforeach; endif; ?>
            </div>
        </div>
        <div class="clearfix"></div>
	</div>
</div>
<script src="__static__/js/jquery.min.js"></script>
<script src="__static__/js/jquery.cookie.js"></script>
<script src="__static__/js/bootstrap.min.js"></script>
<script src="__static__/js/bootstrap-paginator.js"></script>
<script src="__static__/js/bootstrap-datetimepicker.min.js"></script>
<script src="__static__/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="__static__/js/common.js"></script>
<script src="__static__/js/base.js"></script>
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
   	$(".addroom,.addroom2").on("click",(function(){
		if( $(".addperson").length >= 3 ) {
			return;
		}
		$(".groupperson").append("<div class='addperson'><span class='pull-left'>成人（18岁以上）</span><select class='form-control selectsmall'><option>2</option><option>1</option></select>	<span class='pull-left'>儿童（0-17岁）</span><select class='form-control selectsmall'><option>2</option><option>1</option></select><a class='link delete'>删除房间</a><a class='link addroom2'>继续添加</a></div>");
		$(".delete").click(function(){
			$(this).parent(".addperson").remove();
		});
	}));
   	
    $(".start_date").datetimepicker({
    	language:  'zh-CN',
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startDate: '<?php echo ($date); ?>',//当前时间开始
		startView: 2,
		minView: 4,
		forceParse: 0,
    	format: 'yyyy-mm-dd'
    });
    getCountry(<?php echo ($data["id"]); ?>);//加载国家
});
</script>
</body>
</html>