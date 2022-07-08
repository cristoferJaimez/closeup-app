const init = () => {
    if (!"geolocation" in navigator) {
        return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
    }


    const onActualizacionDeUbicacion = ubicacion => {
        const coordenadas = ubicacion.coords;
        let { latitude, longitude } = coordenadas;
        //console.log(latitude, longitude);
        document.getElementById('lat_lng').value = latitude + "   " + longitude;
        document.getElementById('lat').value = latitude;
        document.getElementById('lng').value = longitude;

        const destination = new google.maps.LatLng(latitude, longitude);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'location': destination }, function(results, status) {

            if (status == 'OK') {
                console.log(results);
                document.getElementById('dir_google').innerHTML = results[0].formatted_address;
                document.getElementById('adress').value = results[0].formatted_address;
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });



        autocomplete = new google.maps.places.Autocomplete((document.getElementById('lat_lng')), {
            //types: ['cities'],
        });
        //var place = autocomplete.getPlace();

        //console.log(place);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var near_place = autocomplete.getPlace();
            console.log(near_place);
        });

    }

    const onErrorDeUbicacion = err => {
        console.log("Error obteniendo ubicación: ", err);
    }


    const opcionesDeSolicitud = {
        enableHighAccuracy: true, // Alta precisión
        maximumAge: 0, // No queremos caché
        timeout: 10000 // Esperar solo 5 segundos
    };

    idWatcher = navigator.geolocation.watchPosition(onActualizacionDeUbicacion, onErrorDeUbicacion, opcionesDeSolicitud);
}