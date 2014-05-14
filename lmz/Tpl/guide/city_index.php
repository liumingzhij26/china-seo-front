<!DOCTYPE html>
<html>
<head>
<title>去{$data.obj.typename}旅游攻略2014,{$data.obj.typename}旅游攻略大全,{$data.obj.typename}自助游攻略-HotelClub</title>
<meta name="keywords" content="去{$data.obj.typename}旅游,旅游攻略2014,{$data.obj.typename}旅游攻略大全,{$data.obj.typename}自助游攻略,HotelClub"> 
<meta name="description" content="2014去{$data.obj.typename}旅游实用攻略,HotelClub提供全面的{$data.obj.typename}旅游攻略,包含{$data.obj.typename}热门景点介绍、{$data.obj.typename}美食、{$data.obj.typename}购物、{$data.obj.typename}旅游酒店推荐、{$data.obj.typename}旅游注意事项等。更多{$data.obj.typename}自助游攻略信息尽在HotelClub旅游攻略。">
<include file="Public:guide_header_style" />
<!--引用百度地图API-->
<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="/">首页</a></li>
        <li><a href="/guide/">旅游攻略</a></li>
		<li class="active">{$data.obj.typename}旅游攻略</li>
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
            <div id="carousel-example-generic" class="carousel slide <if condition="($data['auto'] eq '')"> hidden</if>" data-ride="carousel">
              <!-- Indicators -->
              <div class="heads">
              	<h1>{$data.obj.typename}旅游攻略2014</h1>
              </div>
              <ol class="carousel-indicators">
              	<foreach name="data.auto" item="val" key="key">	
                <li data-target="#carousel-example-generic" data-slide-to="{$key}" <if condition="($key eq 0)"> class="active"</if>><img src="{$val['litpic']}" width="70px" height="70px"></li>
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
                    <h2>{$data.obj.typename}旅游攻略概述</h2>
                </div>
                <p class="pintro">
				<if condition="($data['obj']['content'] neq 'content')">{$data.obj.content}<else/>2014去{$data.obj.typename}旅游实用攻略,HotelClub提供全面的{$data.obj.typename}旅游攻略,包含{$data.obj.typename}热门景点介绍、{$data.obj.typename}美食、{$data.obj.typename}购物、{$data.obj.typename}旅游酒店推荐、{$data.obj.typename}旅游注意事项等。更多{$data.obj.typename}自助游攻略信息尽在HotelClub旅游攻略。</if>
				</p>
            </div>
            <div class="panel <if condition="($img_lists eq null)"> hidden</if>">
            	<div class="head1">
                    <h2>{$data.obj.typename}热门旅游景点</h2>
                </div>
            	<ul id="carousel" class="elastislide-list">				
					<foreach name="img_lists" item="val" key="key">	
						<li><a><img src="{$val['url']}" alt="{$val['title']}" width="141px" height="98px" /><span>{$val['title']}</span></a></li>
					</foreach>
				</ul>     
            </div>
            <div class="panel">
            	<div class="head1">
                    <h2>去{$data.obj.typename}旅游攻略2014</h2>
                    <ul class="nav nav-tabs">
						<input type="hidden" name="guide_form" value="click" />	
						<li class="active"><a href="#hot" value='click' data-toggle="tab">热门</a></li>
						<li><a href="#new" value='pubdate' data-toggle="tab">最新</a></li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane active" id="hot">
                    	<foreach name="data.list" item="val" key="key">
						<div class="posts">
                            <div class="thumbnail">
								<if condition="($val['litpic'] eq '')">
                                <a href="/guide-{$val['id']}.html"><img src="__static__/images/travel/screenshoot.jpg" /></a>
								<else/>
								<a href="/guide-{$val['id']}.html"><img src="{$val['litpic']}" width='178px' height='115px' /></a>
								</if>
                            </div>
                            <div class="posts_cont">
                                <h3><a href="/guide-{$val['id']}.html">{$val['title']}</a></h3>
                                <div class="views">浏览<span>{$val['click']}</span></div>
                                <div><span>作者：{$val['writer']}</span><span>发表时间：{$val['pubdate']|date="Y-m-d",###}</span><span>分类：<a href="/{$val['typedir']}-guide/">{$val['typename']}</a></span></div>
                                <p>{$val['description']}...<a>查看全文>></a></p>
                            </div>
                        </div>
                        </foreach> 
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
	            	<li class="sl_1"><a <if condition="($data.explain neq '')">href="/guide-{$data.explain.id}.html"</if> class="btn btn-default">{$data.obj.typename}概况<i></i></a></li>
                    <li class="sl_2"><a <if condition="($data.scene neq '')">href="/guide-{$data.scene.id}.html"</if> class="btn btn-default">{$data.obj.typename}景点<i></i></a></li>
                    <li class="sl_3"><a href="/{$data.obj.typedir}-guide-list/" class="btn btn-default">{$data.obj.typename}游记<i></i></a></li>
                    <li class="sl_4"><a href="/{$data.obj.typedir}/" class="btn btn-default">{$data.obj.typename}酒店<i></i></a></li>
                    <li class="sl_5"><a class="btn btn-default get_map{$data['hot_list'][0]['aid']}" title="{$val.title}" onclick="getMap_list('{$data['hot_list'][0]['aid']}');" url="http://www.hotelclub.com/GetGMap.asp?lon={$data['hot_list'][0]['map_x']}&lat={$data['hot_list'][0]['map_y']}&h=800&w=800" target="_blank">{$data.obj.typename}地图<i></i></a></li>
            	</ul>
            </div>
            <div style="width:276px;height:210px;border:#ccc solid 1px; margin-bottom:10px;" id="dituContent">
			<iframe width="276px" height="210px" style="margin-bottom:5px;" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://www.hotelclub.com/GetGMap.asp?lon={$data['hot_list'][0]['map_x']}&lat={$data['hot_list'][0]['map_y']}&h=210&w=276"></iframe>			
			</div>
			
            <div class="panel">
            	<h2>{$data.obj.typename}最新自助游攻略</h2>
                <span class="more_right"><a href="/{$data.obj.typedir}-guide-list/">更多&gt;&gt;</a></span>
                <ul class="lists">
                	<foreach name="scriptures" item="val" key="key">
						<li><a class="lists_a" href="/guide-{$val['id']}.html"><span class="glyphicon glyphicon-play"></span>{$val['title']}</a></li>					
					</foreach> 
                </ul>
            </div>
            <div class="panel">
            	<h2>{$data.obj.typename}最新预订酒店</h2>
                <span class="more_right"><a href="/{$data.obj.typedir}/">更多&gt;&gt;</a></span>
                <foreach name="data.hot_list" item="val" key="key">
                <div class="hlists">
                	<a class="deletes"></a>
                	<div class="thumbnail">
                    	<img src="{$val['litpic']}" width="56px" height="42px" />
                    </div>
                    <h4><span><a href="#">{$val['title']}</a></span></h4>
                    <p>{$val['stars']}</p>
                    <div class="timelast hidden"><i></i>上次预订为23小时前</div>
                </div>
                </foreach>                  
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel padding dlists">
				<if condition="($data.city_list neq '')">
                <h4>{$data.obj.typename}城市导航</h4>
                <p>
				<foreach name="data.city_list" item="val" key="key"><span><a href="/{$val['typedir']}-guide/">{$val['typename']}</a></span></foreach></p>
				</if>
                <h4>亚洲热门国家</h4>
                <p><foreach name="data.country_list" item="val" key="key"><span><a href="/{$val['typedir']}-guide/">{$val['typename']}</a></span></foreach></p>
	</div>
</div>
<div class="container">
	<div class="panel padding">
    	<p style="margin-bottom:0;">HotelClub国际酒店预订网为您提供泰国、新加坡、马尔代夫、欧洲、美国等国外旅游攻略信息，包括自助游、自由行攻略指南，您可以在这里查询最新出国旅游攻略，境外热门旅游景点，酒店推荐信息，了解中外文化差异，国外风俗习惯等。旅游是一种心情，也是一种态度。携手Hotelclub，出国旅游，感受别样的异域风情！</p>
        <a style="font-size:14px;">HotelClub服务热线：4001202945</a>
    </div>
</div>
<include file="Public:guide_header_js" />
<style>.modal-dialog{width:730px;}</style>
<include file="Public:footer" />
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
            totalPages: {$data.total},
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
		$.post("/{$data.obj.typedir}-guide/",{"order":guide_form.val()},function(data){
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
	
	$.post("/{$data.obj.typedir}-guide/",{"order":order_val,"page":page},function(data){
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
