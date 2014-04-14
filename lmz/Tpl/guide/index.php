<!DOCTYPE html>
<html>
<head>
<title>出国旅游攻略2014,出国旅游攻略大全,境外旅游酒店推荐-HotelClub</title>
<meta name="keywords" content="出国旅游,旅游攻略2014,旅游攻略大全,境外旅游,境外酒店推荐,HotelClub"> 
<meta name="description" content="最权威的出国旅游攻略大全，2014最新出国旅游攻略，境外热门旅游景点，酒店推荐，提供最佳的自助游，自由行攻略指南，尽在HotelClub国外旅游攻略。HotelClub旅游，让旅游更轻松！">
<include file="Public:guide_header_style" />
<style>
.slidedown ol.carousel-indicators{background: #fff;}
</style>
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="#">首页</a></li>
		<li class="active">旅游攻略</li>
	</ol>
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
    	<div class="col-3">
        	<div class="panel pop">
				<foreach name="type_list" item="val" key="key">			
				<if condition="($val['ranks'] eq '1')">
            	<div class="popwindow">
                    <h4><a>{$val['typename']}</a><span>&gt;</span></h4>
                    <div>
					<php> $i=0; $s=0;</php>
					<foreach name="type_list" item="val2" key="key2">
						<if condition="($val['id'] eq $val2['reid'])">
							<if condition="($i lt 3)">
								<a href="/{$val2['typedir']}-guide/">{$val2['typename']}</a>
								<php>$i++;</php>
							</if>
						</if>
					
					</foreach>
					</div>
                    <div class="pops"><span>
					<foreach name="type_list" item="val3" key="key3">
						<if condition="($val3['ranks'] eq '3')">
							<if condition="($val['id'] eq $val3['topid'])">								
								<if condition="($s lt 15)">
									<a href="/{$val3['typedir']}-guide/">{$val3['typename']}</a>
									<php>$s++;</php>
								</if>
							</if>					
						</if>					
					</foreach></span>
                    </div>
                </div>
				</if>
                </foreach>
            </div>
        </div>
        <div class="col-9 left-clear">
        	<div class="slides slidedown">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
				<foreach name="data.auto" item="val" key="key">					
                <li data-target="#carousel-example-generic" data-slide-to="{$key}" <if condition="($key eq 0)"> class="active"</if>><img src="{$val['litpic']}" width="138px" height="88px"></li> </if>
				</foreach>				
              </ol>
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
				<foreach name="data.auto" item="val" key="key">		
					<div class="item <if condition="($key eq 0)">active</if>">
						<a href="/guide-{$val['id']}.html"><img src="{$val['litpic']}" alt="{$val['title']}" width="656px" height="375px"></a>
					</div>
                </foreach>
              </div>
            </div>

            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel">
		<div class="head1">
			<h1 style="font-size:16px;">出国旅游攻略</h1>
			<span class="more_right" style="top:10px"><a href="/list-guide/">更多出国旅游攻略&gt;&gt;</a></span>
		</div>
        <div class="w280">
        	<div><img src="__static__/images/travel/images/trav_14.jpg"></div>
            <h3>经典攻略</h3>
            <ul class="ulhalf">			
			<foreach name="data.scriptures" item="val" key="key">
            	<li><a href="/guide-{$val['id']}.html"><span class="glyphicon glyphicon-play"></span>{$val['shorttitle']}</a></li>
			</foreach>
            </ul>
        </div>
        <div class="w318">
        	<h2><a href="/guide-{$data['headline_one']['id']}">{$data['headline_one']['title']|msubstr=0,15,'utf-8'}</a></h2>
            <p><foreach name="data.headline" item="val" key="key"><span>[<a href="/guide-{$val['id']}.html">{$val['shorttitle']}</a>]</span></foreach></p>
            <ul>
				<foreach name="data.headline_pubdate" item="val" key="key">
					<li><a href="/guide-{$val['id']}.html">{$val['title']}</a><span>[<a href="/{$val['typedir']}-guide/">{$val['typename']}</a>]</span></li>
				</foreach>
            </ul>
        </div>
        <div class="w292">
        	<h3>出国旅游攻略排行榜</h3>
            <ul class="hs">
				<foreach name="data.headline_click" item="val" key="key">
            	<li <if condition="($key eq 0)">class="active"</if>>
                	<a href="/guide-{$val['id']}.html">{$val['title']}</a>
                	<div class="showall">
                        <div class="thumbnail"><if condition="($val['litpic'] eq '')"><img src="__static__/images/travel/images/xa.png" width="71px" height="71px"><else/><img src="{$val['litpic']}" width="71px" height="71px"></if></div>
                        <h3><a href="/guide-{$val['id']}.html">{$val['title']}</a></h3>
                        <p>{$val['description']|msubstr=0,30,'utf-8'}...</p>
                    </div>
                </li>   
				</foreach>
            </ul>
        </div>
        <div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div class="panel">
		<div class="head1">
			<h2>出国旅游目的地</h2>
		</div>
		<div class="seasons">
        	<div class="thumbnail">
            	<img src="__static__/images/travel/images/chun.jpg">
            </div>
            <ul>
            	<li><a href="/China/">中国</a><span>[<a href="/Shanghai-guide/">上海</a> <a href="/Xi-An-guide/">西安</a> <a href="/Xiamen-guide/">厦门</a> <a href="/Chengdu-guide/">成都</a>]</span></li>
                <li><a href="/South-Korea/">韩国</a><span>[<a href="/Seoul-guide/">首尔</a> <a href="/Busan-guide/">釜山</a> <a href="/Jeju-guide/">济州</a> <a href="/Gyeongju-guide/">庆州</a>]</span></li>
                <li><a href="/Japan/">日本</a><span>[<a href="/Tokyo-guide/">东京</a> <a href="#">大阪</a> <a href="#">名古屋</a> <a href="#">横浜</a>]</span></li>
                <li><a href="/Turkey/">土耳其</a><span>[<a href="/Istanbul-guide/">伊斯坦布尔</a> <a href="#">安卡拉</a> <a href="#">伊兹密尔</a>]</span></li>
                <li><a href="/Spain/">西班牙</a><span>[<a href="/Barcelona-guide/">巴塞罗那</a> <a href="/Madrid-guide/">马德里</a> <a href="/Seville-guide/">塞维利亚</a>]</span></li>
            </ul>
        </div>
        <div class="seasons">
        	<div class="thumbnail">
            	<img src="__static__/images/travel/images/xia.jpg">
            </div>
            <ul>
            	<li><a href="/Netherlands/">荷兰</a><span>[<a href="/Amsterdam-guide/">阿姆斯特丹</a> <a href="#">鹿特丹</a> <a href="#">埃因霍温</a>]</span></li>
                <li><a href="/Spain/">西班牙</a><span>[<a href="/Barcelona-guide/">巴塞罗那</a> <a href="/Madrid-guide/">马德里</a> <a href="/Seville-guide/">塞维利亚</a>]</span></li>
                <li><a href="/France/">法国</a><span>[<a href="/Paris-guide/">巴黎</a> <a href="/Nice-guide/">尼斯</a> <a href="/Marseille-guide/">马赛</a> <a href="/Lyon-guide/">里昂</a>]</span></li>
                <li><a href="/Thailand/">泰国</a><span>[<a href="/Bangkok-guide/">曼谷</a> <a href="/Phuket-guide/">普吉岛</a> <a href="/Samui-guide/">苏梅岛</a> <a href="/Pattaya-guide/">芭堤雅</a>] </span></li>
                <li><a href="/Philippines/">菲律宾</a><span>[<a href="/Manila-guide/">马尼拉</a> <a href="/Cebu-guide/">宿务市</a> <a href="/Boracay-guide/">长滩岛</a> <a href="/Davao-guide/">达沃</a>]</span></li>
            </ul>
        </div>
        <div class="seasons">
        	<div class="thumbnail">
            	<img src="__static__/images/travel/images/qiu.jpg">
            </div>
            <ul>
            	<li><a href="/United-States/">美国</a><span>[<a href="/Los-Angeles-guide/">洛杉矶</a> <a href="/San-Francisco-guide/">旧金山</a> <a href="/Hawaii-Hawaii-Big-Island-guide/">夏威夷岛</a> <a href="/Manila-guide/">波士顿</a>]</span></li>
                <li><a href="/Canada/">加拿大</a><span>[<a href="#">温哥华</a> <a href="#">阿克拉维克</a> <a href="#">渥太华</a>] </span></li>
                <li><a href="/Portugal/">葡萄牙</a><span>[<a href="#">亚威罗</a> <a href="#">贝雅</a> <a href="#">布拉加</a> <a href="#">布拉干萨</a>]</span></li>
                <li><a href="/Germany/">德国</a><span>[<a href="/Berlin-guide/">柏林</a> <a href="/Munich-guide/">慕尼黑</a> <a href="/Hamburg-guide/">汉堡</a> <a href="/Dusseldorf-guide/">杜塞尔多夫</a>] </span></li>
                <li><a href="/Hong-Kong/">香港</a><span>[<a href="/Hong-Kong-city-guide/">香港</a>]</span></li>
            </ul>
        </div>
        <div class="seasons">
        	<div class="thumbnail">
            	<img src="__static__/images/travel/images/dong.jpg">
            </div>
            <ul>
            	<li><a href="/Australia/">澳大利亚</a><span>[<a href="/Melbourne-guide/">墨尔本</a> <a href="/Sydney-guide/">悉尼</a> <a href="/Cairns-guide/">凯恩斯</a> <a href="#">布里斯班</a>]</span></li>
                <li><a href="/New-Zealand/">新西兰</a><span>[<a href="#">惠灵顿</a> <a href="/Auckland-guide/">奥克兰</a> <a href="/Christchurch-guide/">基督城</a> <a href="#">达尼丁</a>] </span></li>
                <li><a href="/Malaysia/">马来西亚</a><span>[<a href="/ Kuala-Lumpur-guide/">吉隆坡</a> <a href="/Penang-island-guide/">槟城</a> <a href="/Langkawi-guide/">兰卡威</a> <a href="/Johor-Bahru-guide/">新山</a>]</span></li>
                <li><a href="/Philippines/">菲律宾</a><span>[<a href="/Manila-guide/">马尼拉</a> <a href="/Cebu-guide/">宿务市</a> <a href="/Boracay-guide/">长滩岛</a> <a href="/Davao-guide/">达沃</a>] </span></li>
                <li><a href="/Italy/">意大利</a><span>[<a href="/Rome-guide/">罗马</a> <a href="/Venice-guide/">威尼斯</a> <a href="/Milan-guide/">米兰</a> <a href="/Florence-guide/">佛罗伦萨</a>]</span></li>
            </ul>
        </div>
        <div class="clearfix"></div>
	</div>
</div>
<div class="container">
	<div class="panel">
		<div class="head1">
			<h2>出国旅游酒店</h2>
		</div>
		<foreach name="data.hotel_hot" item="val" key="key">
        <div class="w202">
        	<div class="thumbnail">
           		<img src="{$val['litpic']}" width="162px" height="100px" /> 
            </div>
            <div class="caption">
                <h4>{$val['title']|msubstr=0,9,'utf-8',false} <span>{$val['stars']}</span></h4>
                <p>{$val['infos']|msubstr=0,30,'utf-8',false}...<a>查看详情>></a></p>
                <div class="prise"><div class="prisebtn">￥<span>{$val['price']}</span>起</div><span>￥<php>echo $val['price']*1.8;</php></span></div>
                <p><a href="#" class="btn btn-center" role="button">Button</a></p>
			</div>
        </div>      
        </foreach>
        <div class="lefts">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="hs">境外酒店推荐</li>
          <li class="active"><a href="#new" data-toggle="tab">最新</a></li>
          <li><a href="#hot" data-toggle="tab">最热</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="new">
          	<div class="w292">
                <ul class="hs">
				<foreach name="data.hotel_pubdate" item="val" key="key">
            	<li <if condition="($key eq 0)">class="active"</if>>
                	<a href="/guide-{$val['id']}.html">{$val['title']}</a>
                	<div class="showall">
                        <div class="thumbnail"><if condition="($val['litpic'] eq '')"><img src="__static__/images/travel/images/xa.png" width="71px" height="71px"><else/><img src="{$val['litpic']}" width="71px" height="71px"></if></div>
                        <h3<a href="/guide-{$val['id']}.html">{$val['title']}</a></h3>
                        <p>{$val['description']|msubstr=0,30,'utf-8'}...</p>
                    </div>
                </li>
                </foreach>
            </ul>
            </div>
          </div>
          <div class="tab-pane" id="hot">
          	<div class="w292">
                <ul class="hs">
            	<foreach name="data.hotel_click" item="val" key="key">
            	<li <if condition="($key eq 0)">class="active"</if>>
                	<a href="/guide-{$val['id']}.html">{$val['title']}</a>
                	<div class="showall">
                        <div class="thumbnail"><if condition="($val['litpic'] eq '')"><img src="__static__/images/travel/images/xa.png" width="71px" height="71px"><else/><img src="{$val['litpic']}" width="71px" height="71px"></if></div>
                        <h3<a href="/guide-{$val['id']}.html">{$val['title']}</a></h3>
                        <p>{$val['description']|msubstr=0,30,'utf-8'}...</p>
                    </div>
                </li>
                </foreach>                
            </ul>
            </div>
          </div>
        </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
	<div class="panel padding">
    	<p style="margin-bottom:0;">HotelClub国际酒店预订网为您提供泰国、新加坡、马尔代夫、欧洲、美国等国外旅游攻略信息，包括自助游、自由行攻略指南，您可以在这里查询最新出国旅游攻略，境外热门旅游景点，酒店推荐信息，了解中外文化差异，国外风俗习惯等。旅游是一种心情，也是一种态度。携手Hotelclub，出国旅游，感受别样的异域风情！</p>
        HotelClub服务热线：4001202945
    </div>
</div>
<include file="Public:footer" />
<include file="Public:guide_header_js" />
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
	$(".popwindow").hover(function(){	
		var _width = 0,_a = $(this).find("div.pops").find("span").find("a");
		_fontX = '';
		$.each(_a,function(i,n){	
			_fontX += $(n).text();			
		});
		_width = _fontX.length*18;
		if(_width > 0 && _width < 530){
			$(this).find("div.pops").width(_width);
		}
		$(this).find("div.pops").toggle();		
	});
	
	$(".hs li").hover(function(){
	  $(this).addClass("active");
	  $(this).siblings("li").removeClass("active")
	});
});

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
