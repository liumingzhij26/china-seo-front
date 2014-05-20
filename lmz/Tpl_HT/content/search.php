<!DOCTYPE html>
<html>
<head>
<title>{$data.typename}酒店预订,{$data.typename}酒店推荐,{$data.typename}住宿攻略 - HotelClub</title>
<meta name="keywords" content="{$data.typename}酒店预订,{$data.typename}酒店推荐,{$data.typename}住宿攻略,HotelClub"> 
<meta name="description" content="HotelClub拥有丰富的{$data.typename}酒店资源，为您出行提供优质的{$data.typename}酒店预订和{$data.typename}酒店推荐服务，为前往{$data.typename}的您提供详细的住宿攻略。在HotelClub,我们帮助您以优惠的价格预订性价比高的{$data.typename}酒店，2-7折在线预订，现在就来体验吧！">
<meta name="DCSext.seocntry" content="NC|{$data.id}|{$data.typedir}/"/>
<include file="Public:header_style" />
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="__HT__">首页</a></li>
		<li class="active"><b><if condition="$data.city_name eq null or $data.city_name eq ''">酒店名称<else/>{$data.city_name}</if></b></li>       
	</ol>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">
				<div></div>
				<div class="panel order panelsmall">
				<h2>{$data.typename}酒店预订</h2>
				<form class="form-horizontal" role="form" id="search_page">
					<input type="hidden" name="p_keys_country" value="{$data.keys_country}" />
					<input type="hidden" name="p_keys_city" value="{$data.keys_city}" />
					<input type="hidden" name="p_start_date" value="{$data.start_date}" />
					<input type="hidden" name="p_end_date" value="{$data.end_date}" />
					<input type="hidden" name="p_stars" value="{$data.stars}" />
					<input type="hidden" name="p_city_name" value="{$data.city_name}" />
					<input type="hidden" name="order" value="recommend" />
				</form>
				<form class="form-horizontal" role="form" id="search_from" method="post" action="__HT__/Search/">
				  <div class="form-group">
					<label for="inputEmail3" class="labell control-label">入住国家:</label>
					<div class="labelw">
						<select class="form-control" name="keys_country">
						<foreach name="countryList" item="val" key="key">						
						<option value="{$val['id']}" <if condition="$val['id'] eq $data['keys_country']">selected</if>>{$val['typename']}</option>
						</foreach>
						</select>
					</div>
					<font class="msginfo">*</font>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="labell control-label">入住城市:</label>
					<div class="labelw">
						<select class="form-control" name="keys_city" datatype="*" nullmsg="*" errormsg="请选择城市">
                            <if condition="($data.typename eq '')">
                            <option value="">请选择城市</option>                            
                            <else />
                                <option value="">请选择城市</option>
                                <foreach name="city" item="val" key="key">
                                <option value="{$val['id']}" <if condition="$val['id'] eq $data['id']">selected</if>>{$val['typename']}</option>
                                </foreach>
                            </if>
						</select>                        
					</div>
					<font class="msginfo">*</font>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="labell control-label">入住日期:</label>
					<div class="labelw">
						<input type="text" name="start_date" class="start_date form-control" style="cursor: pointer;" datatype="/^[\d\-]+$/" nullmsg="*"  placeholder="入住日期" value="<if condition="($data.start_date neq '')">{$data.start_date}</if>" readonly>       
					</div>
					<font class="msginfo"></font>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="labell control-label">退房日期:</label>
					<div class="labelw">
						<input type="text" name="end_date" class="end_date form-control" style="cursor: pointer;" datatype="/^[\d\-]+$/" nullmsg="*" placeholder="退房日期" value="<if condition="($data.end_date neq '')">{$data.end_date}</if>" readonly>                        
					</div>
					<font class="msginfo"></font>
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
							<option value="1" <if condition="$data.stars eq 1">selected</if>>没有特别偏好</option>
							<option value="2" <if condition="$data.stars eq 2">selected</if>>两星级或以上酒店</option>
							<option value="3" <if condition="$data.stars eq 3">selected</if>>三星级或以上酒店</option>
							<option value="4" <if condition="$data.stars eq 4">selected</if>>四星级或以上酒店</option>
							<option value="5" <if condition="$data.stars eq 5">selected</if>>仅限5星级酒店</option>
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
            	<h2>{$data.typename}介绍</h2>
                <p style="text-indent:2em; margin:0;">想去{$data.typename}感受不一样的异域风情？一份详细的{$data.typename}住宿攻略是必修课。登录hotelclub酒店预订网，查看hotelclub为您精心准备的{$data.typename}酒店推荐，当美丽遇见舒适，旅行的体验也就到了极致。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;即刻登录hotelclub{$data.typename}酒店预订中心，整理行囊向{$data.typename}出发，感受来自{$data.typename}的独特魅力！</p>
            </div>
            <div class="panel panelsmall">
            	<h2>{$data.typename}最新酒店</h2>
                <ul class="lists">
				<foreach name="citylist" item="val" key="key">
                	<li><a class="lists_a" href="{$val.linkurl}" target="_blank"><span class="glyphicon glyphicon-play"></span>{$val.title}</a></li>
                </foreach></ul>
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
            	<h1>查询结果酒店<span class="results">共<i>{$data.count}</i>条结果</span></h1>
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
							<foreach name="citylist" item="val" key="key">	                       
	                            <if condition="($key%2 eq 1)"><li class="odd"><else /><li></if>
	                            	<div class="thumbnail">
	                                  <a href="{$val.linkurl}" target="_blank" ><img src="{$val.litpic}" alt="{$val.title}" width="127px" height="127px"></a>
	                                  <div class="caption">
	                                    <div><span><i class="tips">优惠</i>预订2日打8.5折</span></div>
	                                  </div>
	                                </div>
	                                <div class="hotels_intro">
	                                	<h4><a href="{$val.linkurl}" target="_blank" >{$val.title}</a><span>{$val.stars}</span></h4>
	                                    <span>{$val.en_title}</span>
	                                    <p>{$val.address}</p>
	                                    <a class="get_map{$val.aid}" title="{$val.title}" onclick="getMap('{$val.aid}');" url="http://www.hotelclub.com/GetGMap.asp?lon={$val.map_x}&lat={$val.map_y}&h=440&w=665" target="_blank">查看地图</a>
	                                    <p class="hidden">{$val.infos}...</p>
										<a href="{$val.linkurl}" target="_blank" >更多详情>></a>
	                                </div>
	                                <div class="orderarea">
	                                	<div class="starbox">
	                                        <span class="s_name">{$val.grade}分</span>
	                                        <ul class="star_ul fl">
	                                            <li><a class="one-star <php>if(floor($val['grade']) == 1) echo 'active-star'; </php>" title="很差" href="#"></a></li>
	                                            <li><a class="two-star <php>if(floor($val['grade']) == 2) echo 'active-star'; </php>" title="差" href="#"></a></li>
	                                            <li><a class="three-star <php>if(floor($val['grade']) == 3) echo 'active-star'; </php>" title="还行" href="#"></a></li>
	                                            <li><a class="four-star <php>if(floor($val['grade']) == 4) echo 'active-star'; </php>" title="好" href="#"></a></li>
	                                            <li><a class="five-star <php>if(floor($val['grade']) == 5) echo 'active-star'; </php>" title="很好" href="#"></a></li>
	                                        </ul>
	                                        <span class="s_result fl" > </span>
	                                    </div>
	                                    <div class="dp">{$val.numbers}人点评</div>
										<div class="price_c">每间每晚&nbsp;&nbsp;<i class="price"><span class="price_data"><font class="price_type">￥</font>{$val.price}</span></i>起</div>
	                                    <div class="check_btn"><a href="{$val.linkurl}" target="_blank" class="btn btn-purp">查&nbsp;&nbsp;看</a></div>
	                                </div>
	                            </li>
	                        </foreach>
                        </ul>
                      </div>
                    </div>
                </div>
				<if condition="($data.count gt $data.page_size)">
                <div class="paginations">
                    <div class="pagination"></div>
                </div> 
				</if>
            </div>            
        </div>
    </div>
</div>
<include file="Public:header_js" />
<include file="Public:footer" />
<script type="text/javascript">
$(function(){   	
	
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
    $(".end_date").datetimepicker({
    	language:  'zh-CN',
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startDate: '{$date}',//当前时间开始
		startView: 2,
		minView: 2,
		forceParse: 0,
    	format: 'yyyy-mm-dd'
    });
    var _order = $("input[name='order']");
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
    <if condition="($data.typename eq '')">
        getAjaxCity({$data.keys_country});//加载国家
    </if>
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
