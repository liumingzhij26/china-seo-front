<!DOCTYPE html>
<html>
<head>
<title><if condition="($data.seotitle eq '')">{$data.typename}酒店预订, {$data.typename}酒店排名, {$data.typename}酒店比价 - HotelClub<else />{$data.seotitle} - HotelClub</if></title>
<meta name="keywords" content="<if condition="($data.keywords eq '')">{$data.typename}酒店预订,{$data.typename}酒店排名,{$data.typename}酒店比价,HotelClub<else />{$data.keywords}</if>"> 
<meta name="description" content="<if condition="($data.description eq '')">HotelClub提供高性价比的{$data.typename}酒店预订服务，精选{$data.typename}酒店排名，比价，评论，优惠等信息. HotelClub海量{$data.typename}酒店，让您出行无忧!<else />{$data.description}</if>">
<meta name="DCSext.seopage" content="NC|{$data.id}|{$data.typedir}/"/>
<include file="Public:header_style" />
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="/">首页</a></li>
		<li class="active">{$data.typename}酒店预订</li>
	</ol>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">
			<div></div>
        	<include file="Public:search" />
            <div class="panel panelsmall">
            	<h2>{$data.typename}热门城市</h2>
                <ul class="lists">
                	<foreach name="hotcity" item="vo">    
                	<li><a class="lists_a" href="__HT__/{$vo.typedir}/"><span class="glyphicon glyphicon-play"></span>{$vo.typename}酒店<span class="pull-right"><if condition="($vo.count eq null)">0</if>{$vo.count}家酒店</span></a></li>
                	</foreach>
                </ul>
            </div>
        </div>
        <div class="col-sm-8 left-clear">
        	<div class="panel intro panelbig">
            	<h1>{$data.typename}酒店预订</h1>
                <img src="{$data.picname}" width="247px" height="143px" class="pull-right">
                <p>{$data.content}</p>           
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
            	<h2>{$data.typename}热门国家</h2>
                <div class="row">
                <foreach name="country_hot" item="vo">                
                  <div class="col-xs-3">
                    <div class="thumbnail">
                      <img src="{$vo.picname}" style="width:120px;height:120px" alt="{$vo.typename}">
                      <div class="captiontop">
                        <h3><a href="__HT__/{$vo.typedir}/">{$vo.typename}</a></h3>
                      </div>
                      <div class="caption">
                        <h3><a href="__HT__/{$vo.typedir}/"><if condition="($vo.count eq null)">0<else />{$vo.count}</if>家酒店</a></h3>
                      </div>
                    </div>
                  </div>
                </foreach>     
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="panel panelfull">
		<h2>{$data.typename}酒店导航</h2>
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
				<foreach name="continentlist" item="v">
				<if condition="($v.lev eq 1)">
					<li class="<if condition='($key eq 0)'>active</if>"><a href="#{$v.typedir}" data-toggle="tab">{$v.typename}</a></li>
				</if>
				</foreach>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
			<foreach name="continentlist" item="v">
			<if condition="($v.lev eq 1)">
              <div class="tab-pane <if condition='($key eq 0)'>active</if>" id="{$v.typedir}">
              	<ul class="state_country">
					<foreach name="continentlist" item="vs" key="ks">
						<if condition="($vs.lev eq 2 and $v['id'] eq $vs['reid'])">
						<li><a href="__HT__/{$vs.typedir}/">{$vs.typename}</a></li>
						</if>
					</foreach>
                </ul>
              </div>  
			</if>
			</foreach>
            </div>
        </div>
        <div class="clearfix"></div>
	</div>
</div>
<include file="Public:header_js" />
<include file="Public:footer" />
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
		startDate: '{$date}',//当前时间开始
		startView: 2,
		minView: 4,
		forceParse: 0,
    	format: 'yyyy-mm-dd'
    });
    getCountry({$data.id});//加载国家
});
</script>
</body>
</html>
