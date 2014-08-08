/**
 * jQuery Geocoding and Places Autocomplete Plugin - V 1.4
 *
 * @author Martin Kleppe <kleppe@ubilabs.net>, 2012
 * @author Ubilabs http://ubilabs.net, 2012
 * @license MIT License <http://www.opensource.org/licenses/mit-license.php>
 */
!function(t,i,o,e){function n(i,o){this.options=t.extend(!0,{},s,o),this.input=i,this.$input=t(i),this._defaults=s,this._name="geocomplete",this.init()}var s={bounds:!0,country:null,map:!1,details:!1,detailsAttribute:"name",location:!1,mapOptions:{zoom:14,scrollwheel:!1,mapTypeId:"roadmap"},markerOptions:{draggable:!1},maxZoom:16,types:["geocode"]},a="street_address route intersection political country administrative_area_level_1 administrative_area_level_2 administrative_area_level_3 colloquial_area locality sublocality neighborhood premise subpremise postal_code natural_feature airport park point_of_interest post_box street_number floor room lat lng viewport location formatted_address location_type bounds".split(" "),r="id url website vicinity reference name rating international_phone_number icon formatted_phone_number".split(" ");t.extend(n.prototype,{init:function(){this.initMap(),this.initMarker(),this.initGeocoder(),this.initDetails(),this.initLocation()},initMap:function(){return this.options.map?"function"==typeof this.options.map.setCenter?void(this.map=this.options.map):void(this.map=new google.maps.Map(t(this.options.map)[0],this.options.mapOptions)):void 0},initMarker:function(){if(this.map){var i=t.extend(this.options.markerOptions,{map:this.map});i.disabled||(this.marker=new google.maps.Marker(i),google.maps.event.addListener(this.marker,"dragend",t.proxy(this.markerDragged,this)))}},initGeocoder:function(){var i={types:this.options.types,bounds:this.options.bounds===!0?null:this.options.bounds,componentRestrictions:this.options.componentRestrictions};this.options.country&&(i.componentRestrictions={country:this.options.country}),this.autocomplete=new google.maps.places.Autocomplete(this.input,i),this.geocoder=new google.maps.Geocoder,this.map&&this.options.bounds===!0&&this.autocomplete.bindTo("bounds",this.map),google.maps.event.addListener(this.autocomplete,"place_changed",t.proxy(this.placeChanged,this)),this.$input.keypress(function(t){return 13===t.keyCode?!1:void 0}),this.$input.bind("geocode",t.proxy(function(){this.find()},this))},initDetails:function(){function i(t){n[t]=o.find("["+e+"="+t+"]")}if(this.options.details){var o=t(this.options.details),e=this.options.detailsAttribute,n={};t.each(a,function(t,o){i(o),i(o+"_short")}),t.each(r,function(t,o){i(o)}),this.$details=o,this.details=n}},initLocation:function(){var t=this.options.location,i;if(t)return"string"==typeof t?void this.find(t):(t instanceof Array&&(i=new google.maps.LatLng(t[0],t[1])),t instanceof google.maps.LatLng&&(i=t),i&&this.map&&this.map.setCenter(i),void 0)},find:function(t){this.geocode({address:t||this.$input.val()})},geocode:function(i){this.options.bounds&&!i.bounds&&(i.bounds=this.options.bounds===!0?this.map&&this.map.getBounds():this.options.bounds),this.options.country&&(i.region=this.options.country),this.geocoder.geocode(i,t.proxy(this.handleGeocode,this))},handleGeocode:function(t,i){if(i===google.maps.GeocoderStatus.OK){var o=t[0];this.$input.val(o.formatted_address),this.update(o),t.length>1&&this.trigger("geocode:multiple",t)}else this.trigger("geocode:error",i)},trigger:function(t,i){this.$input.trigger(t,[i])},center:function(t){t.viewport?(this.map.fitBounds(t.viewport),this.map.getZoom()>this.options.maxZoom&&this.map.setZoom(this.options.maxZoom)):(this.map.setZoom(this.options.maxZoom),this.map.setCenter(t.location)),this.marker&&(this.marker.setPosition(t.location),this.marker.setAnimation(this.options.markerOptions.animation))},update:function(t){this.map&&this.center(t.geometry),this.$details&&this.fillDetails(t),this.trigger("geocode:result",t)},fillDetails:function(i){var o={},e=i.geometry,n=e.viewport,s=e.bounds;t.each(i.address_components,function(t,i){var e=i.types[0];o[e]=i.long_name,o[e+"_short"]=i.short_name}),t.each(r,function(t,e){o[e]=i[e]}),t.extend(o,{formatted_address:i.formatted_address,location_type:e.location_type||"PLACES",viewport:n,bounds:s,location:e.location,lat:e.location.lat(),lng:e.location.lng()}),t.each(this.details,t.proxy(function(t,i){var e=o[t];this.setDetail(i,e)},this)),this.data=o},setDetail:function(t,i){i===e?i="":"function"==typeof i.toUrlValue&&(i=i.toUrlValue()),t.is(":input")?t.val(i):t.text(i)},markerDragged:function(t){this.trigger("geocode:dragged",t.latLng)},resetMarker:function(){this.marker.setPosition(this.data.location),this.setDetail(this.details.lat,this.data.location.lat()),this.setDetail(this.details.lng,this.data.location.lng())},placeChanged:function(){var t=this.autocomplete.getPlace();t.geometry?this.update(t):this.find(t.name)}}),t.fn.geocomplete=function(i){var o="plugin_geocomplete";if("string"==typeof i){var e=t(this).data(o)||t(this).geocomplete().data(o),s=e[i];return"function"==typeof s?(s.apply(e,Array.prototype.slice.call(arguments,1)),t(this)):(2==arguments.length&&(s=arguments[1]),s)}return this.each(function(){var e=t.data(this,o);e||(e=new n(this,i),t.data(this,o,e))})}}(jQuery,window,document);