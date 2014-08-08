var gmarkers = [];
$('#mapa').gmap({'center':new google.maps.LatLng('-22.979826', '-46.990110')}).bind('init', function() {
    var a = 0;
    $.getJSON( 'js/spots', function(data) {
        $.each( data, function(i, marker) {
            console.log(i);
            var m = $('#mapa').gmap('addMarker', {
                'teste': a++,
                'cat_id': [marker[1].cat_id, '0'],
                'truck_id': [marker[1].id, '0'],
                'tags': marker[3],
                'spot_id': [marker.id],
                'position': new google.maps.LatLng(marker[0][1], marker[0][0]),
                'bounds': true
            }).click(function() {
                $('#mapa').gmap('openInfoWindow', { 'maxWidth': '700','content': '' +
                '<div class="map">' +
                '<div class="imageMap"><img src='+marker[1].logo+'/></div>' +
                '<div class="bodyMap"><h2>'+marker[1].nome+'</h2>' +
                '<p class="social">' +
                '<a href="truck/'+marker[1].slug+'">http://foodtrucker.com.br/truck/'+marker[1].slug+'</a> <br/>' +
                '<i class="fa fa-facebook-square fa-lg"></i> </b><a href="http://fb.com/'+marker[1].facebook+'">'+marker[1].facebook+'</a> <i class="fa fa-instagram fa-lg"></i> </b><a href="http://instagram.com/'+marker[1].instagram+'">'+marker[1].instagram+'</a></p>' +
                '<p>'+marker.local+'</p>' +
                '<p>'+marker.dataParsed+'</p>' +
                '</div>' +
                '<p class="servicos"> '+
                '<span>'+marker[2][0]+'Sobremesa</span>'+
                '<span>'+marker[2][1]+'Bebidas</span>'+
                '<span>'+marker[2][2]+'Música</span>'+
                '<span>'+marker[2][3]+'Cartão de Crédito</span>'+
                '<span>'+marker[2][4]+'Cartão de Débito</span>'+
                '<span>'+marker[2][5]+'Vale-Refeição</span>'+
                '</p>' +
                '</div>'
                }, this);
            })[0];
            console.log(marker);
            $('<li><a href="#" ><b>HOJE - '+ marker.inicio.slice(0,-3)+'</b> - ' + marker.local + '</a></li>')
                .data('marker',m)
                .appendTo('ul.truck-'+marker[1].id+ ' div')
                .click(function(e){
                    e.preventDefault();
                    google.maps.event.trigger($(this).data('marker'),'click');
                    $('#mapa').gmap('find', 'markers', { 'property': 'spot_id', 'value': marker.id }, function(marker, found) {
                        if(found){
                            var truck = new google.maps.LatLng(marker.position.k, marker.position.B);
                            $('#mapa').gmap('get','map').setOptions({'center':truck});
                        }
                    });
                });
        });
    });
});
$('.clean').click(function(){
    $("#mapa").gmap('clear', 'overlays > Circle');
    $('#filter_address').val('');
    $(this).css('opacity',0);
});
$('#filter_address').geocomplete({
    details: "form"
}).bind("geocode:result", function(event, result){
    $('.clean').css('opacity',1);
    $("#mapa").gmap('clear', 'overlays > Circle');
    var clientPosition = new google.maps.LatLng(result.geometry.location.k, result.geometry.location.B);
    $('#mapa').gmap('get','map').setOptions({'center':clientPosition});
    $('#mapa').gmap('addShape', 'Circle', {
        'strokeWeight': 0,
        'fillColor': "#008595",
        'fillOpacity': 0.25,
        'center': clientPosition,
        'radius': 10000,
        'clickable': false
    });
});
var $select = $('.filter_select').selectize();
var categoria = $select[0].selectize;
var truck = $select[1].selectize;
$('#filter_categoria').next('.selectize-control').click(function(){
    truck.setValue(0);
    $("#filter_taste").tagit("removeAll");
});
$('#filter_truck').next('.selectize-control').click(function(){
    categoria.setValue(0);
    $("#filter_taste").tagit("removeAll");
});
$('#filter_categoria').bind('change', function () {
    var cat_id = $(this).val();
    $('#mapa').gmap('find', 'markers', { 'property': 'cat_id', 'value': [cat_id] }, function(marker, found) {
        if(found){
            var truck = new google.maps.LatLng(marker.position.k, marker.position.B);
            $('#mapa').gmap('get','map').setOptions({'center':truck});
        }
        marker.setVisible(found);
    });
});
$('#filter_truck').bind('change', function () {
    var truck_id = $(this).val();
    $('#mapa').gmap('find', 'markers', { 'property': 'truck_id', 'value': [truck_id] }, function(marker, found) {
        if(found){
            console.log(marker);
            var truck = new google.maps.LatLng(marker.position.k, marker.position.B);
            $('#mapa').gmap('get','map').setOptions({'center':truck});
        }
        marker.setVisible(found);
    });
});
$('.fake_link_spots').click(function(){
    truck.setValue(0);
    categoria.setValue(0);
    var spot = $(this).data('spot').toString();
    $('#mapa').gmap('find', 'markers', { 'property': 'spot_id', 'value': spot }, function(marker, found) {
        if(found){
            var truck = new google.maps.LatLng(marker.position.k, marker.position.B);
            $('#mapa').gmap('get','map').setOptions({'center':truck});
        }
        marker.setVisible(found);
    });
});
$("#filter_taste").tagit({
    placeholderText: 'O que você quer comer?',
    tagLimit:1,
    fieldName: "tags",
    allowSpaces: true,
    tagSource: function(search, showChoices) {
        var that = this;
        $.ajax({
            url: "/js/tags/"+search.term,
            data: {q: search.term},
            success: function(choices) {
                showChoices(that._subtractArray(choices, that.assignedTags()));
            }
        });
    },beforeTagAdded: function() {
        truck.setValue(0);
        categoria.setValue(0);
    },afterTagAdded: function(event, ui) {
        $('#mapa').gmap('find', 'markers', { 'property': 'tags', 'value': [ui.tagLabel] }, function(marker, found) {
            if(found){
                var truck = new google.maps.LatLng(marker.position.k, marker.position.B);
                $('#mapa').gmap('get','map').setOptions({'center':truck});
            }
            marker.setVisible(found);
        });
    },afterTagRemoved: function(){
        $('#mapa').gmap('find', 'markers', { 'property': 'cat_id', 'value': '0' }, function(marker, found) {
            marker.setVisible();
        });
    }
});

function linkClick(id){
    console.log(gmarkers);
    console.log(id);
}