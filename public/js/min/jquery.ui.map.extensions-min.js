!function(t){t.extend(t.ui.gmap.prototype,{getCurrentPosition:function(t,n){navigator.geolocation?navigator.geolocation.getCurrentPosition(function(n){t(n,"OK")},function(n){t(null,n)},n):t(null,"NOT_SUPPORTED")},watchPosition:function(t,n){navigator.geolocation?this.set("watch",navigator.geolocation.watchPosition(function(n){t(n,"OK")},function(n){t(null,n)},n)):t(null,"NOT_SUPPORTED")},clearWatch:function(){navigator.geolocation&&navigator.geolocation.clearWatch(this.get("watch"))},autocomplete:function(n,i){var o=this;t(this._unwrap(n)).autocomplete({source:function(n,i){o.search({address:n.term},function(n,o){"OK"===o?i(t.map(n,function(t){return{label:t.formatted_address,value:t.formatted_address,position:t.geometry.location}})):"OVER_QUERY_LIMIT"===o&&alert("Google said it's too much!")})},minLength:3,select:function(t,n){o._call(i,n)},open:function(){t(this).removeClass("ui-corner-all").addClass("ui-corner-top")},close:function(){t(this).removeClass("ui-corner-top").addClass("ui-corner-all")}})},placesSearch:function(t,n){this.get("services > PlacesService",new google.maps.places.PlacesService(this.get("map"))).search(t,n)},clearDirections:function(){var t=this.get("services > DirectionsRenderer");t&&(t.setMap(null),t.setPanel(null))},pagination:function(n){var i=t("<div id='pagination' class='pagination shadow gradient rounded clearfix'><div class='lt btn back-btn'></div><div class='lt display'></div><div class='rt btn fwd-btn'></div></div>"),o=this,e=0,n=n||"title";o.set("p_nav",function(t,a){t&&(e+=a,i.find(".display").text(o.get("markers")[e][n]),o.get("map").panTo(o.get("markers")[e].getPosition()))}),o.get("p_nav")(!0,0),i.find(".back-btn").click(function(){o.get("p_nav")(e>0,-1,this)}),i.find(".fwd-btn").click(function(){o.get("p_nav")(o.get("markers").length-1>e,1,this)}),o.addControl(i,google.maps.ControlPosition.TOP_LEFT)}})}(jQuery);