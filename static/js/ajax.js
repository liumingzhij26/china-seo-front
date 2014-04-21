;(function($) {	
	$.extend( {
				lmz : {
					Point : {
						getX : function() {
							if (typeof window.innerWidth != 'undefined') {
								return window.innerWidth;

							} else {
								return document.documentElement.clientWidth;
							}
						},
						getY : function() {
							if (typeof window.innerWidth != 'undefined') {
								return window.innerHeight;
							} else {
								return document.documentElement.clientHeight;
							}
						}
					},
					isInt : function() {
						if (arguments.length == 0 || arguments.length > 1)
							return false;
						return !/\D+/.test(arguments[0]);
					},
					getObjPoint : function(x, y) {
						var _x = (this.Point.getX() - x) / 2;
						var _y = (this.Point.getY() - y) / 2;
						return {
							top : _y,
							left : _x
						};
					}
				},
				debug : function(mess) {
					/*
					 * 防止浏览器不支持console报错
					 */
					if (window.console) 
						console.info(mess);
					else 
						return;
				},				
				B : {
					isMozilla : (typeof document.implementation != 'undefined')
							&& (typeof document.implementation.createDocument != 'undefined')
							&& (typeof HTMLDocument != 'undefined'),
					isIE : window.ActiveXObject ? true : false,
					isFirefox : (navigator.userAgent.toLowerCase().indexOf("firefox") != -1),
					isSafari : (navigator.userAgent.toLowerCase().indexOf("safari") != -1),
					isOpera : (navigator.userAgent.toLowerCase().indexOf("opera") != -1)

				}
			});

})(jQuery);

function getScroll(){
	return {
		top : document.documentElement.scrollTop || document.body.scrollTop,
		left : document.documentElement.scrollLeft || document.body.scrollLeft
	}
}
