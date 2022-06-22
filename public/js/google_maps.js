var searchInput = 'search_input';
var map;
var mark;


google.maps.event.addDomListener(window, "load", function() {

    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.570868, lng: -74.297333 },
        zoom: 5
    });


    darwing()


    //console.log(map.data);
    map.data.setStyle({
        icon: 'https://www.close-upinternational.com/img/logo.svg',
        fillColor: 'green',
        strokeColor: 'red',
        clickable: true,
        fillOpacity: 0.2,
        strokeWeight: 1,
        geodesic: true,
    });

    var infoWindow = new google.maps.InfoWindow();


    map.data.addListener('click', function(event) {
        $(event.feature.j.description).addClass('table table-striped ')

        //console.log(event);
        map.data.overrideStyle(event.feature, { fillColor: 'red', strokeColor: 'blue', strokeWeight: 1 });
        //console.log(event.latLng);
        infoWindow.setPosition(event.latLng);
        infoWindow.setContent(
            '<div class="text-center p-2">' +
            '<img src="https://www.close-upinternational.com/img/logo.svg" alt="logo">' + '</br>' +
            event.feature.j.description +
            '</div>'
        );
        infoWindow.open(map);
        //map.setCenter(event.latLng);
    });



    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        // types: ['geocode', '', 'doctor'],
    });

    var place = autocomplete.getPlace();




    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var near_place = autocomplete.getPlace();

        //limpia mapa
        clear_maps()
            //console.log(near_place);
        flay(near_place)


    });
});



// naegar a punto
function flay(near_place) {
    map.setCenter(near_place.geometry.location)
    var coor = { lat: near_place.geometry.location.lat(), lng: near_place.geometry.location.lng() }
    map.setZoom(15)
    mark = new google.maps.Marker({
        //draggable: true,
        animation: google.maps.Animation.DROP,
        position: coor,
        map,
        title: "" + near_place.formatted_address + "",
    });
    //console.log(mark);
    var popup = new google.maps.InfoWindow();

    mark.addListener('click', function(e) {
        popup.setContent('<table class="table table-striped">' +
            '<tr>' +
            '<th colspan="2"><strong>' + `${near_place.formatted_address}` + '</strong></th>' +
            '</tr>'

            +
            '</table>'
        );
        popup.setPosition(e.latLng);
        popup.open(map);


    });
}




//drawin maps
function darwing() {
    map.data.addGeoJson(maps);
}


//clear maps
function clear_maps() {

}