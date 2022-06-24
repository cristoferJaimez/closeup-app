const init = () => {
    if (!"geolocation" in navigator) {
        return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
    }


    const onActualizacionDeUbicacion = ubicacion => {
        const coordenadas = ubicacion.coords;
        let { latitude, longitude } = coordenadas;
        console.log(latitude, longitude);
        document.getElementById('lat_lng').value = latitude + "   " + longitude;
        document.getElementById('lng_').innerHTML = longitude;


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