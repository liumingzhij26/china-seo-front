<!DOCTYPE html>
<html>
<head>
<title>出国旅游攻略2014,出国旅游攻略大全,境外旅游酒店推荐-HotelClub</title>
<meta name="keywords" content="出国旅游,旅游攻略2014,旅游攻略大全,境外旅游,境外酒店推荐,HotelClub"> 
<meta name="description" content="最权威的出国旅游攻略大全，2014最新出国旅游攻略，境外热门旅游景点，酒店推荐，提供最佳的自助游，自由行攻略指南，尽在HotelClub国外旅游攻略。HotelClub旅游，让旅游更轻松！">
<include file="Public:guide_header_style" />
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="/">首页</a></li>
        <li><a href="/guide/">旅游攻略</a></li>
		<li class="active">出国旅游攻略</li>
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
    	<div class="col-md-8">
            <div class="panel">
            	<div class="head1">
                    <h1>出国旅游攻略2014</h1>
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
            <div class="panel">
            	<h2>出国旅游攻略推荐</h2>
                <ul class="lists">
                    <foreach name="scriptures" item="val" key="key">
						<li><a class="lists_a" href="/guide-{$val['id']}.html"><span class="glyphicon glyphicon-play"></span>{$val['title']}</a></li>					
					</foreach>
                </ul>
            </div>
            <div class="panel dlists">
            	<h2>境外游热门目的地</h2>               
				<foreach name="type_list" item="val" key="key">			
				<if condition="($val['ranks'] eq '1')">
				 <h4>{$val['typename']}</h4>
				<p>
				<php> $i=0; $s=0;</php>
				<foreach name="type_list" item="val2" key="key2">
					<if condition="($val['id'] eq $val2['reid'])">
						<if condition="($i lt 10)">
							<span><a>{$val2['typename']}</a></span>
							<php>$i++;</php>
						</if>
					</if>				
				</foreach>
				</p>
				</if>
                </foreach>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel">
    	<p style="text-indent:2em; margin-bottom:0;">HotelClub国际酒店预订网为您提供泰国、新加坡、马尔代夫、欧洲、美国等国外旅游攻略信息，包括自助游、自由行攻略指南，您可以在这里查询最新出国旅游攻略，境外热门旅游景点，酒店推荐信息，了解中外文化差异，国外风俗习惯等。旅游是一种心情，也是一种态度。携手Hotelclub，出国旅游，感受别样的异域风情！</p>
        <a style="font-size:14px;">HotelClub服务热线：4001202945</a>
    </div>
</div>
<include file="Public:guide_header_js" />
<include file="Public:footer" />
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
		$.post("/list-guide/",{"order":guide_form.val()},function(data){
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
	$.post("/list-guide/",{"order":order_val,"page":page},function(data){
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
</script>
</body>
</html>
