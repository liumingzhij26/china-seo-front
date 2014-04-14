<!DOCTYPE html>
<html>
<head>
<title><if condition="($data.seotitle eq '')">{$data.typename}酒店预订,{$data.typename}酒店推荐,{$data.typename}住宿攻略 - HotelClub<else />{$data.seotitle} - HotelClub</if></title>
<meta name="keywords" content="<if condition="($data.keywords eq '')">{$data.typename}酒店预订,{$data.typename}酒店推荐,{$data.typename}住宿攻略,HotelClub<else />{$data.keywords}</if>"> 
<meta name="description" content="<if condition="($data.description eq '')">HotelClub拥有丰富的{$data.typename}酒店资源，为您出行提供优质的{$data.typename}酒店预订和{$data.typename}酒店推荐服务，为前往{$data.typename}的您提供详细的住宿攻略。在HotelClub,我们帮助您以优惠的价格预订性价比高的{$data.typename}酒店，2-7折在线预订，现在就来体验吧！<else />{$data.description}</if>">
<meta name="DCSext.seotype" content="NC|City"/>
<meta name="DCSext.seopage" content="NC|City|{$data.typedir}/"/>
<meta name="DCSext.seocntry" content="NC|{$data.id}|{$data.typedir}/"/>
<include file="Public:header_style" />
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">
		<li><a href="/">首页</a></li>
		<li><a href="/{$position.t_typedir}/">{$position.t_typename}酒店预订</a></li>
        <li><a href="/{$position.p_typedir}/">{$position.p_typename}酒店预订</a></li>
		<li class="active">{$position.s_typename}酒店预订</li>
		<if condition="$data.weatherid neq '0'">
		<div class="weather-ok pull-right" >
            <span class="weather-city-name"><a class="city-name" hidefocus="">{$data.typename}：</a></span>
            <span class="weather-today">
			<img id="weather_today_img" class="weather-today-img" src="{$data.w_pic}" width="30" height="30">
			<em class="weather-today-temp">{$data.low}~{$data.high}℃</em></span>
            <span class="weather-pollution hidden"><em class="sep">|</em><em class="air-level-label">空气质量：</em></span>
            <span id="s_weather_polution_content" class="weather-polution-img hidden" style="display:"><a target="_blank" id="new_weather_air_link" href="#" class="new-wearther-air-link weather-aq weather-aq-20">轻度污染</a></span>
        </div>
		</if>		
	</ol>
</div>

