<!DOCTYPE html>
<html>
<head>
<title><if condition="($data.seotitle eq '')">{$data.typename}酒店预订,{$data.typename}酒店价格查询,{$data.typename}住宿攻略 - HotelClub<else />{$data.seotitle} - HotelClub</if></title>
<meta name="keywords" content="<if condition="($data.keywords eq '')">{$data.typename}酒店预订,{$data.typename}酒店价格查询,{$data.typename}住宿攻略,HotelClub<else />{$data.keywords}</if>"> 
<meta name="description" content="<if condition="($data.description eq '')">HotelClub为您提供{$data.typename}酒店预订,{$data.typename}酒店价格查询,{$data.typename}住宿攻略等服务.经济型豪华型酒店应有尽有,即刻预订{$data.typename}酒店,立享最新超值优惠!<else />{$data.description}</if>">
<meta name="DCSext.seotype" content="NC|Country"/>
<meta name="DCSext.seopage" content="NC|Country|{$data.typedir}/"/>
<meta name="DCSext.seocntry" content="NC|<if condition="($data.id eq '67')">3<elseif condition="$data.id eq '54154'"/>4<else/>{$data.id}</if>|{$data.typedir}/"/>
<include file="Public:header_style" />
</head>
<body>
<div class="container">
	<include file="Public:header" />
    <ol class="breadcrumb">    
		<li><a href="__HT__">首页</a></li>
        <li><a href="__HT__/{$position.p_typedir}/">{$position.p_typename}酒店预订</a></li>
		<li class="active">{$position.s_typename}酒店预订</li>	
	</ol>
</div>
<div class="container">
	<div class="row">
    	<div class="col-xs-4">			
        	<div class="panel order panelsmall">
				<h2>酒店预订{$data.typename}</h2>
				<form class="form-horizontal" role="form" id="search_from" method="post" action="__HT__/Search/">
				  <div class="form-group">
					<label for="inputEmail3" class="labell control-label">入住国家:</label>
					<div class="labelw">
						<select class="form-control" name="keys_country">
						<foreach name="continentlist" item="val" key="key">						
							<option value="{$val['id']}" <if condition="$val['id'] eq $data['id']">selected</if>>{$val['typename']}</option>
						</foreach>
						</select>
					</div>
					<font class="msginfo">*</font>
				  </div>
				  <div class="form-group">
					<label for="inputPassword3" class="labell control-label">入住城市:</label>
					<div class="labelw">
						<select class="form-control" name="keys_city" datatype="*" nullmsg="*" errormsg="请选择城市">
                            <option value="">请选择城市</option>
                            <foreach name="city" item="val" key="key">	
                            <option value="{$val['id']}">{$val['typename']}</option>
                            </foreach>                          
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
            <img src="__static__/images/bg3.jpg" class="adspic">
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
            	<h2>{$data.typename}热门城市</h2>
                <div class="row">
                  <foreach name="hotcity" item="vo">        
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
            <div class="panel panelbig overflows" >
            	<h2>{$data.typename}热门酒店</h2>
            	<div class="tab">
                    <ul class="country_nav">
                      	<if condition="($hotcity[0] neq null)"><li class="active"><a href="#{$hotcity[0].typedir}" data-toggle="tab" url="{$hotcity[0].typedir}">{$hotcity[0].typename}</a></li></if>
                      	<if condition="($hotcity[1] neq null)"><li><a href="#{$hotcity[1].typedir}" data-toggle="tab" url="{$hotcity[1].typedir}" onclick="loadCity('{$hotcity[1].typedir}');">{$hotcity[1].typename}</a></li></if>
                      	<if condition="($hotcity[2] neq null)"><li><a href="#{$hotcity[2].typedir}" data-toggle="tab" url="{$hotcity[2].typedir}" onclick="loadCity('{$hotcity[2].typedir}');">{$hotcity[2].typename}</a></li></if>
                    	<if condition="($hotcity[3] neq null)"><li><a href="#{$hotcity[3].typedir}" data-toggle="tab" url="{$hotcity[3].typedir}" onclick="loadCity('{$hotcity[3].typedir}');">{$hotcity[3].typename}</a></li></if>
                    	<if condition="($hotcity[4] neq null)"><li><a href="#{$hotcity[4].typedir}" data-toggle="tab" url="{$hotcity[4].typedir}" onclick="loadCity('{$hotcity[4].typedir}');">{$hotcity[4].typename}</a></li></if>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
	                   <if condition="($hotcity[0] neq null)">
	                     <div class="tab-pane active" id="{$hotcity[0].typedir}">
	                       <ul class="hot_hotels">
	                       <foreach name="citylist" item="val" key="key">	                       
	                            <if condition="($key%2 eq 1)"><li class="odd"><else /><li></if>
	                            	<div class="thumbnail">
	                                  <a href="{$val.linkurl}" target="_blank" >
	                                  <img src="{$val.litpic}" alt="{$val.title}" width="127px" height="127px">
	                                  <div class="caption">
	                                  </a>
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
	                   </if>
                   	  <if condition="($hotcity[1] neq null)">
                      <div class="tab-pane" id="{$hotcity[1].typedir}">
                        <ul class="hot_hotels">
							<li class="text-center mod">
								<img src="__static__/images/loading.gif" alt="加载中...">
							</li>
                        </ul>
                      </div>
                      </if>
                      <if condition="($hotcity[2] neq null)">
                      <div class="tab-pane" id="{$hotcity[2].typedir}">
                        <ul class="hot_hotels">
							<li class="text-center mod">
								<img src="__static__/images/loading.gif" alt="加载中...">
							</li>
                        </ul>
                      </div>
                      </if>
                      <if condition="($hotcity[3] neq null)">
                      <div class="tab-pane" id="{$hotcity[3].typedir}">
                        <ul class="hot_hotels">
							<li class="text-center mod">
								<img src="__static__/images/loading.gif" alt="加载中...">
							</li>
                        </ul>
                      </div>
                      </if>
                      <if condition="($hotcity[4] neq null)">
                      <div class="tab-pane" id="{$hotcity[4].typedir}">
                        <ul class="hot_hotels">
							<li class="text-center mod">
								<img src="__static__/images/loading.gif" alt="加载中...">
							</li>
                        </ul>
                      </div>
                      </if>
                    </div>
                </div>
            </div>
            <div class="posit">
            	<span>{$position.p_typename}热门国家：</span>
            	<ul class="state_country">
            	<foreach name="continentlist" item="vs">           	
                	<li><a href="__HT__/{$vs.typedir}">{$vs.typename}</a></li>
                </foreach>
                </ul>
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
	//getCountry({$position.p_id});//加载国家
});

</script>
</body>
</html>
