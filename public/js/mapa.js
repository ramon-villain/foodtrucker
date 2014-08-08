$('#mapa').gmap().bind('init', function() {
    $.getJSON( 'js/spots', function(data) {
        $.each( data, function(i, marker) {
            $('#mapa').gmap('addMarker', {
                'cat_id': [marker[1].cat_id, '0'],
                'truck_id': [marker[1].id, '0'],
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
            });
        });
    });
});