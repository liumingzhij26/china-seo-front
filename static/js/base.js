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
   	
   	var _continent = $("[name='keys_country']");
   	var _city = $("[name='keys_city']");
   	var _stars = $("[name='stars']");
   	var _city_name = $("[name='city_name']");
   	var _start_date = $("[name='start_date']");
   	var _end_date = $("[name='end_date']");
   	_continent.change(function(){
   		var _this = $(this);
   		getAjaxCity(parseInt(_this.val()));
   	});   
	
	
	_start_date.on("change",function(){
		var _this = $(this);
		if(_this.val().length > 0){
			$.get('/Tool/getDate_one',{"start_name":_start_date.val()},function(data){
				_end_date.val(data);
				_end_date.datetimepicker({
					language:  'zh-CN',
					todayBtn:  1,
					autoclose: 1,
					todayHighlight: 1,
					startDate: data,//当前时间开始
					startView: 2,
					minView: 2,
					forceParse: 0,
					format: 'yyyy-mm-dd'
				});
				_end_date.focus();
			});	
		}			
	});
	_end_date.on("change",function(){
		if(_end_date.val().length > 0){
			var _start_date = $("input[name='start_date']");
			if(_start_date.val().length <= 0){
				alert("入住时间不能为空!");
				return false;
			}else{
				if(!date_compare(_start_date.val(),_end_date.val())){
					return false;
				}
			}
		}		
	});
	
	var search_btn = $("#search_btn");
	search_btn.click(function(){
		var obj = {};
		if(!/^[\d]+$/.test(_continent.val())){
			alert("请选择国家!");
			return false;
		}
		if(_city.val().length > 0){
			if(!/^[\d]+$/.test(_city.val())){
				alert("请选择城市!");
				return false;
			}
			obj.cityid = _city.val();
		}else{
			obj.cityid = 0;
		}		
		if(!/^[\d]+$/.test(_stars.val())){
			alert("请选择酒店星级!");
			return false;
		}
		if(_city_name.val().length > 0){			
			obj.cityname = _city_name.val();
		}else{
			obj.cityname = 0;
		}
		obj.cityname = encodeURIComponent(obj.cityname);
		
		var _end_date = $("input[name='end_date']");
		if(_end_date.val().length > 0){
			var _start_date = $("input[name='start_date']");
			if(_start_date.val().length <= 0){
				alert("入住时间不能为空!");
				return false;
			}else{
				if(!date_compare(_start_date.val(),_end_date.val())){
					return false;
				}
			}
		}
		search_from.submit();
	});
	
	$(".sidemenu ul").find('li').hover(function(){
		$(this).addClass("active");
	},function(){
		$(this).removeClass("active");
	});
	
	$(".get_map").on("click",function(){
		alert("1");
		var _this = $(this);		
		$("#map_title").html(_this.attr("title"));
		$("#map_address").attr("src",_this.attr("url"));
		$('#Modal_MAP').modal('show')
	});
	$("#menu2").find("a").click(function(){
		$("#drop2").html($(this).html()+"<b class=\"caret\"></b>");
		$.cookie("price_type",$(this).attr("value"),{expires:7,path:'/'});
	});	
	
	if($.cookie("price_type") == "USD"){
		$("#drop2").html("USD-美元<b class=\"caret\"></b>");
	}
});


