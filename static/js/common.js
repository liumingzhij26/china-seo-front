/*
 * 说明：去除两边空格
 * 用法：' http  string  aaaa '.trim();
 */
String.prototype.trim = function() {
	return this.replace(/(^\s*)|(\s*$)/g, "");
};

/*
 * 说明：获得当前日期
 * 用法：get_date();	如：2013-12-12
 */
function get_Date(){
	var _date = new Date();
	return _date.getFullYear() + '-' + (_date.getMonth()+1) + '-' + _date.getDate();
}

function append_obj(obj){
    $.each(obj,function(i,n){	
        var _html = '';
        if(i%2 == 1){
            _html += '<li class="odd">';
        }else{
            _html += '<li>';
        }
        _html += '<div class="thumbnail"><a href="'+n.linkurl+'" target="_blank"><img src="'+n.litpic+'" class="pic_load" width="127px" height="127px" alt="'+n.title+'" value="'+n.aid+'"></a><div class="caption"><div><span><i class="tips">优惠</i>预订2日打8.5折</span></div></div></div><div class="hotels_intro"><h4><a href="'+n.linkurl+'" target="_blank">'+n.title+'</a><span>'+n.stars+'</span></h4><span>'+n.en_title+'</span><p>'+n.address+'</p><a class="get_map'+n.aid+'" onclick="getMap(\''+n.aid+'\');" title="'+n.title+'" lon="'+n.map_x+'" lat="'+n.map_y+'" price="'+n.price+'" url="http://www.hotelclub.com/GetGMap.asp?lon='+n.map_x+'&lat='+n.map_y+'&h=440&w=665" target="_blank">查看地图</a><p class="hidden">'+n.infos+'...</p>  <a href="'+n.linkurl+'" target="_blank" style="margin-left:3px;">更多详情>></a></div>';
        _html += '<div class="orderarea"><div class="starbox"><span class="s_name">'+n.grade+'分</span><ul class="star_ul fl">';
        if(Math.floor(n.grade) == 1){
            _html += '<li><a class="one-star active-star" title="很差" href="#"></a></li>';
        }else{
            _html += '<li><a class="one-star" title="很差" href="#"></a></li>';
        }			
        if(Math.floor(n.grade) == 2){
            _html += '<li><a class="two-star active-star" title="很差" href="#"></a></li>';
        }else{
            _html += '<li><a class="two-star" title="很差" href="#"></a></li>';
        }
        if(Math.floor(n.grade) == 3){
            _html += '<li><a class="three-star active-star" title="还行" href="#"></a></li>';
        }else{
            _html += '<li><a class="three-star" title="还行" href="#"></a></li>';
        }
        if(Math.floor(n.grade) == 4){
            _html += '<li><a class="four-star active-star" title="好" href="#"></a></li>';
        }else{
            _html += '<li><a class="four-star" title="好" href="#"></a></li>';
        }
        if(Math.floor(n.grade) == 5){
            _html += '<li><a class="five-star active-star" title="很好" href="#"></a></li>';
        }else{
            _html += '<li><a class="five-star" title="很好" href="#"></a></li>';
        }
        _html += '</ul><span class="s_result fl" > </span></div>';
        _html +='<div class="dp">'+n.numbers+'人点评</div><div class="price_c">每间每晚&nbsp;&nbsp;<i class="price"><span class="price_data"><font class="price_type">￥</font>'+n.price+'</span></i>起</div><div class="check_btn"><a href="'+n.linkurl+'" target="_blank" class="btn btn-purp">查&nbsp;&nbsp;看</a></div></div></li>';                
        $('.hot_hotels').append(_html); 
    });
}

