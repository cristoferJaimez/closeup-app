const init = () => {
    if (!"geolocation" in navigator) {
        return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
    }

    let datos_ = [];
    const onActualizacionDeUbicacion = ubicacion => {
        const coordenadas = ubicacion.coords;
        const mts = ubicacion.coords.accuracy
        let { latitude, longitude } = coordenadas;
        //console.log(latitude, longitude);
        document.getElementById('lat_lng').value = "Lat: " + latitude + ",  Lng: " + longitude;
        document.getElementById('lat').value = latitude;
        document.getElementById('lng').value = longitude;

        const destination = new google.maps.LatLng(latitude, longitude);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'location': destination }, function(results, status) {

            if (status == 'OK') {
                document.querySelector('.msm_').innerHTML = "Loading...";

                console.log(results);
                let google = document.getElementById('dir_google').innerHTML = results[0].formatted_address;
                document.getElementById('adress').value = results[0].formatted_address;
                document.getElementById('dir_mts').innerHTML = 'Exactitud : ' + Math.round(mts) + ' metros';
                let div_google = google.split(",")
                let pos = div_google.length;
                console.log(div_google);
                console.log(pos);
                $.ajax({
                    url: "form_geo",
                    data: {
                        "_token": $("meta[name='csrf-token']").attr("content"),
                        "google": `${div_google[pos -2]}`
                    },
                    method: "POST",
                    success: function(response) {
                        const select = document.querySelector('.mi-localidad');
                        datos_ = response;
                        const unicos = [];

                        for (var i = 0; i < response.length; i++) {
                            const elemento = response[i].desc_utc;
                            unicos.push(elemento);

                        }
                        console.log(unicos);
                        const unicos_ = [...new Set(unicos)]

                        unicos_.forEach(e => {
                            const option = document.createElement('option');
                            option.text = e;
                            option.value = e;
                            select.appendChild(option);

                        })
                        document.querySelector('.msm_').innerHTML = "OK.";
                        $('.msm_').removeClass('text-danger');
                        $('.msm_').addClass('text-success');
                        $('.msm_').hide('5000')


                    },
                    error: function(err) {
                        console.log(err);
                    }
                })

                //consultar
                //clear_maps(near_place)
                let locations = [
                    { location: 'Atlántico', cod: '08', api: 'barranquilla.json' },
                    { location: 'Antioquia', cod: '05', api: 'medellin.json' },

                    { location: 'Bogotá', cod: '11', api: 'bogota.json' },
                    { location: 'Cartagena de Indias', cod: '13', api: 'cartagena.json' },
                    { location: 'Cartagena', cod: '13', api: 'cartagena.json' },
                    { location: 'Barranquilla', cod: '08', api: 'barranquilla.json' },
                    { location: 'Bello', cod: '05', api: 'bello.json' },
                    { location: 'Cali', cod: '76', api: 'cali.json' },
                    { location: 'Valle del Cauca', cod: '76', api: 'cali.json' },
                    { location: 'Envigado', cod: '05', api: 'envigado.json' },
                    { location: 'Itagüi', cod: '05', api: 'itagui.json' },
                    { location: 'Medellín', cod: '05', api: 'medellin.json' },
                    { location: 'Bucaramanga', cod: '68', api: 'bucaramanga.json' },
                    { location: 'Floridablanca', cod: '68', api: 'floridablanca.json' },
                    { location: 'Cúcuta', cod: '54', api: 'cucuta.json' },
                    { location: 'Soledad', cod: '08', api: 'soledad.json' },
                    { location: 'Armenia', cod: '63', api: 'armenia.json' },
                    { location: 'Pereira', cod: '66', api: 'pereira.json' },
                    { location: 'Manizales', cod: '17', api: 'manizales.json' },

                    { location: 'Amazonas', cod: '91', api: 'amazonas.json' },
                    { location: 'Arauca', cod: '81', api: 'arauca.json' },
                    { location: 'Cundinamarca', cod: '25', api: 'cundinamarca.json' },
                    { location: 'Boyacá', cod: '15', api: 'boyaca.json' },
                    { location: 'Bolívar', cod: '13', api: 'bolivar.json' },
                    { location: 'Santander', cod: '68', api: 'santander.json' },
                    { location: 'Pasto', cod: '52', api: 'pasto.json' },
                    { location: 'Vichada', cod: '99', api: 'vichada.json' },
                    { location: 'Vaupés', cod: '97', api: 'vaupes.json' },
                    { location: 'Guainía', cod: '94', api: 'guainia.json' },
                    { location: 'San Andrés', cod: '88', api: 'san_andres.json' },
                    { location: 'Putumayo', cod: '86', api: 'putumayo.json' },
                    { location: 'Casanare', cod: '85', api: 'casanare.json' },

                    { location: 'Caldas', cod: '17', api: 'caldas.json' },
                    { location: 'Caquetá', cod: '18', api: 'caqueta.json' },
                    { location: 'Cauca', cod: '19', api: 'cauca.json' },
                    { location: 'Cesar', cod: '20', api: 'cesar.json' },
                    { location: 'Córdoba', cod: '23', api: 'cordoba.json' },
                    { location: 'Chocó', cod: '27', api: 'choco.json' },

                    { location: 'Huila', cod: '41', api: 'huila.json' },
                    { location: 'La Guajira', cod: '44', api: 'la_guajira.json' },
                    { location: 'Magdalena', cod: '44', api: 'magdalena.json' },
                    { location: 'Meta', cod: '50', api: 'meta.json' },
                    { location: 'Narino', cod: '52', api: 'narino.json' },
                    { location: 'Nariño', cod: '52', api: 'narino.json' },
                    { location: 'Norte de Santander', cod: '54', api: 'norte_santander.json' },
                    { location: 'Quindío', cod: '63', api: 'quindio.json' },
                    { location: 'Risaralda', cod: '66', api: 'risaralda.json' },
                    { location: 'Sucre', cod: '70', api: 'sucre.json' },
                    { location: 'Tolima', cod: '73', api: 'tolima.json' },
                    { location: 'Valle del Cauca', cod: '76', api: 'valle_cauca.json' },
                    { location: 'Alban', cod: '52', api: 'narino.json' },
                    { location: 'Arboleda', cod: '52', api: 'narino.json' },
                    { location: 'Arenal', cod: '13', api: 'bolivar.json' },

                ]
                var resultado;
                try {
                    for (let i = 0; i <= results.length; i++) {
                        for (let k = 0; k < results[i].address_components.length; k++) {
                            let ver = results[i].address_components[k].long_name;
                            locations.forEach(e => {
                                if (e.location === ver) {
                                    resultado = e;
                                } else {

                                }

                            })
                        }

                    } //console.log(resultado.api);

                    console.log(resultado);
                } catch (error) {
                    //console.log(error);
                    console.log(resultado);
                }
            } else {
                //alert('Geocode was not successful for the following reason: ' + status);
            }
        });


        $('.mi-cadena').on('change', e => {
            console.log($(this).val());
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
        enableHighAccuracy: true,
        maximumAge: 60000,
        timeout: 45000
    };

    idWatcher = navigator.geolocation.getCurrentPosition(onActualizacionDeUbicacion, onErrorDeUbicacion, opcionesDeSolicitud);
}