<div class="container">
	<div class="panel panelfull linear">
    	<div class="filter">
			<form id="search_from" method="post" action="/Search/">
        	<div class="margin">
                <label class="labell">国家：</label>
				<select class="inputs" name="keys_country">
				<foreach name="countryList" item="val" key="key">						
					<option value="{$val['id']}" <if condition="$val['id'] eq $data['reid']">selected</if>>{$val['typename']}</option>
				</foreach>
				</select>                
                <label class="labell">城市：</label>
				<select class="inputs" name="keys_city" datatype="*" nullmsg="*" errormsg="请选择城市">
				  <option value="{$data.id}">{$data.typename}</option>					  
				</select>                
                <label class="labell">入住日期：</label>
               	<input type="text" name="start_date"  class="start_date" style="width:100px;margin-right:10px;"  placeholder="入住日期" value="" readonly>   
                
                <label class="labell">退房日期：</label>
              	<input type="text" name="end_date"  class="end_date" style="width:100px;margin-right:10px;"  placeholder="入住日期" value="" readonly>   
            </div>
            <div>
            <label class="labell">酒店名称：</label>
            <input class="inputs" name="city_name" placeholder="例：希尔顿" style="width:238px;">
            
            <label class="labell">入住人员：</label>
            <select class="selects" name="room1.adults">
				<option value="1">1</option>
				<option value="2" selected>2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
			</select>
            <label class="labell">位成人</label>
            <select class="selects" name="room1.children">
				<option value="0" selected>0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
            <label class="labell">位儿童</label>
            </div>			
			<select name="stars" class="hidden" id="starRating">
				<option value="1">没有特别偏好</option>
			</select>
        </div>
		<input type="submit" class="btn btn-purp btnfind" id="search_btn" value="查&nbsp;&nbsp;&nbsp;询" />
		</form>
    </div>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">
			<div class="mapcenter" id="map_list" style="z-index:999;width:296px;height:220px;">
				
			</div>
            <div></div>
        	<div class="panel panelsmall">
            	<h2>{$data.typename}介绍</h2>
                <p style="text-indent:2em; margin:0;">想去{$data.typename}感受不一样的异域风情？一份详细的{$data.typename}住宿攻略是必修课。登录hotelclub酒店预订网，查看hotelclub为您精心准备的{$data.typename}酒店推荐，当美丽遇见舒适，旅行的体验也就到了极致。<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;即刻登录hotelclub{$data.typename}酒店预订中心，整理行囊向{$data.typename}出发，感受来自{$data.typename}的独特魅力！</p>
            </div>
            <div class="panel panelsmall">
            	<h2>{$data.typename}最新酒店</h2>
                <ul class="lists"><foreach name="citylist" item="val" key="key">
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
        	<div class="panel panelbig" >
				<form id="search_city">
            	<div class="filters">	
					<ul><li>
					<input type="hidden" name="key_city_id" value="{$data.id}" data="no" pagesize="1" />
                	价格：</li><li>
                    <div><input type="radio" name="city_price" value="1" checked><a>不限</a></div>
					<div><input type="radio" name="city_price" value="(price < 200)"><a>200以内</a></div>
					<div><input type="radio" name="city_price" value="(price > 200 and price < 400)"><a>200-400</a></div>
					<div><input type="radio" name="city_price" value="(price > 400)"><a>400以上</a></div>
					<div><input type="text" class="smallinput hidden" name="start_price"></div>
					<div><input type="text" class="smallinput hidden" name="end_price"><a class="btn smallbtn btn-purp hidden" />搜索</a></div></li></ul>
                </div>
                <div class="filters">
                	<ul><li>星级：</li><li>
                    <div><input type="checkbox" name="stars_all" value="1"><a>不限</a></div>
					<div><input type="checkbox" name="city_stars[]" value="stars = '2'"><a>二星以下</a></div>
					<div><input type="checkbox" name="city_stars[]" value="stars = '3'"><a>三星</a></div>
					<div><input type="checkbox" name="city_stars[]" value="stars = '4'"><a>四星</a></div>
					<div><input type="checkbox" name="city_stars[]" value="stars = '5'"><a>五星级</a></div>
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
				</form>
				<div class="filters text-center" id="infos" style="color:red"></div>
            </div>
            <div class="panel panelbig overflows" >
            	<h1>{$data.typename}酒店预订<span class="results">共<i id="total_num">{$data.count}</i>条结果</span></h1>
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
	                                    <p class='hidden'>{$val.infos}...</p>
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
            <div class="posit">
            	<span>{$position.t_typename}热门国家：</span>
            	<ul class="state_country">
                	<foreach name="continentlist" item="vs">           	
                		<li><a href="/{$vs.typedir}">{$vs.typename}</a></li>
                	</foreach>
                </ul>
             </div>
        </div>
    </div>
</div>
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry&v=3.7"></script>
<include file="Public:header_js" />
<script src="__static__/js/jquery.pin.js"></script>
<script src="__static__/js/maplace.js"></script>
<script src="__static__/js/ajax.js"></script>
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
	$("#map_list").pin();
    var _order = $("input[name='order']");
	var _key_city_id= $("input[name='key_city_id']");
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
		var _total_num = parseInt(_key_city_id.attr("pagesize"));		
    	$('.pagination').bootstrapPaginator({
			currentPage: 1,
			totalPages: _total_num
		});
    });	
		
	$("#search_city").find("input").click(function(){
		var _list = $("#search_city").serialize();
		$.post("/City/getSearchCity/",_list,function(data){
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
	new Maplace({
		map_div: '#map_list',
		locations: {$datamaps},
		controls_type: 'list',
		controls_title: '酒店列表:',
		controls_cssclass: '.list_class',
		type: 'marker',
		controls_div: "#maps_list",
		controls_on_map : false,//显示
		afterShow: function(index, location, marker) {		
			//console.info(marker);
		}
	}).Load();
	$(window).on('scroll',function(){
		setTimeout(function(){
			//$.debug($.lmz.Point.getX() + ' ' + $(window).scrollLeft());
			//$.debug($.lmz.Point.getY() + ' ' + $(window).scrollTop());
		},100);		
	});
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
				$("#infos").hide();
			}
		});
	}else{
		$.get("/city/getCityPage/typeid-{$data.id}-page-"+page+'-order-'+order_val,function(data){
			if(data == 0){
				$("#infos").show().text("没有找到要查询的数据！");
				return;
			}else{
				var obj = eval('(' + data + ')');  
				$('.hot_hotels').empty();
				_key_city_id.attr("data","yes");
				_key_city_id.attr("pagesize",obj.total);
				append_obj(obj.list);	
				$('.pagination').bootstrapPaginator({
					currentPage: 1,
					totalPages: obj.total
				});				
				$("#infos").hide();
			}
		});
	}
}
</script>
</body>
</html>