/*
	说明：旅游页面
*/
function guide_obj(obj){
	$.each(obj,function(i,n){
		var _html = '';
		_html += '<div class="posts">';
		_html += '<div class="thumbnail">';
		if(n.litpic == ''){
			_html += '<a href="/h/guide-'+n.id+'.html"><img src="/static/images/travel/screenshoot.jpg" /></a>';
			
		}else{
			_html += '<a href="/h/guide-'+n.id+'.html"><img src="'+n.litpic+'" width="178px" height="115px" /></a>';
		}	
			_html += '</div>';
			_html += '<div class="posts_cont">';
				_html += '<h3><a href="/h/guide-'+n.id+'.html">'+n.title+'</a></h3>';
				_html += '<div class="views">浏览<span>'+n.click+'</span></div>';
				_html += '<div><span>作者：'+n.writer+'</span><span>发表时间：'+getToDateTime('Y-m-d',n.pubdate)+'</span><span>分类：<a href="/h/'+n.typedir+'-guide/">'+n.typename+'</a></span></div>';
				_html += '<p>'+n.description+'...<a>查看全文>></a></p>';
			_html += '</div>';
		_html += '</div>';
		$('.tab-pane').append(_html);
	});
	
}

/*
 * 说明：加载城市
 */
function loadCity(_name){
	if(/^[\w\-]+$/.test(_name.trim())){//匹配包括下划线的任何单词字符-	
		$.get('/city/getcity/cityname/'+_name,{'rand':Math.random()},function(data){
			var obj = eval('(' + data + ')');
            $('#'+_name).children('ul').empty();
			append_obj(obj);
		});
	}else{
		return false;
	}
}

/**
 * 
 * 说明： 传入大洲的ID，返回所有国家
 */
function getCountry(_id){
	if(/^[\d]+$/.test(_id)){//匹配数字	
		$.get("/Continent/getAjaxContinent",{'id':_id,'rand':Math.random()},function(data){
			if(data != null){
				var obj = eval('(' + data + ')');
				var _continent = $("[name='keys_country']");
				$.each(obj,function(i,n){
					if(i == 0){
						getAjaxCity(n.id);
					}
					_continent.append("<option value='"+n.id+"'>"+n.typename+"</option>");
					
				});
			}
		});
	}
}

/**
 * 
 * 说明： 传入国家的ID，返回当前ID的所有城市
 */
function getAjaxCity(_id){
	if(/^[\d]+$/.test(_id)){//匹配数字	
		var _city = $("[name='keys_city']");
		_city.empty();
		_city.append("<option value=''>请选择城市</option>");
		$.get("/Country/getAjaxcity",{'country_id':_id,'rand':Math.random()},function(data){
			if(data != null && data != ""){
				var obj = eval('(' + data + ')');				
				$.each(obj,function(i,n){
					_city.append("<option value='"+n.id+"'>"+n.typename+"</option>");
				});
			}
		});
	}
}
/**
 * 
 * 说明：时间比较
 */
function date_compare(a, b) {
    var arr = a.split("-");
	if(arr.length == 3){
		var starttime = new Date(arr[0], arr[1], arr[2]);
		var starttimes = starttime.getTime();
		var arrs = b.split("-");
		var lktime = new Date(arrs[0], arrs[1], arrs[2]);
		var lktimes = lktime.getTime();

		if (starttimes >= lktimes) {
			alert('入住时间大于或等于退房时间，请检查！');
			return false;
		}else{
			return true;
		}
	}else{
		alert('入住时间大于或等于退房时间，请检查！');
		return false;
	}    
}
 
/**
 * 和PHP一样的时间戳格式化函数
 * @param  {string} format    格式
 * @param  {int}    timestamp 要格式化的时间 默认为当前时间
 * @return {string}           格式化的时间字符串
 */
