(function() {
    var TrackDivs = "";

    LinkTrack = {
        IsInDiv: function(checkDiv) {
            var DivList = TrackDivs.split(";");
            for (var i = 0; i < DivList.length; i++) {
                if (checkDiv.match(DivList[i])) {
                    return true
                }
            }
            return false;
        },
        doWork: function(dcs, options) {
        dcs.addSelector('a', {
            filter: function(dcsObject, o) {
                var e = o['element'] || {};
                var evt = o['event'] || {};
                if (LinkTrack.IsInDiv(dcsObject.dcsNavigation(evt, dcsObject.navigationtag)))
                    return false;
                else
                    return true;
            },
            transform: function(dcsObject, o) {
                var e = o['event'] || {};
                var el = o['element'] || {};
                dcsObject._autoEvtSetup(o);
                var res = dcsObject.getURIArrFromEvent(el);
                o['argsa'].push(
	                        "DCS.dcssip", res.dcssip,
	                        "DCS.dcsuri", res.dcsuri + o['element'].hash,
	                        "DCS.dcsqry", res.dcsqry,
	                        "DCS.dcsref", res.dcsref,
	                        "WT.ti", "Link:" + o['element'].hash,
	                        "WT.nv", dcsObject.dcsNavigation(e, dcsObject.navigationtag),
	                        "WT.dl", "1");
                dcsObject._autoEvtCleanup(o);
            }
        });
            TrackDivs = options["DivList"];
        }
    }

})();


Webtrends.registerPlugin("LinkTrack", LinkTrack.doWork);