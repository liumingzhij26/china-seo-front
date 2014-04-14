<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title><?php if(($data["seotitle"] == '')): echo ($data["typename"]); ?>酒店预订,<?php echo ($data["typename"]); ?>酒店推荐,<?php echo ($data["typename"]); ?>住宿攻略 - HotelClub<?php else: echo ($data["seotitle"]); ?> - HotelClub<?php endif; ?></title>
<meta name="keywords" content="<?php if(($data["keywords"] == '')): echo ($data["typename"]); ?>酒店预订,<?php echo ($data["typename"]); ?>酒店推荐,<?php echo ($data["typename"]); ?>住宿攻略,HotelClub<?php else: echo ($data["keywords"]); endif; ?>"> 
<meta name="description" content="<?php if(($data["description"] == '')): ?>HotelClub拥有丰富的<?php echo ($data["typename"]); ?>酒店资源，为您出行提供优质的<?php echo ($data["typename"]); ?>酒店预订和<?php echo ($data["typename"]); ?>酒店推荐服务，为前往<?php echo ($data["typename"]); ?>的您提供详细的住宿攻略。在HotelClub,我们帮助您以优惠的价格预订性价比高的<?php echo ($data["typename"]); ?>酒店，2-7折在线预订，现在就来体验吧！<?php else: echo ($data["description"]); endif; ?>">
<meta name="DCSext.seotype" content="NC|City"/>
<meta name="DCSext.seopage" content="NC|City|<?php echo ($data["typedir"]); ?>/"/>
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
		<li><a href="/">首页</a></li>
		<li><a href="__HT__/<?php echo ($position["t_typedir"]); ?>/"><?php echo ($position["t_typename"]); ?>酒店预订</a></li>
        <li><a href="__HT__/<?php echo ($position["p_typedir"]); ?>/"><?php echo ($position["p_typename"]); ?>酒店预订</a></li>
		<li class="active"><?php echo ($position["s_typename"]); ?>酒店预订</li>
		<?php if($data["weatherid"] != '0'): ?><div class="weather-ok pull-right" >
            <span class="weather-city-name"><a class="city-name" hidefocus=""><?php echo ($data["typename"]); ?>：</a></span>
            <span class="weather-today">
			<img id="weather_today_img" class="weather-today-img" src="<?php echo ($data["w_pic"]); ?>" width="30" height="30">
			<em class="weather-today-temp"><?php echo ($data["low"]); ?>~<?php echo ($data["high"]); ?>℃</em></span>
            <span class="weather-pollution hidden"><em class="sep">|</em><em class="air-level-label">空气质量：</em></span>
            <span id="s_weather_polution_content" class="weather-polution-img hidden" style="display:"><a target="_blank" id="new_weather_air_link" href="#" class="new-wearther-air-link weather-aq weather-aq-20">轻度污染</a></span>
        </div><?php endif; ?>		
	</ol>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">
			<div class="panel order panelsmall">
				<h2>酒店预订</h2>
				<form class="form-horizontal" role="form" id="search_from" method="post" action="/Search/">
				  <div class="form-group">
					<label for="inputEmail3" class="labell control-label">入住国家:</label>
					<div class="labelw">
						<select class="form-control" name="keys_country">
						<?php if(is_array($countryList)): foreach($countryList as $key=>$val): ?><option value="<?php echo ($val['id']); ?>" <?php if($val['id'] == $data['reid']): ?>selected<?php endif; ?>><?php echo ($val['typename']); ?></option><?php endforeach; endif; ?>
						</select>
					</div>
					<font class="msginfo">*</font>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="labell control-label">入住城市:</label>
					<div class="labelw">
						<select class="form-control" name="keys_city" datatype="*" nullmsg="*" errormsg="请选择城市">
						  <option value="">请选择城市</option>
						  <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["typename"]); ?></option>	
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
			<div class="mapcenter" id="map_list" style="z-index:999;height:220px;margin-bottom:15px;">
				
			</div>
        	<div class="panel panelsmall">
            	<h2><?php echo ($data["typename"]); ?>介绍</h2>
                <p style="text-indent:2em; margin:0;">想去<?php echo ($data["typename"]); ?>感受不一样的异域风情？一份详细的<?php echo ($data["typename"]); ?>住宿攻略是必修课。登录hotelclub酒店预订网，查看hotelclub为您精心准备的<?php echo ($data["typename"]); ?>酒店推荐，当美丽遇见舒适，旅行的体验也就到了极致。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;即刻登录hotelclub<?php echo ($data["typename"]); ?>酒店预订中心，整理行囊向<?php echo ($data["typename"]); ?>出发，感受来自<?php echo ($data["typename"]); ?>的独特魅力！</p>
            </div>
            <div class="panel panelsmall">
            	<h2><?php echo ($data["typename"]); ?>最新酒店</h2>
                <ul class="lists"><?php if(is_array($citylist)): foreach($citylist as $key=>$val): ?><li><a class="lists_a" href="<?php echo ($val["linkurl"]); ?>" target="_blank"><span class="glyphicon glyphicon-play"></span><?php echo ($val["title"]); ?></a></li><?php endforeach; endif; ?></ul>
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
        	<div class="panel panelbig" >
				<form id="search_city">
            	<div class="filters">	
					<ul><li>
					<input type="hidden" name="key_city_id" value="<?php echo ($data["id"]); ?>" data="no" pagesize="1" />
                	价格：</li><li>
                    <div><input type="radio" name="city_price" value="1" checked><a>不限</a></div>
					<div><input type="radio" name="city_price" value="(p < 200)"><a>200以内</a></div>
					<div><input type="radio" name="city_price" value="(p > 200 and p < 400)"><a>200-400</a></div>
					<div><input type="radio" name="city_price" value="(p > 400)"><a>400以上</a></div></li></ul>
                </div>
                <div class="filters">
                	<ul><li>星级：</li><li>
                    <div><input type="checkbox" name="stars_all" value="1"><a>不限</a></div>
					<div><input type="checkbox" name="city_stars[]" value="2"><a>二星以下</a></div>
					<div><input type="checkbox" name="city_stars[]" value="3"><a>三星</a></div>
					<div><input type="checkbox" name="city_stars[]" value="4"><a>四星</a></div>
					<div><input type="checkbox" name="city_stars[]" value="5"><a>五星级</a></div>
					</li></ul>
                </div>         
                <div class="filters">
                	<ul><li>品牌：</li><li>
					<div><input type="checkbox" name="chains_all" value="1"><a>不限</a></div>
					<div><input type="checkbox" name="chains[]" value="BW"><a>最佳西方</a></div>
					<div><input type="checkbox" name="chains[]" value="CY"><a>万怡</a></div>
					<div><input type="checkbox" name="chains[]" value="CP"><a>皇冠假日</a></div>
					<div><input type="checkbox" name="chains[]" value="DI"><a>戴斯</a></div>
					<div><input type="checkbox" name="chains[]" value="DT"><a>逸林</a></div>
					<div><input type="checkbox" name="chains[]" value="FA"><a>费尔蒙</a></div>
					<div><input type="checkbox" name="chains[]" value="FP"><a>福朋喜来登</a></div>
					<div><input type="checkbox" name="chains[]" value="FS"><a>四季</a></div>
					<div><input type="checkbox" name="chains[]" value="FRA"><a>辉盛国际公寓</a></div>
					<span class="chains_list hidden">
					<div><input type="checkbox" name="chains[]" value="GT"><a>金色郁金香</a></div>
					<div><input type="checkbox" name="chains[]" value="HL"><a>希尔顿</a></div> 
					<div><input type="checkbox" name="chains[]" value="EX"><a>智选假日</a></div>
					<div><input type="checkbox" name="chains[]" value="HI"><a>假日</a></div>
					<div><input type="checkbox" name="chains[]" value="IN"><a>英迪格</a></div>
					<div><input type="checkbox" name="chains[]" value="HJ"><a>豪生</a></div>
					<div><input type="checkbox" name="chains[]" value="HY"><a>凯悦</a></div>
					<div><input type="checkbox" name="chains[]" value="IC"><a>洲际</a></div>
					<div><input type="checkbox" name="chains[]" value="JT"><a>卓美亚</a></div>
					<div><input type="checkbox" name="chains[]" value="KI"><a>凯宾斯基</a></div>
					<div><input type="checkbox" name="chains[]" value="LO"><a>朗廷</a></div>       
					<div><input type="checkbox" name="chains[]" value="MD"><a>艾美</a></div>    
					<div><input type="checkbox" name="chains[]" value="MC"><a>万豪</a></div>     
					<div><input type="checkbox" name="chains[]" value="MU"><a>千禧国尊</a></div>
					<div><input type="checkbox" name="chains[]" value="XN"><a>雅高诺富特</a></div>
					<div><input type="checkbox" name="chains[]" value="PN"><a>半岛</a></div>
					<div><input type="checkbox" name="chains[]" value="PU"><a>铂尔曼</a></div>
					<div><input type="checkbox" name="chains[]" value="RAD"><a>丽笙</a></div>
					<div><input type="checkbox" name="chains[]" value="RA"><a>华美达</a></div>
					<div><input type="checkbox" name="chains[]" value="BR"><a>万丽</a></div>
					<div><input type="checkbox" name="chains[]" value="RZ"><a>丽思卡尔顿</a></div>     
					<div><input type="checkbox" name="chains[]" value="SG"><a>香格里拉</a></div>
					<div><input type="checkbox" name="chains[]" value="SI"><a>喜来登</a></div>
					<div><input type="checkbox" name="chains[]" value="VS"><a>索菲特</a></div>
					<div><input type="checkbox" name="chains[]" value="SE"><a>速8</a></div>
					<div><input type="checkbox" name="chains[]" value="SL"><a>瑞士酒店</a></div>
					<div><input type="checkbox" name="chains[]" value="LC"><a>豪华精选</a></div>
					<div><input type="checkbox" name="chains[]" value="TI"><a>西斯特</a></div>
					<div><input type="checkbox" name="chains[]" value="WA"><a>华尔道夫</a></div>
					<div><input type="checkbox" name="chains[]" value="WI"><a>威斯汀</a></div>
					<div><input type="checkbox" name="chains[]" value="SW"><a>世尊</a></div>
					<div><input type="checkbox" name="chains[]" value="WY"><a>温德姆</a></div></span>
					<div><a href="#" class="chains_more">显示更多>></a></div>
					</li></ul>
                </div>
                <div class="filters">
                	<ul><li>设施：</li><li>
					<div><input type="checkbox" name="amens_all" value="1"><a>不限</a></div>
					<div><input type="checkbox" name="amens[]" value="REST"><a>餐厅</a></div>
					<div><input type="checkbox" name="amens[]" value="GOLF"><a>高尔夫球</a></div>
					<div><input type="checkbox" name="amens[]" value="INTHS"><a>高速网路</a></div>
					<div><input type="checkbox" name="amens[]" value="PETS"><a>欢迎宠物的</a></div>
					<div><input type="checkbox" name="amens[]" value="ORBSHT"><a>机场接送</a></div>
					<div><input type="checkbox" name="amens[]" value="ORBGYM"><a>健身房</a></div>
					<div><input type="checkbox" name="amens[]" value="POOL"><a>游泳池</a></div>				
					<div><input type="checkbox" name="amens[]" value="BAR"><a>酒吧/酒廊</a></div>
					<div><input type="checkbox" name="amens[]" value="OTA_P_903"><a>禁烟</a></div>				
					<div><input type="checkbox" name="amens[]" value="FPRKNG"><a>免费停车</a></div>
					<div><input type="checkbox" name="amens[]" value="BUSCTR"><a>商务中心</a></div>				  
					<div><input type="checkbox" name="amens[]" value="ORBSPA"><a>水疗服务</a></div>
					<div><input type="checkbox" name="amens[]" value="BABY"><a>托儿服务</a></div>
					<div><input type="checkbox" name="amens[]" value="TENNIS"><a>网球</a></div>				  
					<div><input type="checkbox" name="amens[]" value="ORBWLS"><a>无线上网</a></div>
					</li></ul>
                </div>
				<?php if(($data["scenic"] != null)): ?><div class="filters">
                	<ul><li>位置：</li><li>
					<div><input type="checkbox" name="scenic_all" value="1"><a>不限</a></div>
					<?php if(is_array($data["scenic"])): foreach($data["scenic"] as $key=>$val): if(($key < 10)): ?><div><input type="checkbox" name="scenic[]" value="<?php echo ($val['id']); ?>"><a><?php echo ($val['name']); ?></a></div><?php endif; ?>						
						<?php if(($key >= 10)): ?><span class="scenic_list hidden">
							<div><input type="checkbox" name="scenic[]" value="<?php echo ($val['id']); ?>"><a><?php echo ($val['name']); ?></a></div>
						</span><?php endif; ?>
						<?php if(($key > 10)): if(($key == count($data['scenic'])-1)): ?><div><a href="#" class="scenic_more">显示更多>></a></div><?php endif; endif; endforeach; endif; ?>
					</li></ul>
                </div><?php endif; ?>
				</form>
				<div class="filters text-center" id="infos" style="color:red"></div>
            </div>
            <div class="panel panelbig overflows" >
            	<h1><?php echo ($data["typename"]); ?>酒店预订<span class="results">共<i id="total_num"><?php echo ($data["count"]); ?></i>条结果</span></h1>
                <div class="paixu">
                	<input type="hidden" name="order" value="recommend" />
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
	                                 <a href="<?php echo ($val["linkurl"]); ?>" target="_blank" ><img xsrc="__static__/images/nopic.jpg" src="<?php echo ($val["litpic"]); ?>" class="pic_load" value="<?php echo ($val["aid"]); ?>" alt="<?php echo ($val["title"]); ?>" width="127px" height="127px"></a>
	                                  <div class="caption">
	                                    <div><span><i class="tips">优惠</i>预订2日打8.5折</span></div>
	                                  </div>
	                                </div>
	                                <div class="hotels_intro">
	                                	<h4><a href="<?php echo ($val["linkurl"]); ?>" target="_blank" ><?php echo ($val["title"]); ?></a><span><?php echo ($val["stars"]); ?></span></h4>
	                                    <span><?php echo ($val["en_title"]); ?></span>
	                                    <p><?php echo ($val["address"]); ?></p>
	                                    <a class="get_map<?php echo ($val["aid"]); ?>" lon="<?php echo ($val["map_x"]); ?>" lat="<?php echo ($val["map_y"]); ?>" price="<?php echo ($val["price"]); ?>" title="<?php echo ($val["title"]); ?>" onclick="getMap('<?php echo ($val["aid"]); ?>');" url="http://www.hotelclub.com/GetGMap.asp?lon=<?php echo ($val["map_x"]); ?>&lat=<?php echo ($val["map_y"]); ?>&h=440&w=665" target="_blank">查看地图</a><p class='hidden'><?php echo ($val["infos"]); ?>...</p><a href="<?php echo ($val["linkurl"]); ?>" target="_blank" style="margin-left:3px;">更多详情>></a>
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
                <?php if(($data["count"] > $data['page_size'])): ?><div class="paginations">
                    <div class="pagination"></div>
                </div><?php endif; ?>
            </div>			
            <div class="posit">
            	<span><?php echo ($position["t_typename"]); ?>热门国家：</span>
            	<ul class="state_country">
                	<?php if(is_array($continentlist)): foreach($continentlist as $key=>$vs): ?><li><a href="__HT__/<?php echo ($vs["typedir"]); ?>"><?php echo ($vs["typename"]); ?></a></li><?php endforeach; endif; ?>
                </ul>
             </div>
        </div>
    </div>