function getToDateTime(format, timestamp){
    var a, jsdate=((timestamp) ? new Date(timestamp*1000) : new Date());
    var pad = function(n, c){
        if((n = n + "").length < c){
            return new Array(++c - n.length).join("0") + n;
        } else {
            return n;
        }
    };
    var txt_weekdays = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
    var txt_ordin = {1:"st", 2:"nd", 3:"rd", 21:"st", 22:"nd", 23:"rd", 31:"st"};
    var txt_months = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var f = {
        // Day
        d: function(){return pad(f.j(), 2)},
        D: function(){return f.l().substr(0,3)},
        j: function(){return jsdate.getDate()},
        l: function(){return txt_weekdays[f.w()]},
        N: function(){return f.w() + 1},
        S: function(){return txt_ordin[f.j()] ? txt_ordin[f.j()] : 'th'},
        w: function(){return jsdate.getDay()},
        z: function(){return (jsdate - new Date(jsdate.getFullYear() + "/1/1")) / 864e5 >> 0},
       
        // Week
        W: function(){
            var a = f.z(), b = 364 + f.L() - a;
            var nd2, nd = (new Date(jsdate.getFullYear() + "/1/1").getDay() || 7) - 1;
            if(b <= 2 && ((jsdate.getDay() || 7) - 1) <= 2 - b){
                return 1;
            } else{
                if(a <= 2 && nd >= 4 && a >= (6 - nd)){
                    nd2 = new Date(jsdate.getFullYear() - 1 + "/12/31");
                    return date("W", Math.round(nd2.getTime()/1000));
                } else{
                    return (1 + (nd <= 3 ? ((a + nd) / 7) : (a - (7 - nd)) / 7) >> 0);
                }
            }
        },
       
        // Month
        F: function(){return txt_months[f.n()]},
        m: function(){return pad(f.n(), 2)},
        M: function(){return f.F().substr(0,3)},
        n: function(){return jsdate.getMonth() + 1},
        t: function(){
            var n;
            if( (n = jsdate.getMonth() + 1) == 2 ){
                return 28 + f.L();
            } else{
                if( n & 1 && n < 8 || !(n & 1) && n > 7 ){
                    return 31;
                } else{
                    return 30;
                }
            }
        },
       
        // Year
        L: function(){var y = f.Y();return (!(y & 3) && (y % 1e2 || !(y % 4e2))) ? 1 : 0},
        //o not supported yet
        Y: function(){return jsdate.getFullYear()},
        y: function(){return (jsdate.getFullYear() + "").slice(2)},
       
        // Time
        a: function(){return jsdate.getHours() > 11 ? "pm" : "am"},
        A: function(){return f.a().toUpperCase()},
        B: function(){
            // peter paul koch:
            var off = (jsdate.getTimezoneOffset() + 60)*60;
            var theSeconds = (jsdate.getHours() * 3600) + (jsdate.getMinutes() * 60) + jsdate.getSeconds() + off;
            var beat = Math.floor(theSeconds/86.4);
            if (beat > 1000) beat -= 1000;
            if (beat < 0) beat += 1000;
            if ((String(beat)).length == 1) beat = "00"+beat;
            if ((String(beat)).length == 2) beat = "0"+beat;
            return beat;
        },
        g: function(){return jsdate.getHours() % 12 || 12},
        G: function(){return jsdate.getHours()},
        h: function(){return pad(f.g(), 2)},
        H: function(){return pad(jsdate.getHours(), 2)},
        i: function(){return pad(jsdate.getMinutes(), 2)},
        s: function(){return pad(jsdate.getSeconds(), 2)},
        //u not supported yet
       
        // Timezone
        //e not supported yet
        //I not supported yet
        O: function(){
            var t = pad(Math.abs(jsdate.getTimezoneOffset()/60*100), 4);
            if (jsdate.getTimezoneOffset() > 0) t = "-" + t; else t = "+" + t;
            return t;
        },
        P: function(){var O = f.O();return (O.substr(0, 3) + ":" + O.substr(3, 2))},
        //T not supported yet
        //Z not supported yet
       
        // Full Date/Time
        c: function(){return f.Y() + "-" + f.m() + "-" + f.d() + "T" + f.h() + ":" + f.i() + ":" + f.s() + f.P()},
        //r not supported yet
        U: function(){return Math.round(jsdate.getTime()/1000)}
    };
       
    return format.replace(/[\\]?([a-zA-Z])/g, function(t, s){
        if( t!=s ){
            // escaped
            ret = s;
        } else if( f[s] ){
            // a date function exists
            ret = f[s]();
        } else{
            // nothing special
            ret = s;
        }
        return ret;
    });
}


function getMap(_id){
	var _this = $(".get_map"+_id);
	$("#map_title").html(_this.attr("title"));
	$("#map_address").attr("src",_this.attr("url"));
	$('#Modal_MAP').modal('show');
}
function getMap_list(_id){
	var _this = $(".get_map"+_id);
	$("#map_title").html($("title").text());
	$("#map_address").attr("src",_this.attr("url"));
	$('#Modal_MAP').modal('show');
}