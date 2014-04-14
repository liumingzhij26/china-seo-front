<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php if(($data["typename"] == '')): echo ($data["typename"]); ?>酒店预订,<?php echo ($data["typename"]); ?>酒店推荐,<?php echo ($data["typename"]); ?>住宿攻略 - HotelClub<?php else: echo ($data["typename"]); ?> - HotelClub<?php endif; ?></title>
<meta name="keywords" content="<?php if(($data["typename"] == '')): echo ($data["typename"]); ?>酒店预订,<?php echo ($data["typename"]); ?>酒店推荐,<?php echo ($data["typename"]); ?>住宿攻略,HotelClub<?php else: echo ($data["typename"]); endif; ?>"> 
<meta name="description" content="<?php if(($data["typename"] == '')): ?>HotelClub拥有丰富的<?php echo ($data["typename"]); ?>酒店资源，为您出行提供优质的<?php echo ($data["typename"]); ?>酒店预订和<?php echo ($data["typename"]); ?>酒店推荐服务，为前往<?php echo ($data["typename"]); ?>的您提供详细的住宿攻略。在HotelClub,我们帮助您以优惠的价格预订性价比高的<?php echo ($data["typename"]); ?>酒店，2-7折在线预订，现在就来体验吧！<?php else: echo ($data["typename"]); endif; ?>">
<meta name="DCSext.seocntry" content="NC|<?php echo ($data["id"]); ?>|<?php echo ($data["typedir"]); ?>/"/>
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
		<li><a href="__HT__">首页</a></li>
		<li class="active"><b><?php if($data["city_name"] == null or $data["city_name"] == ''): ?>酒店名称<?php else: echo ($data["city_name"]); endif; ?></b></li>       
	</ol>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">
				<div></div>
				<div class="panel order panelsmall">
				<h2>酒店预订</h2>
				<form class="form-horizontal" role="form" id="search_page">
					<input type="hidden" name="p_keys_country" value="<?php echo ($data["keys_country"]); ?>" />
					<input type="hidden" name="p_keys_city" value="<?php echo ($data["keys_city"]); ?>" />
					<input type="hidden" name="p_start_date" value="<?php echo ($data["start_date"]); ?>" />
					<input type="hidden" name="p_end_date" value="<?php echo ($data["end_date"]); ?>" />
					<input type="hidden" name="p_stars" value="<?php echo ($data["stars"]); ?>" />
					<input type="hidden" name="p_city_name" value="<?php echo ($data["city_name"]); ?>" />
					<input type="hidden" name="order" value="recommend" />
				</form>
				<form class="form-horizontal" role="form" id="search_from" method="post" action="__HT__/Search/">
				  <div class="form-group">
					<label for="inputEmail3" class="labell control-label">入住国家:</label>
					<div class="labelw">
						<select class="form-control" name="keys_country">
						<?php if(is_array($countryList)): foreach($countryList as $key=>$val): ?><option value="<?php echo ($val['id']); ?>" <?php if($val['id'] == $data['keys_country']): ?>selected<?php endif; ?>><?php echo ($val['typename']); ?></option><?php endforeach; endif; ?>
						</select>
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
							<option value="1" <?php if($data["stars"] == 1): ?>selected<?php endif; ?>>没有特别偏好</option>
							<option value="2" <?php if($data["stars"] == 2): ?>selected<?php endif; ?>>两星级或以上酒店</option>
							<option value="3" <?php if($data["stars"] == 3): ?>selected<?php endif; ?>>三星级或以上酒店</option>
							<option value="4" <?php if($data["stars"] == 4): ?>selected<?php endif; ?>>四星级或以上酒店</option>
							<option value="5" <?php if($data["stars"] == 5): ?>selected<?php endif; ?>>仅限5星级酒店</option>
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
            	<h2><?php echo ($data["typename"]); ?>介绍</h2>
                <p style="text-indent:2em; margin:0;">想去<?php echo ($data["typename"]); ?>感受不一样的异域风情？一份详细的<?php echo ($data["typename"]); ?>住宿攻略是必修课。登录hotelclub酒店预订网，查看hotelclub为您精心准备的<?php echo ($data["typename"]); ?>酒店推荐，当美丽遇见舒适，旅行的体验也就到了极致。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;即刻登录hotelclub<?php echo ($data["typename"]); ?>酒店预订中心，整理行囊向<?php echo ($data["typename"]); ?>出发，感受来自<?php echo ($data["typename"]); ?>的独特魅力！</p>
            </div>
            <div class="panel panelsmall">
            	<h2><?php echo ($data["typename"]); ?>最新酒店</h2>
                <ul class="lists">
				<?php if(is_array($citylist)): foreach($citylist as $key=>$val): ?><li><a class="lists_a" href="<?php echo ($val["linkurl"]); ?>" target="_blank"><span class="glyphicon glyphicon-play"></span><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; ?></ul>
            </div>
			<div class="panel panelsmall">
            	<div class="tab">
                    <ul class="weibo_nav weibobg1">
                      <li class="active hidden"><a href="#tencent" data-toggle="tab" >腾讯微博</a></li>
                      <li class="active"><a href="#sina" data-toggle="tab">新浪微博</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active" id="tencent">
                      	<iframe width="260" height="500" class="share_self"  frameborder="0" scrolling="no" src="http://widget.weibo.com/weiboshow/index.php?language=&width=260&height=500&fansRow=1&ptype=1&speed=300&skin=1&isTitle=0&noborder=0&isWeibo=1&isFans=0&uid=3860143361&verifier=f23b343c&dpc=1"></iframe>
                      </div>
                      <div class="tab-pane" id="sina">
                      	新浪微博插件
                      </div>
                    </div>
                </div>
            </div>			
        </div>
        <div class="col-xs-8 left-clear">
        	<div class="panel panelbig hidden" >
            	<div class="filters">
                	价格：<input type="checkbox"><a>不限</a><input type="checkbox"><a>400以内</a>
                        <input type="checkbox"><a>401-700</a><input type="checkbox"><a>701-1000</a>
                        <input type="text" class="smallinput">-<input type="text" class="smallinput"><a class="btn btn-purp smallbtn">搜索</a>
                </div>
                <div class="filters">
                	星级：<input type="checkbox"><a>不限</a><input type="checkbox"><a>2星以下</a>
                        <input type="checkbox"><a>三星</a><input type="checkbox"><a>四星</a>
                        <input type="checkbox"><a>五星级</a><a href="#">更多>></a>
                </div>
                <div class="filters hidden">
                	位置：<input type="checkbox"><a>不限</a><input type="checkbox"><a>乌节路</a>
                        <input type="checkbox"><a>滨海湾</a><input type="checkbox"><a>圣淘沙岛</a><a href="#">更多>></a>
                </div>
                <div class="filters">
                	品牌：<input type="checkbox"><a>不限</a><input type="checkbox"><a>戴斯</a>
                        <input type="checkbox"><a>美居</a><input type="checkbox"><a>宜必思</a><a href="#">更多>></a>
                </div>
                <div class="filters">
                	设施：<input type="checkbox"><a>不限</a><input type="checkbox"><a>Spa服务</a>
                        <input type="checkbox"><a>机场接送</a><input type="checkbox"><a>免费停车</a>
                        <input type="checkbox"><a>无线网络</a><input type="checkbox"><A>游泳池</A>
                        <input type="checkbox"><a>无线网络</a><input type="checkbox"><A>游泳池</A>
                        <input type="checkbox"><a>无线网络</a><input type="checkbox"><A>游泳池</A>
                        <input type="checkbox"><a>无线网络</a><input type="checkbox"><A>游泳池</A>
                        <input type="checkbox"><a>无线网络</a><input type="checkbox"><A>游泳池</A>
                        <input type="checkbox"><a>无线网络</a><input type="checkbox"><A>游泳池</A>
                        <a href="#">更多>></a>
                        
                        <a class="pull-right yqm hidden">兑换邀请码</a>
                </div>
            </div>
            <div class="panel panelbig overflows" >
            	<h1>查询结果酒店<span class="results">共<i><?php echo ($data["count"]); ?></i>条结果</span></h1>
                <div class="paixu">                	
                	<a class="down" val="recommend">推荐酒店</a>
                	<a class="down" val="good">好评</a>
                	<a class="up" val="prices">价格</a>
                	<a class="up" val="names">酒店名称</a>
                	<a class="down" val="stars">星级</a>
                </div>
            	<div class="tab">
                    <!-- Tab panes -->
                    <div class="tab-content">
                      <div class="tab-pane active">
                        <ul class="hot_hotels">                           
							<?php if(is_array($citylist)): foreach($citylist as $key=>$val): if(($key%2 == 1)): ?><li class="odd"><?php else: ?><li><?php endif; ?>
	                            	<div class="thumbnail">
	                                  <a href="<?php echo ($val["linkurl"]); ?>" target="_blank" ><img src="<?php echo ($val["litpic"]); ?>" alt="<?php echo ($val["title"]); ?>" width="127px" height="127px"></a>
	                                  <div class="caption">
	                                    <div><span><i class="tips">优惠</i>预订2日打8.5折</span></div>
	                                  </div>
	                                </div>
	                                <div class="hotels_intro">
	                                	<h4><a href="<?php echo ($val["linkurl"]); ?>" target="_blank" ><?php echo ($val["title"]); ?></a><span><?php echo ($val["stars"]); ?></span></h4>
	                                    <span><?php echo ($val["en_title"]); ?></span>
	                                    <p><?php echo ($val["address"]); ?></p>
	                                    <a class="get_map<?php echo ($val["aid"]); ?>" title="<?php echo ($val["title"]); ?>" onclick="getMap('<?php echo ($val["aid"]); ?>');" url="http://www.hotelclub.com/GetGMap.asp?lon=<?php echo ($val["map_x"]); ?>&lat=<?php echo ($val["map_y"]); ?>&h=440&w=665" target="_blank">查看地图</a>
	                                    <p class="hidden"><?php echo ($val["infos"]); ?>...</p>
										<a href="<?php echo ($val["linkurl"]); ?>" target="_blank" >更多详情>></a>
	                                </div>
	                                <div class="orderarea">
	                                	<div class="starbox">
	                                        <span class="s_name"><?php echo ($val["grade"]); ?>分</span>
	                                        <ul class="star_ul fl">
	                                            <li><a class="one-star <?php if(floor($val['grade']) == 1) echo 'active-star'; ?>" title="很差" href="#"></a></li>
	                                            <li><a class="two-star <?php if(floor($val['grade']) == 2) echo 'active-star'; ?>" title="差" href="#"></a></li>
	                                            <li><a class="three-star <?php if(floor($val['grade']) == 3) echo 'active-star'; ?>" title="还行" href="#"></a></li>
	                                            <li><a class="four-star <?php if(floor($val['grade']) == 4) echo 'active-star'; ?>" title="好" href="#"></a></li>
	                                            <li><a class="five-star <?php if(floor($val['grade']) == 5) echo 'active-star'; ?>" title="很好" href="#"></a></li>
	                                        </ul>
	                                        <span class="s_result fl" > </span>
	                                    </div>
	                                    <div class="dp"><?php echo ($val["numbers"]); ?>人点评</div>
										<div class="price_c">每间每晚&nbsp;&nbsp;<i class="price"><span class="price_data"><font class="price_type">￥</font><?php echo ($val["price"]); ?></span></i>起</div>
	                                    <div class="check_btn"><a href="<?php echo ($val["linkurl"]); ?>" target="_blank" class="btn btn-purp">查&nbsp;&nbsp;看</a></div>
	                                </div>
	                            </li><?php endforeach; endif; ?>
                        </ul>
                      </div>
                    </div>
                </div>
				<?php if(($data["count"] > $data.page_size)): ?><div class="paginations">
                    <div class="pagination"></div>
                </div><?php endif; ?>
            </div>            
        </div>
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
    // $(".end_date").datetimepicker({
    	// language:  'zh-CN',
        // todayBtn:  1,
		// autoclose: 1,
		// todayHighlight: 1,
		// startDate: '<?php echo ($date); ?>',//当前时间开始
		// startView: 2,
		// minView: 2,
		// forceParse: 0,
    	// format: 'yyyy-mm-dd'
    // });
    var _order = $("input[name='order']");
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
				 getPage(_order.val(),Page);
	         }
        }
    $('.pagination').bootstrapPaginator(options);
    $('.paixu').find('a').on('click',function(){
    	$('.paixu').find('a').removeClass("up_hover").removeClass("down_hover");    	
    	if($(this).hasClass("up")){
    		$(this).addClass("up_hover");
        }else{
        	$(this).addClass("down_hover");        	
        }
    	_order.val($(this).attr("val"));
    	getPage($(this).attr("val"),1);
    	$('.pagination').bootstrapPaginator(options);
    });	
	getAjaxCity(<?php echo ($data["keys_country"]); ?>);//加载国家
});

function getPage(order,page){
	var list_url = $("#search_page").serialize()+'&page='+page;
	$.post("/Search/getSearchPage",list_url,function(data){
		if(data == null) return;
 		var obj = eval('(' + data + ')');
        $('.hot_hotels').empty();
		append_obj(obj);
    });
}
</script>
</body>
</html>