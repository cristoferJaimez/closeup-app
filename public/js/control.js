var heat;

//
$(document).on('click', '.fv', function(e) {
    let linea = document.getElementById('linea_tiempo')
    let hist = document.getElementById('historial')
    let fv = document.querySelector('.fv').checked;
    if (fv === true) {
        //$(linea).show(500)
        $(hist).show(500)
            //activar capa de calor
        $(calor()).show(1000)

    } else {
        //$(linea).hide(500)
        $(hist).hide(500)
        heat.remove();
    }

})


//activar controles de linea de tiempo
$(document).on('change', '.linea_tiempo', function(e) {
    console.log($(this).val());
})

//mapa de calor
function calor() {
    heat = L.heatLayer([
        [4.570868, -74.297333, 1474474719471],
        [4.470868, -73.297333, 14744741] // lat, lng, intensity

    ], {
        scaleRadius: true,
        useLocalExtrema: true,
        maxOpacity: 0.8,
        radius: 25,
        blur: 15, // default value
    }).addTo(map);

}