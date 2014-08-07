$('#mapa').gmap().bind('init', function() {
    // This URL won't work on your localhost, so you need to change it
    // see http://en.wikipedia.org/wiki/Same_origin_policy
    $.getJSON( 'js/spots', function(data) {
        $.each( data, function(i, marker) {
            console.log(marker);
            $('#mapa').gmap('addMarker', {
                'position': new google.maps.LatLng(marker[0][1], marker[0][0]),
                'bounds': true
            }).click(function() {
                $('#mapa').gmap('openInfoWindow', { 'maxWidth': '700','content': '' +
                '<div class="map">' +
                '<div class="imageMap"><img src='+marker[1].logo+'/></div>' +
                '<div class="bodyMap"><h2>'+marker[1].nome+'</h2>' +
                '<p class="social"><i class="fa fa-facebook-square fa-lg"></i> </b><a href="http://fb.com/'+marker[1].facebook+'">'+marker[1].facebook+'</a> <i class="fa fa-instagram fa-lg"></i> </b><a href="http://instagram.com/'+marker[1].instagram+'">'+marker[1].instagram+'</a></p>' +
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