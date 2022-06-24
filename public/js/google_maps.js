//import


//end import

var searchInput = 'search_input';
var map;
var mark;



let text_ = document.querySelector('.search_input');

$(text_).on('click', () => {
    $(text_).val('');
})

google.maps.event.addDomListener(window, "load", function() {


    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.570868, lng: -74.297333 },
        zoom: 5,
        mapTypeControl: false,
    });






    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        // types: ['geocode', '', 'doctor'],
    });

    var place = autocomplete.getPlace();




    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var near_place = autocomplete.getPlace();

        //limpia mapa
        //alert(near_place)
        //clear_maps(maps)
        darwing(near_place)
            //console.log(near_place.address_components);
            //flay(near_place)
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


    });
});



// naegar a punto
function flay(near_place) {}


//clear maps
async function clear_maps(feature) {
    console.log("limpiando");
    await map.data.setStyle({ visible: false });


}

//drawin maps
function darwing(near_place) {
    console.log("dibujando");
    console.log(near_place);
    clear_maps(near_place)
    //console.log(near_place.address_components[0].long_name);
    let locations = [
        { location: 'Bogotá', cod: '11' },
        { location: 'Cartagena de Indias', cod: '13' },
        { location: 'Barranquilla', cod: '08' },
        { location: 'Bello', cod: '05' },
        { location: 'Cali', cod: '76' },
        { location: 'Envigado', cod: '05' },
        { location: 'Itagüi', cod: '05' },
        { location: 'Medellín', cod: '05' },
        { location: 'Bucaramanga', cod: '68' },
        { location: 'Floridablanca', cod: '68' },
        { location: 'Cúcuta', cod: '54' },
        { location: 'Soledad', cod: '08' },
        { location: 'Armenia', cod: '63' },
        { location: 'Pereira', cod: '66' },
        { location: 'Manizales', cod: '17' },
    ]

    const resultado = locations.find(fruta => fruta.location === near_place.address_components[0].long_name);
    console.log(resultado);
    draw(resultado)
        //console.log(maps);
}

// dibujar mapa
function draw(data) {
    var geo = [];
    /*
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.570868, lng: -74.297333 },
        zoom: 8,
        mapTypeControl: false,
    });
*/
    //console.log(map.data);
    //console.log(data.cod);
    try {
        for (let index = 0; index <= 4748; index++) {
            if (maps.features[index].properties.name != undefined) {
                let re = maps.features[index].properties.name.substr(0, 2) === data.cod;
                if (re === true) {
                    //console.log(maps.features[index]);
                    geo.unshift(maps.features[index])
                }
            }

        }

        var data_geo = {
                type: 'FeatureCollection',
                features: geo,
                type: "FeatureCollection"
            }
            //console.log(maps);
     console.log(data_geo);

        map.data.addGeoJson(data_geo)
        //map.data.addGeoJson(json);
    } catch (error) {
        //console.log("valor : ", geo.length);
        var data_geo = {
                type: 'FeatureCollection',
                features: geo,
                type: "FeatureCollection"
            }
            //console.log(maps);
     console.log(data_geo);

        map.data.addGeoJson(data_geo)
            //console.log(json);
            //console.log(error);
    }
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
        // console.log(event.feature);
        //console.log(event.latLng);
        infoWindow.setPosition(event.latLng);
        infoWindow.setContent(
            '<div class="text-center p-2" style="z-index: 99999">' +
            '<img src="https://www.close-upinternational.com/img/logo.svg" alt="logo">' + '</br>' +
            event.feature.j.description +
            '</div>'
        );
        infoWindow.open(map);
        //map.setCenter(event.latLng);
    });


}