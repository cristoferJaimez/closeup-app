let linea = document.getElementsByClassName('linea_tiempo');

$( document ).on( 'click', '.fv', function(e){
    let fv = document.querySelector('.fv').checked;
    if(fv === true){
        $(linea).show(500)
        //activar capa de calor
        $(calor()).show(1000)
        
    }else{
        $(linea).hide(500)
        removeMarkers();
    }
    
})



//mapa de calor
function calor() {
    var heat = L.heatLayer([
        [4.570868, -74.297333, 1474474719471],
        [4.470868, -73.297333, 14744741] // lat, lng, intensity
        
    ],
    {
        radius: 25,
        blur : 15, // default value
    }).addTo(map);
    
}