(function() {
	buttonClick= {
		transformWorker:function(dcs, options) {
		},
		doWork:function(dcs, options) { 
			dcs.addSelector("INPUT[type='button']", {
									  transform: function(dcs,o) {
										if (o.element.form){
											uri=o.element.form.action||window.location.pathname;
											ttl=o.element.form.id||o.element.form.name||o.element.form.className||"Unknown";
											id=(o.element.form.method&&(o.element.form.method.toLowerCase()=="post"))?"27":"26";
										}
										else{
											uri=window.location.pathname;
											ttl=o.element.name||o.element.id||"Unknown";
											id="28";
										}
										o["argsa"].push("DCS.dcsuri", uri, "WT.ti", "FormButton:"+ttl, "WT.dl", id);
									  }
			});
		}
	}
})();

Webtrends.registerPlugin("buttonClick",buttonClick.doWork);