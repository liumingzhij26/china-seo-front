<!DOCTYPE html>
<html>
<head>
<title>{$data.list.title}-HotelClub</title>
<meta name="keywords" content="<if condition="($data['list']['keywords'] eq '')">{$data.list.title},出国旅游攻略,HotelClub<else/>{$data.list.keywords}</if>"> 
<meta name="description" content="{$data.list.description}">
<include file="Public:guide_header_style" />
<!--引用百度地图API-->
<style type="text/css">
    .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
    .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
</head>

<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="__HT__/">首页</a></li>		
        <li><a href="__HT__/guide/">旅游攻略</a></li>
		<if condition="($data['position'] neq null)">
        <li><a href="__HT__/{$data['position']['typedir']}-guide/">{$data['position']['p_typename']}攻略</a></li>
        <li><a href="__HT__/{$data.list.typedir}-guide/">{$data['position']['typename']}攻略</a></li>
		<else/>
		<li><a href="__HT__/{$data.list.typedir}-guide/">{$data.list.typename}攻略</a></li>
		</if>
		<li class="active">{$data.list.title}</li>
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
                	<h1>{$data.list.title}</h1>
                    <div class="namex"><span class="name">{$data.list.writer}</span><span>{$data.list.pubdate|date="Y-m-d H:m:s",###}</span>   <span>浏览：{$data.list.click}</span> </p></div>
                    <div class="namex namey hidden"><span>标签：<a>蜜月</a> <a>自驾</a></span><span>分类：<a href="__HT__/{$data.list.typedir}-guide">{$data.list.typename}</a></span></div>
                </div>
                <div class="conts" style="line-height:26px;padding-bottom:10px;">
					<div class="thumbnail">
                    	<img src="{$data.list.litpic}" width="550px" alt="{$data.list.title}" />
                        <div class="caption">
                            <p>{$data.list.shorttitle}</p>
						</div>
                    </div>					
                	{$data.list.body}               		
                </div>
                <div class="prenext">
                	<span class="pull-left">上一篇：<if condition="($data['pre'] neq null)"><a href="__HT__/guide-{$data['pre']['id']}.html">{$data['pre']['title']}</a><else/>没有数据</if></span>
					<span class="pull-right">下一篇：<if condition="($data['next'] neq null)"><a href="__HT__/guide-{$data['next']['id']}.html">{$data['next']['title']}</a><else/>没有数据</if></span>
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
					<input type="hidden" name="aid" value="{$data.list.id}" />
					<input type="hidden" name="typeid" value="{$data.list.typeid}" />
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
					<foreach name="data.headline_pubdate" item="val" key="key">
						<li><a href="__HT__/guide-{$val['id']}.html">{$val['title']}</a></li>
					</foreach>      
                </ul>
            </div>
        </div>
        <div class="col-md-4 left-clear">
        	<div class="sidemenu">
            	<ul>
	            	<li class="sl_1"><a <if condition="($data.explain neq '')">href="__HT__/guide-{$data.explain.id}.html"</if> class="btn btn-default">{$data.list.typename}概况<i></i></a></li>
                    <li class="sl_2"><a <if condition="($data.scene neq '')">href="__HT__/guide-{$data.scene.id}.html"</if> class="btn btn-default">{$data.list.typename}景点<i></i></a></li>
                    <li class="sl_3"><a href="__HT__/{$data.list.typedir}-guide-list/" class="btn btn-default">{$data.list.typename}游记<i></i></a></li>
                    <li class="sl_4"><a href="__HT__/{$data.list.typedir}/" class="btn btn-default">{$data.list.typename}酒店<i></i></a></li>
                    <li class="sl_5"><a class="btn btn-default get_map{$data['hot_list'][0]['aid']}" title="{$val.title}" onclick="getMap_list('{$data['hot_list'][0]['aid']}');" url="http://www.hotelclub.com/GetGMap.asp?lon={$data['hot_list'][0]['map_x']}&lat={$data['hot_list'][0]['map_y']}&h=800&w=800" target="_blank">{$data.list.typename}地图<i></i></a></li>
            	</ul>
            </div>
            <div class="panel">
            	<h2>{$data.list.typename}最新自助游攻略</h2>
                <span class="more_right"><a href="__HT__/{$data.list.typedir}-guide-list/">更多&gt;&gt;</a></span>
                <ul class="lists">
				<foreach name="data.new_list" item="val" key="key">
                    <if condition="($val['id'] neq $data['list']['id'])">
                	<li><a href="__HT__/guide-{$val['id']}.html" class="lists_a"><span class="glyphicon glyphicon-play"></span>{$val['title']}</a></li>
                    </if>
                </foreach>               
                </ul>
            </div>
            <div class="panel">
            	<h2>{$data.list.typename}最新预订酒店</h2>				
                <span class="more_right"><a href="__HT__/{$data.list.typedir}/">更多&gt;&gt;</a></span>
				<foreach name="data.hot_list" item="val" key="key">
                <div class="hlists">
                	<a class="deletes"></a>
                	<div class="thumbnail">
                    	<img src="{$val['litpic']}" width="56px" height="42px" />
                    </div>
                    <h4><span><a href="#" class="get_map{$val['aid']}">{$val['title']}</a></span></h4>
                    <p>{$val['stars']}</p>
                    <div class="timelast hidden"><i></i>上次预订为23小时前</div>
                </div>
                </foreach>                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<include file="Public:guide_header_js" />
<style>.modal-dialog{width:730px;}</style>
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
		$.get('/plus/nc_gook.php',{"dopost":"getlist","aid":"<php>echo $data['list']['id'];</php>","page":page},function(data){
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
