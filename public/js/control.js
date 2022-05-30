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
        [4.570868, -74.297333, 112171931937917491474474719471], // lat, lng, intensity
        
    ],
    {radius: 25}).addTo(map);
    
}