</div>
<!--<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>-->
<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB0jxNMV27t28u0FNTyMKHgUaOhJ7NcWvo&sensor=false"></script>
<script src="__static__/js/jquery.min.js"></script>
<script src="__static__/js/jquery.cookie.js"></script>
<script src="__static__/js/bootstrap.min.js"></script>
<script src="__static__/js/bootstrap-paginator.js"></script>
<script src="__static__/js/bootstrap-datetimepicker.min.js"></script>
<script src="__static__/js/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="__static__/js/common.js"></script>
<script src="__static__/js/base.js"></script>
<script src="__static__/js/jquery.pin.js"></script>
<script src="__static__/js/maplace.js"></script>
<script src="__static__/js/ajax.js"></script>
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
	
    var _order = $("input[name='order']");
	var _key_city_id= $("input[name='key_city_id']");
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
			 onPageChanged: function(e,oldPage,page){	
				//getPage(_order.val(),Page);
				var _key_city_id= $("input[name='key_city_id']");
				var _order = $("input[name='order']");
				if(_key_city_id.attr("data") == "yes"){
					var _list = $("#search_city").serialize();
					_list = _list + "&page="+page+"&order="+_order.val();
					$.post("/City/getSearchPageCity/",_list,function(data){
						if(data == 0){
							$("#infos").show().text("没有找到要查询的数据！");
							return;
						}else{
							var obj = eval('(' + data + ')');  
							$('.hot_hotels').empty();
							append_obj(obj.list);	
							Map_list();								
							$("#infos").hide();
						}
					});
				}else{
					$.get("/city/getCityPage/typeid-<?php echo ($data["id"]); ?>-page-"+page+'-order-'+_order.val(),function(data){
						if(data == 0){
							$("#infos").show().text("没有找到要查询的数据！");
							return;
						}else{
							var obj = eval('(' + data + ')');  
							$('.hot_hotels').empty();
							_key_city_id.attr("data","yes");
							_key_city_id.attr("pagesize",obj.total);
							append_obj(obj.list);	
							Map_list();	
							$("#infos").hide();
						}
					});
				}
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
		Map_list();	
    });	
		
	$("#search_city").find("input").click(function(){
		var _list = $("#search_city").serialize();
		var _order = $("input[name='order']");
		_list = _list + "&page=1&order="+_order.val();
		$.post("/City/getSearchPageCity/",_list,function(data){
			if(data == 0){
				$("#infos").show().text("没有找到要查询的数据！");
				return;
			}else{
				var obj = eval('(' + data + ')');  
				$("#total_num").text(obj.count);
				$('.hot_hotels').empty();
				_key_city_id.attr("data","yes");
				_key_city_id.attr("pagesize",obj.total);
				append_obj(obj.list);
				$('.pagination').bootstrapPaginator({
					currentPage: 1,
					totalPages: obj.total
				});
				$("#infos").hide();
				Map_list();	
			}
		});
	});
	
	var city_stars = $("input[name='city_stars[]']");
	city_stars.click(function(){
		var _this = $(this);
		if(_this.attr("checked")){
			$("input[name='stars_all']").removeAttr("checked");
			_this.removeAttr("checked");			
		}else{
			_this.attr("checked",'true');
			$("input[name='stars_all']").removeAttr("checked");
		}
	});
	
	$("input[name='stars_all']").click(function(){
		var _this = $(this);
		if(_this.attr("checked")){			
			_this.removeAttr("checked");
			city_stars.removeAttr("checked");			
		}else{
			city_stars.removeAttr("checked");
			_this.attr("checked",'true');
		}	
	});
	
	
	var chains = $("input[name='chains[]']");
	chains.click(function(){
		var _this = $(this);
		if(_this.attr("checked")){
			$("input[name='chains_all']").removeAttr("checked");
			_this.removeAttr("checked");			
		}else{
			_this.attr("checked",'true');
			$("input[name='chains_all']").removeAttr("checked");
		}
	});
	$("input[name='chains_all']").click(function(){
		var _this = $(this);
		if(_this.attr("checked")){			
			_this.removeAttr("checked");
			chains.removeAttr("checked");			
		}else{
			chains.removeAttr("checked");
			_this.attr("checked",'true');
		}	
	});
	var scenic = $("input[name='scenic[]']");
	$("input[name='scenic_all']").click(function(){
		var _this = $(this);
		if(_this.attr("checked")){			
			_this.removeAttr("checked");
			scenic.removeAttr("checked");			
		}else{
			scenic.removeAttr("checked");
			_this.attr("checked",'true');
		}	
	});
	
	scenic.click(function(){
		var _this = $(this);
		if(_this.attr("checked")){
			$("input[name='scenic_all']").removeAttr("checked");
			_this.removeAttr("checked");			
		}else{
			_this.attr("checked",'true');
			$("input[name='scenic_all']").removeAttr("checked");
		}
	});
	var amens = $("input[name='amens[]']");
	amens.click(function(){
		var _this = $(this);
		if(_this.attr("checked")){
			$("input[name='amens_all']").removeAttr("checked");
			_this.removeAttr("checked");			
		}else{
			_this.attr("checked",'true');
			$("input[name='amens_all']").removeAttr("checked");
		}
	});
	
	$("input[name='amens_all']").click(function(){
		var _this = $(this);
		if(_this.attr("checked")){			
			_this.removeAttr("checked");
			amens.removeAttr("checked");			
		}else{
			amens.removeAttr("checked");
			_this.attr("checked",'true');
		}	
	});
	$(".filters").find("a").click(function(){
		var _this = $(this).prev();
		
	});
	$(".chains_more").click(function(){		
		var _this = $(this);
		if($(".chains_list").hasClass("hidden")){
			_this.text("隐藏更多");
			$(".chains_list").removeClass("hidden");
		}else{
			$(".chains_list").addClass("hidden");
			_this.text("显示更多");
		}
	});		
	$(".scenic_more").click(function(){		
		var _this = $(this);
		if($(".scenic_list").hasClass("hidden")){
			_this.text("隐藏更多");
			$(".scenic_list").removeClass("hidden");
		}else{
			$(".scenic_list").addClass("hidden");
			_this.text("显示更多");
		}
	});
	$("#map_list").pin();
	var maplace = new Maplace({
		map_div: '#map_list',		
		controls_type: 'list',
		type: 'marker',
		controls_on_map : false,//显示
	});
	var showGroup = function(data){
		maplace.Load({
          locations: data,
          force_generate_controls: true
        });
	}
	
	var timeout = false;  
	$(window).on('scroll',function(){
		Map_list();				
	});
	var MapAuto = function(obj){
		var len = obj.length;
		var list = [];
		for(var i=0;i<len;i++){
			var _this = $('[value=\''+obj[i]+'\']');
			var _get_map = $('.get_map'+obj[i]);
			var map = {
				lat : _get_map.attr("lat"),
				lon : _get_map.attr("lon"),
				title : _get_map.attr("title"),
				html : _get_map.attr("title") + ' ￥'+_get_map.attr("price"),
				icon : '/static/images/hc-mapPointer.png',
				zoom : 16	
			}
			list[i] = map;			
		}
		return list;
	}
	var Map_list = function(){
		if (timeout){
			clearTimeout(timeout);
		}   
		timeout = setTimeout(function(){
			var obj = [];
			var pic_load = $(".pic_load");
			for(var i=0;i<pic_load.length;i++){			
				var _this = pic_load.eq(i);
				//$.debug(_this.offset().top +' '+$.lmz.Point.getY() +' '+getScroll().top);
				if($.lmz.Point.getY() + getScroll().top - _this.offset().top <= $.lmz.Point.getY() && $.lmz.Point.getY() + getScroll().top - _this.offset().top > 0){
					obj.push($(_this).attr("value"));					
				}
			}
			var list = MapAuto(obj);
			showGroup(list);
		},1000); 
	}
	Map_list();//地图	
});

function getPage(order_val,page){
	var _key_city_id= $("input[name='key_city_id']");
	var _order = $("input[name='order']");
	if(_key_city_id.attr("data") == "yes"){
		var _list = $("#search_city").serialize();
		_list = _list + "&page="+page+"&order="+_order.val();
		$.post("/City/getSearchPageCity/",_list,function(data){
			if(data == 0){
				$("#infos").show().text("没有找到要查询的数据！");
				return;
			}else{
				var obj = eval('(' + data + ')');  
				$('.hot_hotels').empty();
				append_obj(obj.list);
				$('.pagination').bootstrapPaginator({
					currentPage: 1,
					totalPages: obj.total
				});				
				$("#infos").hide();
			}
		});
	}else{
		$.get("/city/getCityPage/typeid-<?php echo ($data["id"]); ?>-page-"+page+'-order-'+order_val,function(data){
			if(data == 0){
				$("#infos").show().text("没有找到要查询的数据！");
				return;
			}else{
				var obj = eval('(' + data + ')');  
				$('.hot_hotels').empty();
				_key_city_id.attr("data","yes");
				_key_city_id.attr("pagesize",obj.total);
				append_obj(obj.list);				
				$("#infos").hide();
			}
		});
	}
}
</script>
</body>
</html>