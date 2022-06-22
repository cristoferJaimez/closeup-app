var searchInput = 'search_input';



google.maps.event.addDomListener(window, "load", function() {

    var map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.570868, lng: -74.297333 },
        zoom: 5
    });



    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
       // types: ['geocode', '', 'doctor'],
    });

    var place = autocomplete.getPlace();

    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var near_place = autocomplete.getPlace();
        console.log(near_place.formatted_address);
        map.setCenter(near_place.geometry.location)
        var coor = { lat: near_place.geometry.location.lat(), lng: near_place.geometry.location.lng() }
        map.setZoom(15)
        new google.maps.Marker({
            position: coor,
            map,
            title: "'"+near_place.formatted_address+"+",
        });

        /* document.getElementById('loc_lat').value = near_place.geometry.location.lat();
        document.getElementById('loc_long').value = near_place.geometry.location.lng();

        document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
        document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
    */
    });




});

function al() {
    alert('volado')
}

/*
    const myLatLng = { lat: 4.570868, lng: -74.297333 };
    const mapa = new google.maps.Map(document.getElementById("map"), {
        zoom: 5,
        center: myLatLng,
    });


    var complete = document.getElementById('autocomplete');
    const search = new google.maps.places.Autocomplete(complete)
    search.bindTo("bounds", mapa);


    //dibujarpoligono
    var poligono = new google.maps.Polygon({
        path: ,
        map: mapa,
        strokeColor: 'rgb(255, 0, 0)',
        fillColor: 'rgb(255, 255, 0)',
        strokeWeight: 1,
    });



    //informacion
    var popup = new google.maps.InfoWindow();

    poligono.addListener('click', function(e) {
        popup.setContent(`${e.latLng}`);
        popup.setPosition(e.latLng);
        popup.open(mapa);
    });


    /*

    new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Close Up",
    });
*/