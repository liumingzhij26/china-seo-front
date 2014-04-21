// WebTrends SmartSource Data Collector Tag v10.2.0
// Copyright (c) 2012 Webtrends Inc.  All rights reserved.
// Tag Builder Version: 4.0.170.0
// Created: 5/8/2012 4:28:58 PM
window.webtrendsAsyncInit=function(){
    var dcs=new Webtrends.dcs().init({
        dcsid:"dcscfchfzvz5bdrpz13vsgjna_9r8u"
        ,domain:"ctix8.cheaptickets.com"
        ,timezone:-6
		,navigationtag: "div,span"
        ,plugins:{
            hm:{src:"//s.webtrends.com/js/webtrends.hm.js"}
			,submitClick:{ src:"scripts/submitClick.js" }
			,buttonClick:{ src:"scripts/buttonClick.js" }
			,LinkTrack: { src: "scripts/linkTrack.js", DivList: ".*" }
			
        }
        }).track();
};
(function(){
    var s=document.createElement("script"); s.async=true; s.src="scripts/webtrends.js";    
    var s2=document.getElementsByTagName("script")[0]; s2.parentNode.insertBefore(s,s2);
}());
